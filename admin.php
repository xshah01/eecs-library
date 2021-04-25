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
                            <h3 class="admin-title text-center">Admin</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">

                <div class="welcome-message">

                    <?php 

                        include('config.php');
                        include('login-check.php');

                        if(isset($_SESSION['login'])) {
                            echo $_SESSION['login'];  //Display session message
                            unset($_SESSION['login']);  //Remove session message
                        }

                    ?>


                </div>
                    <div class="dashboard-title">
                        <h1 class="title text-center">Dashboard</h1>
                    </div>            
                    <div class="col-3">
                        <div class="box text-center ">

                            <?php 
                            
                            include('config.php');

                                $sql = "SELECT * FROM tbl_category";    //SQL query

                                $res = mysqli_query($conn, $sql);   //Execute query

                                $count = mysqli_num_rows($res); //Count rows

                            ?>

                            <h1><?php echo $count ?></h1>
                            <br />
                            Categories
                        </div>
                        <div class="box text-center ">

                            <?php 
                            
                            include('config.php');

                                $sql2 = "SELECT * FROM tbl_book";    //SQL query

                                $res2 = mysqli_query($conn, $sql2);   //Execute query

                                $count2 = mysqli_num_rows($res2); //Count rows

                            ?>

                            <h1><?php echo $count2 ?></h1>
                            <br />
                            Books
                        </div>
                        <div class="box text-center ">

                            <?php 
                            
                            include('config.php');

                                $sql3 = "SELECT * FROM tbl_reservation WHERE status='Reserved' ";    //SQL query

                                $res3 = mysqli_query($conn, $sql3);   //Execute query

                                $count3 = mysqli_num_rows($res3); //Count rows

                            ?>
                            <h1><?php echo $count3 ?></h1>
                            <br />
                            Reservations
                        </div>
                    </div>
                    
                    <br><br><br>
                    
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