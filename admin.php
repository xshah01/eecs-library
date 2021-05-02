<?php 

include('partials-front-admin/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-admin">
            <div class="bg-image-admin"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">

                        <?php 
                            
                            include('config.php');

                                /* Check whether admin is set or not */
                                if(isset($_SESSION['email'])) {

                                    $email = $_SESSION['email'];
                                    $password = $_SESSION['password'];

                                    /* Get all details based on email and password */                   
                                    $sql1 = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'"; //Create SQL query to retrieve the name

                                    $res1 = mysqli_query($conn, $sql1); //Execute the query

                                    $count1 = mysqli_num_rows($res1); //Check whether data is available or not

                                    /* Check whether reservation data has been retrieved or not */
                                    if($count1 == 1) {

                                        $row1 = mysqli_fetch_assoc($res1);   //Retrieve the details
                                                                    
                                        $full_name = $row1['full_name'];

                                        ?>

                                        <h3 class="admin-title text-center"><?php echo $full_name ?></h3>

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
                    <div class="dashboard-title">
                        <h1 class="title text-center">Dashboard</h1>
                    </div>            
                    <div class="col-12">
                        <div class="box1 text-center">

                            <?php 
                            
                            include('config.php');

                                $sql = "SELECT * FROM tbl_category";    //SQL query

                                $res = mysqli_query($conn, $sql);   //Execute query

                                $count = mysqli_num_rows($res); //Count rows

                            ?>
                            <a href="manage-categories.php">
                            <h1><?php echo $count ?></h1>
                            <br />
                            <p>Categories</p>
                        </div>
                            </a>
                        <div class="box2 text-center ">
                            <?php 
                            
                            include('config.php');

                                $sql2 = "SELECT * FROM tbl_book";    //SQL query

                                $res2 = mysqli_query($conn, $sql2);   //Execute query

                                $count2 = mysqli_num_rows($res2); //Count rows

                            ?>
                            <a href="manage-books.php">
                            <h1><?php echo $count2 ?></h1>
                            <br />
                            <p>Books</p>
                        </div>
                            </a>
                        
                        <div class="box3 text-center ">
                                <?php 
                                
                                include('config.php');

                                    $sql3 = "SELECT * FROM tbl_reservation WHERE status='Reserved' 
                                    OR status='Inactive'";    //SQL query

                                    $res3 = mysqli_query($conn, $sql3);   //Execute query

                                    $count3 = mysqli_num_rows($res3); //Count rows

                                ?>
                                <a href="manage-reservations.php">
                                <h1><?php echo $count3 ?></h1>
                                <br />
                                <p>Reservations</p>
                            </div>
                                </a>

                            <div class="box4 text-center ">
                                <?php 
                                
                                include('config.php');

                                    $sql4 = "SELECT * FROM tbl_reservation WHERE status='Active'";    //SQL query

                                    $res4 = mysqli_query($conn, $sql4);   //Execute query

                                    $count4 = mysqli_num_rows($res4); //Count rows

                            ?>
                            <a href="manage-reservations.php">
                            <h1><?php echo $count4 ?></h1>
                            <br />
                            <p>Loans</p>
                            </div>
                                </a>

                            <div class="box5 text-center ">
                                <?php 
                                
                                include('config.php');

                                    $sql5 = "SELECT * FROM tbl_admin ";    //SQL query

                                    $res5 = mysqli_query($conn, $sql5);   //Execute query

                                    $count5 = mysqli_num_rows($res5); //Count rows

                                ?>
                                <a href="manage-accounts.php">
                                <h1><?php echo $count5 ?></h1>
                                <br />
                                <p>Accounts</p>
                            </div>
                                </a>

                            <div class="box6 text-center ">
                                <?php 
                                
                                include('config.php');

                                    $sql6 = "SELECT * FROM tbl_admin ";    //SQL query

                                    $res6 = mysqli_query($conn, $sql6);   //Execute query

                                    $count6 = mysqli_num_rows($res6); //Count rows

                                ?>
                                <a href="manage-accounts.php">
                                <h1><?php echo $count6 ?></h1>
                                <br />
                                <p>Recycled Books</p>

                            </div>
                                </a>

                            <div class="box7 text-center ">
                                <?php 
                                
                                include('config.php');

                                    $sql7 = "SELECT * FROM tbl_admin ";    //SQL query

                                    $res7 = mysqli_query($conn, $sql7);   //Execute query

                                    $count7 = mysqli_num_rows($res7); //Count rows

                                ?>
                                <a href="manage-accounts.php">
                                <h1><?php echo $count7 ?></h1>
                                <br />
                                <p>Study Booth</p>
                            </div>
                                </a>

                    </div>
                    
                    <br><br><br><br><br>
                    
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