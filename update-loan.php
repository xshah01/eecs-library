    <!-- ========================= Start PHP MyAdmin Area ========================= -->

    <?php 

        include('config.php');
    
        //Process the value from Form and save it in database

        //When submit button is clicked:

        if (isset($_POST['submit'])) {

            /* Get all data from Form to update */
            $id = $_POST['id'];
            $student_name = $_POST['student_name'];
            $student_email = $_POST['student_email'];
            $student_phone = $_POST['student_phone'];
            $status = $_POST['status'];

            /* SQL Query */
            $sql = "UPDATE tbl_reservation SET
                student_name = '$student_name',
                student_email = '$student_email',
                student_phone = '$student_phone',
                status = '$status'
                WHERE id='$id' ";

            /* Execute query and save new data into database */
            $res = mysqli_query($conn, $sql);

            if($res == TRUE) {
                $_SESSION['update'] = "Reservation/Loan Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-reservations.php'); //Redirect to Manage Reservations
            }
            else {
                $_SESSION['update'] = "Failed to Update Reservation/Loan";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-reservations.php');
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

        <section id="scroll" class="site-banner-update-reservation">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="reservations-title text-center">Loans</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    

        <!-- ========================= End Banner Area ========================= -->

            <div class="main-content">
                <div class="wrapper">
                    <div class="update-reservation-title">
                        <h1 class="title">Update Loan</h1>
                    </div>

                    <?php 

                    include('config.php');

                        /* Check whether id is set or not */
                        if(isset($_GET['id'])) {

                            $id = $_GET['id'];  //Get the id

                            /* Get all details based on id */                   
                            $sql2 = "SELECT * FROM tbl_reservation WHERE id=$id"; //Create SQL query to retrieve the details

                            $res2 = mysqli_query($conn, $sql2); //Execute the query

                            $count2 = mysqli_num_rows($res2); //Check whether data is available or not

                            /* Check whether reservation data has been retrieved or not */
                            if($count2 == 1) {

                                $row2 = mysqli_fetch_assoc($res2);   //Retrieve the details
                                                            
                                $student_name = $row2['student_name'];
                                $student_email = $row2['student_email'];
                                $student_phone = $row2['student_phone'];
                                $status = $row2['status'];
                            
                            }
                            
                            else {
                                
                                header("location: ".SITEURL.'manage-reservations.php'); //Redirect to Manage Reservations
                            
                            }

                        }

                        else {

                            header("location: ".SITEURL.'manage-reservations.php'); //Redirect to Manage Reservations

                        }

                    ?>
                    
                    <form action="" method="POST">
                        <table>
                            <tr>
                                <td><input type="text" class="form-control" name="student_name" value ="<?php echo $student_name; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="student_email" value ="<?php echo $student_email; ?>"><br></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="student_phone" value ="<?php echo $student_phone; ?>"><br></td>
                            </tr>
                            <tr>
                                <td>Status:
                                    <select name="status">
                                        <option <?php if($status=="Active") {echo "selected";} ?> value="Active">Active</option>
                                        <option <?php if($status=="Inactive") {echo "selected";} ?> value="Inactive">Inactive</option>
                                    </select>
                                <br><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="update loan"><br>
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front-admin/footer.php');

    ?>