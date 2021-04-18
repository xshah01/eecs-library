    <?php 
    
    include('header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner">
                <a href="#Bookshelf"><span></span></a>
            <div class="bg-image"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 site-title">
                        <h3 class="title-text">When in doubt, go to the library</h3>
                        <h1 class="title-text2">— J.K. Rowling</h1>
                        <h4 class="title-text3 text-uppercase">Your book reservation system is here</h4>
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap">
                                <button type="button" class="btn button mr-4 text-uppercase"
                                    onclick="window.location.href='books.php';">View Books
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Banner Area ==================== -->

        <!-- ==================== Start Book Area ==================== -->

        <section id="Bookshelf" class="book-area">
            <div class="project-title">
                <h1 class="title">Bookshelf</h1>
                <h2></h2>
            </div>
            <div class="container text-center">
                <div class="row grid">
                    <div class="col-md-12">
                        <div class="button-group">
                            <ul class="nav list-unstyled" id="book-filters">
                                <li type="button" class="filter filter-active" data-filter=".all">ALL</li>
                                <li type="button" data-filter=".calculus">CALCULUS</li>
                                <li type="button" data-filter=".network">NETWORK</li>
                                <li type="button" data-filter=".database">DATABASE</li>
                                <li type="button" data-filter=".computerscience">COMPUTER SCIENCE</li>
                                <a href="books.php">
                                    <li id="All" type="button">VIEW ALL BOOKS</li>
                                </a>
                            </ul>
                        </div>
                        <div class="book-container">
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all calculus">
                                <div class="img">
                                    <a class="popup-img" href="images/1.jpg">
                                        <img src="img/portfolio/p1.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">calculus</h4>
                                    <span class="text-secondary">C.H. Edwards</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all network">
                                <div class="img">
                                    <a class="popup-img" href="images/2.jpg">
                                        <img src="img/portfolio/p2.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">computer networking</h4>
                                    <span class="text-secondary">Jams F. Kurose</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all database">
                                <div class="img">
                                    <a class="popup-img" href="images/3.jpg">
                                        <img src="img/portfolio/p3.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">database systems</h4>
                                    <span class="text-secondary">Michael Kiffer</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all computerscience">
                                <div class="img">
                                    <a class="popup-img" href="images/4.jpg">
                                        <img src="img/portfolio/p4.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">computer science</h4>
                                    <span class="text-secondary">Brett A. Becker</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all database">
                                <div class="img">
                                    <a class="popup-img" href="images/5.jpg">
                                        <img src="img/portfolio/p5.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">modern database management</h4>
                                    <span class="text-secondary">Jeffrey A. Hoffer</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all calculus">
                                <div class="img">
                                    <a class="popup-img" href="images/6.jpg">
                                        <img src="img/portfolio/p6.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">calculus</h4>
                                    <span class="text-secondary">Briggs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Book Area ==================== -->

        <!-- ==================== Start Stat Area ==================== -->

        <div class="margin"></div>

        <section class="parallax">
            <div class="container-fluid">
	            <div class="parallax-inner">
                    <div class="row">
                        <div class="col-sm-3">
                            <h1 class="num">584</h1>
                            <h2></h2>
                            <h3>Books available</h3>
                        </div>
                        <div class="col-sm-3">
                            <h1 class="num">128</h1>
                            <h2></h2>
                            <h3>Total Reservations</h3>
                        </div>
                        <div class="col-sm-3">
                            <h1 class="num">89</h1>
                            <h2></h2>
                            <h3>Active Readers</h3>
                        </div>
                        <div class="col-sm-3">
                            <h1 class="num">18</h1>
                            <h2></h2>
                            <h3>Recycled Books</h3>
                        </div>
	                </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Stat Area ==================== -->

        <!-- ==================== Start Quotes Area ==================== -->

        <div class="margin2"></div>

        <section class="quote-area">
            <div class="container carousel">
                <div class="owl-carousel owl-theme">
                    <div class="author row">
                        <div class="col-sm-2 author-img">
                            <img src="./img/testimonials/t1.jpg" alt="img1" class="img-fluid">
                        </div>
                        <div class="col-md-6 quote">
                        <h4 class="text-uppsercase">"Description begins in the writer’s imagination but should finish in the reader’s."</h4>
                        <p class="paragraph">- Stephen King</p>
                    </div>
                    </div>
                    <div class="author row">
                        <div class="col-sm-2 author-img">
                            <img src="./img/testimonials/t2.jpg" alt="img1" class="img-fluid">
                        </div>
                        <div class="col-md-6 quote">
                        <h4 class="text-uppsercase">"Words are our most inexhaustible source of magic."</h4>
                        <p class="paragraph">- J.K. Rowling</p>
                    </div>
                    </div>
                    <div class="author row">
                        <div class="col-sm-2 author-img">
                            <img src="./img/testimonials/t3.jpg" alt="img1" class="img-fluid">
                        </div>
                        <div class="col-md-6 quote">
                        <h4 class="text-uppsercase">“Think before you speak. Read before you think.”</h4>
                        <p class="paragraph">- Fran Lebowitz</p>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Quotes Area ==================== -->

        <!-- ==================== Start Recycle Area ==================== -->

        <div class="margin2"></div>

        <section class="parallax2">
            <div class="container-fluid">
                <div class="parallax-inner-inner">
	                <div class="parallax-inner2">       
                        <div class="row">
                            <div class="col-lg-4 text-center"></div>
                            <div class="col-lg-4 text-center"></div>
                            <div class="col-lg-4 text-center">
                                <h1 class="num">Recycle your books</h1>
                                <h2></h2>
                                <h3 style="text-align: justify;">Books are an important part of our lives but many 
                                    of us still struggle with old and unwanted books that takes up space in our 
                                    shelves. When you decide it's time to part with them, we want you to know that 
                                    they can go to a nice home where they can continue to enrich and improve other 
                                    student's education. We gracefully accept all kinds of books.</h3>
                            </div>
                            <div class="d-flex flex-row flex-wrap">
                                <a href="contact.php">
                                <button type="button" class="button button2 mr-4 text-uppercase">recycle now</button>
                                </a>
                            </div>                       
	                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== End Recycle Area ==================== -->

        <!-- ==================== Start Subscribe Area ==================== -->

        <section class="subscribe-area">
            <div class="container subscribe">
                <div class="row">
                    <div class="col-lg-12 text-center subscribe-title">
                        <h4 class="subscribe-title">Stay up to date</h4>
                        <h2></h2>
                        <div class="row">
                        <p class="col-sm-6 mx-auto">Never miss out on workshops and book clubs. By subscribing to our newsletter,
                            you'll also be the first one to know when a new book is released.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="d-sm-flex justify-content-center">
                    <form class="w-50">
                        <div class="row d-flex flex-row flex-wrap">
                            <div class="col input-textbox">
                                <input type="text" id="txtemail" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col">
                                <div class="btn-submit">
                                    <button type="submit" class="btn btn-success float-right text-uppercase">subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </section>
        
        <!-- ==================== End Subscribe Area ==================== -->

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

    <!-- Isotope js library -->
    <script srs=".vendor/isotope/isotope.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    
    <!-- Custom js file -->
    <script src="./js/main.js"></script>

    <!-- Owl-carousel js file -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script type="text/javascript">
        $('.site-main .owl-carousel').owlCarousel ({
            loop:true,
            autoplay:true,
            autoplayTimeout:7000,
            dots:true,
            responsive: {
                0: {
                    items:1
                }
            }   
        })
    </script>

    <!-- Number CounterUp OBS! FUNGERAR EJ-->
    <script src="../VisualStudio/Counter-Up-master/jquery.counterup.min.js"></script>
    <script src="../VisualStudio/imakewebthings-waypoints-34d9f6d/lib/jquery.waypoints.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.num').counterUp ({
                delay: 1000,
                time: 1000
            });
        });
    </script>

</body>
</html>