<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

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
                <li><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about-us.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>
    </header>

    <!-- ========================= End Header Area ========================= -->

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-books">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <h3 class="books-title text-center">Books</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->

            <!-- ==================== Start Book Search Area ==================== -->

            <section class="book-search">
                <div class="container">
                    <form action="" class="search-bar text-center">
                        <input type="search" name="search" placeholder="Search for your book here ... ">
                        <input type="submit" name="submit" value="›">
                    </form>
                </div>
            </section>

            <!-- ==================== End Book Search Area ==================== -->

            <!-- ==================== Start Categories Area ==================== -->

            <section class="categories">
                <div class="container">
                    <h1>Categories</h1>
                        <a href="#">
                            <div class="boxes-category">
                                <img src="img/categories/calculus.png" alt="calculus">
                            </div>
                        </a>
                        <a href="#">
                            <div class="boxes-category">
                                <img src="img/categories/database.png" alt="database">
                            </div>
                        <div class="boxes-category">
                            <img src="img/categories/network.png" alt="network">
                        </div>
                        </a>
                        <a href="#">
                            <div class="boxes-category">
                                <img src="img/categories/computer-science.png" alt="computer-science">
                            </div>
                        </a>
                        <div class="clearfix"></div>
                </div>
            </section>

            <!-- ==================== End Categories Area ==================== -->

            <!-- ==================== Start Book Area ==================== -->

            <section class="books">
                <div class="container">
                    <h1>Books</h1>
                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/portfolio-books/p1.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Book title</h4>
                                <p class="author">Author</p>
                                <p class="version">Utgivningsår/Upplaga</p>
                                <button type="button" class="btn-reserve-book" 
                                    onclick="window.location.href='#';">Reserve Book
                                </button>
                            </div>
                        </div>
                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/portfolio-books/p2.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Book title</h4>
                                <p class="author">Author</p>
                                <p class="version">Utgivningsår/Upplaga</p>
                                <button type="button" class="btn-reserve-book" 
                                    onclick="window.location.href='#';">Reserve Book
                                </button>
                            </div>
                        </div>
                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/portfolio-books/p3.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Book title</h4>
                                <p class="author">Author</p>
                                <p class="version">Utgivningsår/Upplaga</p>
                                <button type="button" class="btn-reserve-book" 
                                    onclick="window.location.href='#';">Reserve Book
                                </button>
                            </div>
                        </div>
                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/portfolio-books/p4.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Book title</h4>
                                <p class="author">Author</p>
                                <p class="version">Utgivningsår/Upplaga</p>
                                <button type="button" class="btn-reserve-book" 
                                    onclick="window.location.href='#';">Reserve Book
                                </button>
                            </div>
                        </div>
                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/portfolio-books/p5.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Book title</h4>
                                <p class="author">Author</p>
                                <p class="version">Utgivningsår/Upplaga</p>
                                <button type="button" class="btn-reserve-book" 
                                    onclick="window.location.href='#';">Reserve Book
                                </button>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                </div>
            </section>

        </section>

    <!-- ==================== End Book Area ==================== -->

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