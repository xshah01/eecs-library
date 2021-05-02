    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = ($_POST['password']);    //Encrypted password

            //SQL query 
            $sql = "INSERT INTO tbl_admin SET
                full_name = '$full_name',
                email = '$email',
                password = '$password' ";

            //Execute query and save data into database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if($res == TRUE) {
                $_SESSION['add'] = "Admin Added Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
            }
            else {
                $_SESSION['add'] = "Failed to Add Admin";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-accounts.php');
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
                        <h1 class="title">Add Admin</h1>
                    </div>

                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="full_name" placeholder="Enter your full name"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="email" placeholder="Enter your e-mail"><br></td>
                            </tr>
                            <tr>
                                <td><input type="password" class="form-control" name="password" placeholder="Enter your password"><br></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="form-control-submit" name="submit" value="Add admin"><br></td>
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