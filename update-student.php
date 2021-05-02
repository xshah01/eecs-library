    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            //Get all data from form to update
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $phone = $_POST['phone'];

            //SQL query 
            $sql2 = "UPDATE tbl_student SET
                full_name = '$full_name',
                phone = '$phone'
                WHERE id='$id' ";

            //Execute query and save new data into database
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

            if($res2 == TRUE) {
                $_SESSION['update'] = "Student Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'student.php'); //Redirect to Student if update is successful
            }
            else {
                $_SESSION['update'] = "Failed to Update Information";   //Create a session variable to display message
                header("location: ".SITEURL.'student.php');
            }

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->

    <?php 

    include('partials-front/header-student.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-update-student">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="student-title text-center">Student</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="update-student-title">
                        <h1 class="title">Update Information</h1>
                    </div>

                    <?php 

                    include('config.php');

                        //Get the student id
                        $id=$_GET['id'];

                        //Create SQL query to retrieve the details
                        $sql="SELECT * FROM tbl_student WHERE id=$id";

                        //Execute the query
                        $res=mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            $count = mysqli_num_rows($res); //Check whether data is available or not

                            //Check whether student data has been retrieved or not
                            if($count == 1) {

                                //Retrieve the details
                                $row = mysqli_fetch_assoc($res);
                                
                                $full_name = $row['full_name'];
                                $email = $row['email'];
                                $phone = $row['phone'];

                            }
                            else {
                                header("location: ".SITEURL.'student.php'); //Redirect to Student
                            }
                            
                        }

                    ?>
                    
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="full_name" value ="<?php echo $full_name; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="email" value ="<?php echo $email; ?>" disabled style="color:gray;"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="phone" value ="<?php echo $phone; ?>"><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="update information"><br>
                                </td>
                            </tr>
                        </table>
                    </form> 

                    <div class="delete-account">
                        <a href="<?php echo SITEURL; ?>delete-student.php?id=<?php echo $id; ?>" 
                            onclick="return confirm('Are you sure you want to delete your account?');">
                                <button class="delete-account-btn">delete account</button>
                        </a>
                    </div>
                    
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