    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
        include('login-check.php');
    
        /* Process the value from Form and save it in database */

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            /* Get data from Form */
            $title = $_POST['title'];
            $author = $_POST['author'];
            $edition = $_POST['edition'];
            $ISBN = $_POST['ISBN'];
            $language = $_POST['language'];
            $category = $_POST['category'];

            //For file input, check whether image is selected or not 
            if(isset($_FILES['image']['name'])) {

                /* Upload the image */
                $image_name = $_FILES['image']['name']; //Get the image name

                /* Upload image only if the image is selected */
                if($image_name != "") {
                    
                    $ext = end(explode('.', $image_name));   //Get the extension for the image (.png, .jpg ect.)

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

                }
                
            }
            else {
                //Do not upload the image and set the image_name value as blank
                $image_name = "";
            }
            
            //For radio input, check whether the button is selected or not
            if (isset($_POST['active'])) {
                //Get the value from form
                $active = $_POST['active'];
            }
            else {
                //Set the default value
                $active = "No";
            }

            //SQL query 
            $sql2 = "INSERT INTO tbl_book SET
                title = '$title',
                author = '$author',
                edition = '$edition',
                ISBN = '$ISBN',
                language = '$language',
                image_name = '$image_name',
                category_id = $category,
                active = '$active' ";

            //Execute query and save data into database
            $res2 = mysqli_query($conn, $sql2);

            if($res2 == TRUE) {
                $_SESSION['add'] = "Book Added Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Categories
            }
            else {
                $_SESSION['add'] = "Failed to Add Book";   //Create a session variable to display message
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

        <section id="scroll" class="site-banner-add-category-book">
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
                    <div class="add-category-book-title">
                        <h1 class="title">Add Book</h1>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="title" placeholder="Enter the book title"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="author" placeholder="Enter the author(s)"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="edition" placeholder="Enter the year of publication and/or edition"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="ISBN" placeholder="Enter the ISBN"></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="language" placeholder="Enter the book language"></td>
                            </tr>
                            <tr>
                                <td>Select Image:
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Select Category:
                                    <select name="category">

                                        <?php 

                                        include('config.php');

                                            /* PHP to display available categories added in database */
                                            $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";

                                            $res = mysqli_query($conn, $sql);   //Execute query

                                            $count = mysqli_num_rows($res); //Count rows

                                            /* Count rows to check whether we have available categories or not */
                                            if($count > 0) {

                                                while($row=mysqli_fetch_assoc($res)) {
                                                    $id=$row['id'];
                                                    $title=$row['title'];
                                                    ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                                    <?php
                                                }

                                            }

                                            else {

                                                ?>
                                                    <option value="0">No categories available</option>
                                                <?php

                                            }

                                        ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Active:
                                    <input type="radio" name="active" value="Yes">   Yes
                                    <input type="radio" name="active" value="No">   No
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="form-control-submit" name="submit" value="Add Book"><br></td>
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