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

                            <?php 
                            
                            include('config.php');

                                /* Check whether student is set or not */
                                if(isset($_SESSION['email'])) {

                                    $email = $_SESSION['email'];

                                    /* Get all details based on email */                   
                                    $sql2 = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the name

                                    $res2 = mysqli_query($conn, $sql2); //Execute the query

                                    $count2 = mysqli_num_rows($res2); //Check whether data is available or not

                                    /* Check whether reservation data has been retrieved or not */
                                    if($count2 == 1) {

                                        $row2 = mysqli_fetch_assoc($res2);   //Retrieve the details
                                                                    
                                        $full_name = $row2['full_name'];

                                        ?>

                                        <h3 class="student-title text-center"><?php echo $full_name ?></h3>

                                        <?php

                                    }

                                    else {  
                                                
 
                                        }

                                }

                                else {


                                }

                            ?>

                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">

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

                                <style>
                                        div.ex1 { 
                                        margin-left: -175px;
                                        }
                                    </style>

                                    <div class="admin-message ex1">

                                    <!-- Display message Admin message -->
                                    <?php 

                                    include('config.php');

                                        if(isset($_SESSION['update'])) {
                                            echo $_SESSION['update'];  //Display session message
                                            unset($_SESSION['update']);   //Remove session message
                                        }

                                        if(isset($_SESSION['change-password'])) {
                                            echo $_SESSION['change-password'];  //Display session message
                                            unset($_SESSION['change-password']);   //Remove session message
                                            
                                        }
                
                                        if(isset($_SESSION['student-not-found'])) {
                                            echo $_SESSION['student-not-found'];  //Display session message
                                            unset($_SESSION['student-not-found']);   //Remove session message
                                        }
                
                                        if(isset($_SESSION['password-not-match'])) {
                                            echo $_SESSION['password-not-match'];  //Display session message
                                            unset($_SESSION['password-not-match']);   //Remove session message
                                        }

                                        if(isset($_SESSION['delete'])) {
                                            echo $_SESSION['delete'];  //Display session message
                                            unset($_SESSION['delete']);   //Remove session message
                                        }

                                    ?>

                                    </div>

                                    <br>
                                
                                    <h4>My information</h4>

                                    <?php 

                                    include('config.php');
                                    
                                        /* Check whether student is set or not */
                                        if(isset($_SESSION['email'])) {

                                            $email = $_SESSION['email'];                                       

                                            /* Get all details based on email */                   
                                            $sql = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the details

                                            $res = mysqli_query($conn, $sql); //Execute the query

                                            $count = mysqli_num_rows($res); //Check whether data is available or not

                                            /* Check whether reservation data has been retrieved or not */
                                            if($count == 1) {

                                                $row = mysqli_fetch_assoc($res);   //Retrieve the details

                                                $id = $row['id'];  //Get individual data                            
                                                $full_name = $row['full_name'];
                                                $email = $row['email'];
                                                $phone = $row['phone'];

                                                ?>
                                                    <p class="name"><?php echo $full_name; ?><p>
                                                    <p><?php echo $email; ?><p>
                                                    <p><?php echo $phone; ?><p>
                                                <?php

                                            }

                                            else {
                                                
                                            
                                            }

                                        }
                                        
                                        else {


                                        }

                                    ?>

                                        <br>
                                        <a href="<?php echo SITEURL; ?>update-student.php?id=<?php echo $id; ?>"><p class="edit">
                                                Account settings ›</p>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>change-password-student.php?id=<?php echo $id; ?>"><p class="edit">
                                                Change password ›</p>
                                        </a>
                                        <br><br><br>
                                        <button
                                            onclick="window.location.href='logout-student.php';">Logout
                                        </button>      
                                        <br><br><br>           
                                </div>
                            </div>
                        </div>
                        <div class="column-right">                              
                            <div class="books"> 
                                <div class="col-xl-11">
                                    <br>
                                    <h4>Books</h4>
                                        <a href="#reservations"><p class="edit">
                                            My reservations ›</p>
                                        </a>
                                        <a href="#loans"><p class="edit">
                                            My loans ›</p>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br>

                <div class="reservations" id="reservations">

                <div class="divider"></div>

                <br><br><br><br><br>

                    <div class="reservation-title">
                        <h1 class="title text-center">Reservations</h1>
                        <p></p>
                    </div>   

                    <!-- Display Reservations -->
                    
                </div>

                <div class="loans" id="loans">

                <div class="divider"></div>

                <br><br><br><br><br>

                    <div class="loans-title">
                        <h1 class="title text-center">Loans</h1>
                        <p></p>
                    </div>   

                    <!-- Display Loans -->
                    
                </div>
                    
                    <div class="clearfix"></div>
                </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front/footer.php');

    ?>