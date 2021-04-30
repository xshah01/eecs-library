<?php 

include('partials-front/header-student.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-student">
            <div class="bg-image-student"></div>
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

                <div class="welcome-message">

                </div>
                    <div class="account-title">
                        <h1 class="title text-center">My account</h1>
                        <p></p>
                    </div>            
                
                <div class="container">
                    <div class="row">
                        <div class="column-left">
                            <div class="my-information">
                                <div class="col-xl-11">
                                    <h4>My information</h4>

                                    <?php 

                                    include('config.php');
                                    
                                        /* Check whether student is set or not */
                                        if(isset($_SESSION['email'])) {

                                            $email = $_SESSION['email'];
                                            $password = $_SESSION['password'];


                                            /* Get all details based on email and password */                   
                                            $sql = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'"; //Create SQL query to retrieve the details

                                            $res = mysqli_query($conn, $sql); //Execute the query

                                            $count = mysqli_num_rows($res); //Check whether data is available or not

                                            /* Check whether reservation data has been retrieved or not */
                                            if($count == 1) {

                                                $row = mysqli_fetch_assoc($res);   //Retrieve the details
                                                                            
                                                $full_name = $row['full_name'];
                                                $email = $row['email'];
                                                $phone = $row['phone'];

                                                ?>
                                                    <p><?php echo $full_name; ?><p>
                                                    <p><?php echo $email; ?><p>
                                                    <p><?php echo $phone; ?><p>
                                                <?php

                                            }

                                            else {
                                                
                                                header("location: ".SITEURL.'home.php'); //Redirect to Home page
                                            
                                            }

                                        }
                                        
                                        else {

                                            header("location: ".SITEURL.'home.php'); //Redirect to Home page

                                        }

                                    ?>


                                        <br>
                                        <p>
                                            <a href="#" class="edit">
                                                Edit information ›</a>
                                        </p>
                                        <button
                                            onclick="window.location.href='#';">Logout
                                        </button>      
                                        <br><br><br>           
                                </div>
                            </div>
                        </div>
                        <div class="column-right">                              
                            <div class="books"> 
                                <div class="col-xl-11">
                                    <h4>Books</h4>
                                        <a href="#" class="reservations-loans">
                                            My reservations ›
                                        </a>
                                        <br><br>
                                        <a href="#" class="reservations-loans">
                                            My loans ›
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br><br><br>

                <div class="reservations">

                </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front/footer.php');

    ?>