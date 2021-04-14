<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

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

        <section id="scroll" class="site-banner-categories">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="categories-title text-center">Categories</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-categories-title">
                        <h1 class="title">Manage Categories</h1>
                    </div>

                    <div class="admin-message">

                    <!-- Display message Admin message -->
                    <?php 

                    include('config.php');
                    include('login-check.php');

                        if(isset($_SESSION['add'])) {
                            echo $_SESSION['add'];  //Display session message
                            unset($_SESSION['add']);   //Remove session message
                        }

                        if(isset($_SESSION['upload'])) {
                            echo $_SESSION['upload'];  //Display session message
                            unset($_SESSION['upload']);   //Remove session message
                        }

                    ?>

                    </div>

                    <br><br>

                    <div class="add-category-button">
                        <!-- Button to add admin -->
                        <button type="button" class="btn-add-category mr-4" 
                            onclick="window.location.href='add-category.php';">add category ›
                        </button>
                    </div>

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>E-mail</th>
                            <th>Manage</th>
                        </tr>

                        <?php

                        include('config.php');
                        include('login-check.php');
                        
                        $sql = "SELECT * FROM tbl_admin";

                        //Execute query
                        $res = mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);  //Function to get all rows in database

                            $sn = 1001;

                            //Check the number of rows
                            if($count > 0) {
                                //We have data in database
                                //While loop get all data from database and will run as long as there is data to fetch
                                while($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];  //Get individual data
                                    $full_name = $rows['full_name'];
                                    $email = $rows['email'];

                        ?>
                                    
                                <!-- Display the values in our table -->
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>change-password.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-change-password mr-4">change password</button>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-update-admin mr-4">update admin</button>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-delete-admin mr-4">delete admin</button>
                                        </a>
                                    </td>
                                </tr>

                                <?php

                                }
                                        }
                                        else {
                                            exit(); // Exit, no data in database
                                        }
                    
                        }

                    ?>

                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
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