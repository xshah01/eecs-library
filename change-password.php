
    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
        include('login-check.php');

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            //Process the value from Form and save it in database
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //Check whether admin with current ID and current password exists or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            //Execute the query
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if($res == TRUE) {

                //Check whether data is available or not
                $count = mysqli_num_rows($res);

                if($count == 1) {

                    //Admin exists and password can be changed
                    //Check whether 'new password' and 'confirm new password' match or not

                    if($new_password == $confirm_password) {

                        //Passwords matched - proceed to update password
                        $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";

                        //Execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        //Check whether query is executed or not
                        if($res2 == TRUE) {

                            $_SESSION['change-password'] = "Password Changed Successfully";
                            header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
                            exit(0);

                        }

                        else {

                            $_SESSION['change-password'] = "Failed to Change Password";
                            header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
                            exit(0);

                        }
                        
                    }

                    else {

                        $_SESSION['password-not-match'] = "New Passwords did not match";
                        header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
                        exit(0);

                    }
                    
                }

                else {

                    $_SESSION['admin-not-found'] = "Admin not found";
                    header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
                    exit(0);

                }

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

        <section id="scroll" class="site-banner-change-password">
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
                    <div class="change-password-title">
                        <h1 class="title">Change Password</h1>
                    </div>

                    <?php 
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                        }
                    ?>

                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="password" class="form-control" name="current_password" placeholder="Current Password"><br></td>
                            </tr>
                            <tr>
                                <td><input type="password" class="form-control" name="new_password" placeholder="New Password"><br></td>
                            </tr>
                            <tr>
                                <td><input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password"><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="Change Password"><br>
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
    
    <?php 

    include('partials-front-admin/footer.php');

    ?>