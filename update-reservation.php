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
                $_SESSION['update'] = "Reservation Updated Succesfully";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-reservations.php'); //Redirect to Manage Reservations
            }
            else {
                $_SESSION['update'] = "Failed to Update Reservation";   //Create a session variable to display message
                header("location: ".SITEURL.'manage-reservations.php');
            }

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>

    <!-- bootstrap file via jsDelivr -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- custom css file -->
    <link href="./css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Gravitas+One"/>

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- owl-carousel css file -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">

     <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/4d29e9b01e.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <!-- ========================= Start Header Area ========================= -->

    <header>
        <a href="home.php" class="logo"href="home.php"><img src="./img/eecslogo.png" alt="logo"></a>
        <ul>
                <li><a href="home.php">Exit Admin<span class="sr-only">(current)</span></a></li>
                <li><a id="accounts" href="manage-accounts.php">Accounts</a></li>
                <li><a id="categories" href="manage-categories.php">Categories</a></li>
                <li><a id="books" href="manage-books.php">Books</a></li>
                <li><a id="reservations" href="manage-reservations.php">Reservations</a></li>
                <li><a id="admin" href="admin.php">Admin</a></li>
                <li><a id="logout" href="login.php">Logout</a></li>
            </ul>
    </header>

    <!-- ========================= End Header Area ========================= -->

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-update-reservation">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="reservations-title text-center">Reservations</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    

        <!-- ========================= End Banner Area ========================= -->

            <div class="main-content">
                <div class="wrapper">
                    <div class="update-reservation-title">
                        <h1 class="title">Update Reservation</h1>
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
                                        <option <?php if($status=="Reserved") {echo "selected";} ?> value="Reserved">Reserved</option>
                                        <option <?php if($status=="Active") {echo "selected";} ?> value="Active">Active</option>
                                        <option <?php if($status=="Inactive") {echo "selected";} ?> value="Inactive">Inactive</option>
                                    </select>
                                <br><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="form-control-submit" name="submit" value="update reservation"><br>
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

    <!-- ========================= Start Footer Area ========================= -->

    <footer class="footer-area">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="#"><img src="./img/eecslogofooter.png" alt="logo"></a>
                </div>
                <div class="footer-text text-center py-4">Book reservations made easy.</div>
                <div class="copyright text-center">
                    <p class="para">Copyright © 2021. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========================= End Footer Area ========================= -->

        <!-- ========================= Start Scrool to Top ========================= -->

        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
        
        <!-- ========================= End Scroll to Top ========================= -->


    <!--  Jquery js file  -->
    <script src="./js/jquery.3.5.1.js"></script>

    <!-- Bootstrap js file -->
    <script src="./js/bootstrap.min.js"></script>


    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    
    <!-- Custom js file -->
    <script src="./js/main.js"></script>

</body>
</html>