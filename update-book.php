    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            /* Get values from Form */
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $edition = $_POST['edition'];
            $ISBN = $_POST['ISBN'];
            $language = $_POST['language'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $active = $_POST['active'];

            /* Update the image if selected */
            if(isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                /* Check whether image is available or not */
                if($image_name != "") {

                    $ext = end(explode('.', $image_name));   //Get the extension for the image (.png, .jpg etc.)

                    $image_name = "image_book_".rand(000, 999).'.'.$ext; //Rename the image

                    $source_path = $_FILES['image']['tmp_name'];   //Get the source path

                    $destination_path = "img/books/".$image_name;    //Set the destination path

                    $upload = move_uploaded_file($source_path, $destination_path);  //Upload the image

                    //Check whether the image is uploaded or not
                    if($upload == FALSE) {

                        $_SESSION['upload'] = "Failed to upload image";   //Create a session variable to display message
                        header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books
                        die();  //Stop the process
                        
                    }

                    /* Remove the current image if available */
                    if($current_image != "") {
                        
                        $remove_path = "img/books/".$current_image;  //Create path to access the folder
                        $remove = unlink($remove_path); //Remove the current image

                        /* Add error message and stop process if failed to remove image */
                        if($remove == FALSE) {

                            $_SESSION['failed-to-remove-current-image'] = "Failed to remove current image";    //Create a session variable to display message  
                            header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books
                            die();  //Stop the process

                        }

                    }

                }

                else {
                    $image_name = $current_image;
                }

            }

            else {
                $image_name = $current_image;
            }

            /* Update database */
            $sql3 = "UPDATE tbl_book SET 
                title = '$title',
                author = '$author',
                edition = '$edition',
                ISBN = '$ISBN',
                language = '$language',
                image_name = '$image_name',
                category_id = '$category',
                active = '$active' WHERE id = $id ";

            /* Execute the query */
            $res3 = mysqli_query($conn, $sql3);

            /* Check whether query is executed or not */
            if($res3 == TRUE) {
                $_SESSION['update'] = "Book Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Categories
            }
            else {
                $_SESSION['update'] = "Failed to Update Book";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-books.php');
            }       

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->
    
    <?php 

    include('partials-front-admin/header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-update-category-book">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="category-book-title text-center">Books</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="update-category-book-title">
                        <h1 class="title">Update Book</h1>
                    </div>

                    <?php 

                    include('config.php');

                        //Check whether the id is set or not
                        if(isset($_GET['id'])) {

                            //Get the id of selected book
                            $id = $_GET['id'];

                            //Create SQL query to retrieve the details
                            $sql2 = "SELECT * FROM tbl_book WHERE id=$id";

                            //Execute the query
                            $res2 = mysqli_query($conn, $sql2);

                            $count = mysqli_num_rows($res2); //Count the rows to check whether the id is valid or not

                            if($count == 1) {

                                //Retrieve the details
                                $row2 = mysqli_fetch_assoc($res2);
                                
                                $title = $row2['title'];
                                $author = $row2['author'];
                                $edition = $row2['edition'];
                                $ISBN = $row2['ISBN'];
                                $language = $row2['language'];
                                $current_image = $row2['image_name'];
                                $current_category = $row2['category_id'];
                                $active = $row2['active'];

                            }

                            else {

                                $_SESSION['no-book-found'] = "Book not found";
                                header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books

                            }

                        }

                        else {

                            header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books

                        }

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="title" value="<?php echo $title ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="author" value="<?php echo $author ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="edition" value="<?php echo $edition ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="ISBN" value="<?php echo $ISBN ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="language" value="<?php echo $language ?>"></td>
                            </tr>
                            <tr>
                                <td>Current Image:
                                    <?php 
                                     
                                        if($current_image != "") {

                                            //Display the image
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/books/<?php echo $current_image; ?>"width="80px">
                                            <?php
                                        }
                                        else {
                                            echo "Image not added";
                                        }
                                    
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Select New Image:
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Category:
                                    <select name="category">

                                        <?php

                                            include('config.php');

                                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                            $res = mysqli_query($conn, $sql);

                                            $count = mysqli_num_rows($res);

                                            if($count > 0) {
                                                while($row=mysqli_fetch_assoc($res)) {
                                                    $category_title=$row['title'];
                                                    $category_id=$row['id'];
                                                    ?>  
                                                        <option <?php if($current_category==$category_id) { echo "Selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                                    <?php
                                                }
                                            }
                                            else {
                                                echo "<option value='0'>Category not available</option>";
                                            }

                                        ?>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Active:
                                    <input <?php if($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">   Yes
                                    <input <?php if($active == "No") {echo "checked";} ?> type="radio" name="active" value="No">   No
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="Update Book"><br>
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front-admin/footer.php');

    ?>