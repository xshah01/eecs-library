    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            //Get all data from form to update
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];

            //SQL query 
            $sql = "UPDATE tbl_admin SET
                full_name = '$full_name',
                email = '$email' 
                WHERE id='$id' ";

            //Execute query and save new data into database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if($res == TRUE) {
                $_SESSION['update'] = "Admin Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
            }
            else {
                $_SESSION['update'] = "Failed to Update Admin";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-accounts.php');
            }

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->

    <?php 

    include('partials-front/header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-add-update-admin">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="admin-title text-center">Accounts</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="add-update-admin-title">
                        <h1 class="title">Update Admin</h1>
                    </div>

                    <?php 

                    include('config.php');

                        //Get the id of selected admin
                        $id=$_GET['id'];

                        //Create SQL query to retrieve the details
                        $sql="SELECT * FROM tbl_admin WHERE id=$id";

                        //Execute the query
                        $res=mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            $count = mysqli_num_rows($res); //Check whether data is available or not

                            //Check whether admin data has been retrieved or not
                            if($count == 1) {

                                //Retrieve the details
                                $row = mysqli_fetch_assoc($res);
                                
                                $full_name = $row['full_name'];
                                $email = $row['email'];

                            }
                            else {
                                header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
                            }
                        }

                    ?>
                    
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="full_name" value ="<?php echo $full_name; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="email" value ="<?php echo $email; ?>"><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="update admin"><br>
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