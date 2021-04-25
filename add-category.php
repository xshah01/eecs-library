    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            $title = $_POST['title'];

            //For file input, check whether image is selected or not 
            if(isset($_FILES['image']['name'])) {

                /* Upload the image */
                $image_name = $_FILES['image']['name']; //Get the image name

                /* Upload image only if the image is selected */
                if($image_name != "") {
                    
                    $ext = end(explode('.', $image_name));   //Get the extension for the image (.png, .jpg ect.)

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
            $sql = "INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                active = '$active' ";

            //Execute query and save data into database
            $res = mysqli_query($conn, $sql);

            if($res == TRUE) {
                $_SESSION['add'] = "Category Added Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-categories.php'); //Redirect to Manage Categories
            }
            else {
                $_SESSION['add'] = "Failed to Add Category";   //Create a session variable to display message
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

        <section id="scroll" class="site-banner-add-category-book">
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
                    <div class="add-category-book-title">
                        <h1 class="title">Add Category</h1>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="title" placeholder="Enter the category title"></td>
                            </tr>
                            <tr>
                                <td>Select Image:
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Active:
                                    <input type="radio" name="active" value="Yes">   Yes
                                    <input type="radio" name="active" value="No">   No
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="form-control-submit" name="submit" value="Add Category"><br></td>
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