    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
        include('login-check.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            /* Get values from Form */
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            /* Update the image if selected */
            if(isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                /* Check whether image is available or not */
                if($image_name != "") {

                    $ext = end(explode('.', $image_name));   //Get the extension for the image (.png, .jpg etc.)

                    $image_name = "image_category_".rand(000, 999).'.'.$ext; //Rename the image

                    $source_path = $_FILES['image']['tmp_name'];   //Get the source path

                    $destination_path = "img/categories/".$image_name;    //Set the destination path

                    $upload = move_uploaded_file($source_path, $destination_path);  //Upload the image

                    //Check whether the image is uploaded or not
                    if($upload == FALSE) {

                        $_SESSION['upload'] = "Failed to upload image";   //Create a session variable to display message
                        header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories
                        die();  //Stop the process
                        
                    }

                    /* Remove the current image if available */
                    if($current_image != "") {
                        
                        $remove_path = "img/categories/".$current_image;  //Create path to access the folder
                        $remove = unlink($remove_path); //Remove the current image

                        /* Add error message and stop process if failed to remove image */
                        if($remove == FALSE) {

                            $_SESSION['failed-to-remove-current-image'] = "Failed to remove current image";    //Create a session variable to display message  
                            header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories
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
            $sql2 = "UPDATE tbl_category SET 
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active' WHERE id = $id ";

            /* Execute the query */
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

            /* Check whether query is executed or not */
            if($res2 == TRUE) {
                $_SESSION['update'] = "Category Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories
            }
            else {
                $_SESSION['update'] = "Failed to Update Category";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-categories.php');
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
                            <h3 class="category-book-title text-center">Categories</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="update-category-book-title">
                        <h1 class="title">Update Category</h1>
                    </div>

                    <?php 

                    include('config.php');
                    
                        //Check whether the id is set or not
                        if(isset($_GET['id'])) {

                            //Get the id of selected category
                            $id = $_GET['id'];

                            //Create SQL query to retrieve the details
                            $sql = "SELECT * FROM tbl_category WHERE id=$id";

                            //Execute the query
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res); //Count the rows to check whether the id is valid or not

                            if($count == 1) {

                                //Retrieve the details
                                $row = mysqli_fetch_assoc($res);
                                
                                $title = $row['title'];
                                $current_image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                            }

                            else {

                                $_SESSION['no-category-found'] = "Category not found";
                                header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories

                            }

                        }

                        else {

                            header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories

                        }
                    
                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="title" value="<?php echo $title ?>"></td>
                            </tr>
                            <tr>
                                <td>Current Image:
                                    <?php 
                                     
                                        if($current_image != "") {

                                            //Display the image
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/categories/<?php echo $current_image; ?>"width="140px">
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
                                <td>Featured: 
                                    <input <?php if($featured == "Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">   Yes
                                    <input <?php if($featured == "No") {echo "checked";} ?> type="radio" name="featured" value="No">   No
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
                                    <input type="submit" class="form-control-submit" name="submit" value="Update Category"><br>
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