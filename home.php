    <?php 
    
    include('partials-front/header.php');

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
                <h1 class="title text-center">Popular books</h1>
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
                                    <a class="popup-img" href="reservation-page.php?book_id=2">
                                        <img src="img/portfolio/p1.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">calculus</h4>
                                    <span class="text-secondary">Edwards & Penney</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all network">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=3">
                                        <img src="img/portfolio/p2.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">computer networking</h4>
                                    <span class="text-secondary">Kurose & Ross</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all database">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=4">
                                        <img src="img/portfolio/p3.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">database systems</h4>
                                    <span class="text-secondary">Kifer, Bernstein & Lewis</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all computerscience">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=5">
                                        <img src="img/portfolio/p4.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">computer science</h4>
                                    <span class="text-secondary">Becker & Quille</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all database">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=6">
                                        <img src="img/portfolio/p5.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">modern database management</h4>
                                    <span class="text-secondary">Hoffer, Venkataraman & Topi</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all calculus">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=7">
                                        <img src="img/portfolio/p6.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">calculus</h4>
                                    <span class="text-secondary">Briggs, Cochran & Gillett</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all computerscience">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=21">
                                        <img src="img/portfolio/p7.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">algorithms</h4>
                                    <span class="text-secondary">Sedgewick & Wayne</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all network">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=11">
                                        <img src="img/portfolio/p8.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">Networking Essentials</h4>
                                    <span class="text-secondary">Beasley & Nilkaew</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all database">
                                <div class="img">
                                    <a class="popup-img" href="reservation-page.php?book_id=44">
                                        <img src="img/portfolio/p9.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="col-md-8 title py-4">
                                    <h4 class="text-uppercase">Database Concepts</h4>
                                    <span class="text-secondary">Kroenke, Auer, Vandenberg & Yoder</span>
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
                        <?php 
                            
                            include('config.php');

                                $sql = "SELECT * FROM tbl_book";    //SQL query

                                $res = mysqli_query($conn, $sql);   //Execute query

                                $count = mysqli_num_rows($res); //Count rows

                            ?>
                            <h1><?php echo $count; ?></h1>
                            <h2></h2>
                            <h3>Books available</h3>
                        </div>
                        <div class="col-sm-3">
                            <?php 
                            
                            include('config.php');

                                $sql2 = "SELECT * FROM tbl_reservation WHERE status='Reserved' ";    //SQL query

                                $res2 = mysqli_query($conn, $sql2);   //Execute query

                                $count2 = mysqli_num_rows($res2); //Count rows

                            ?>
                            <h1><?php echo $count2; ?></h1>
                            <h2></h2>
                            <h3>Total Reservations</h3>
                        </div>
                        <div class="col-sm-3">
                            <?php 
                            
                            include('config.php');

                                $sql3 = "SELECT * FROM tbl_reservation WHERE status='Active' ";    //SQL query

                                $res3 = mysqli_query($conn, $sql3);   //Execute query

                                $count3 = mysqli_num_rows($res3); //Count rows

                            ?>
                            <h1 class="num"><?php echo $count3; ?></h1>
                            <h2></h2>
                            <h3>Active Readers</h3>
                        </div>
                        <div class="col-sm-3">
                            <?php 
                                
                                include('config.php');

                                    $sql4 = "SELECT * FROM tbl_recycle WHERE status='Active' ";    //SQL query

                                    $res4 = mysqli_query($conn, $sql4);   //Execute query

                                    $count4 = mysqli_num_rows($res4); //Count rows

                                ?>
                            <h1 class="num"><?php echo $count4; ?></h1>
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
                            <img src="img/testimonials/t1.jpg" alt="img1" class="img-fluid">
                        </div>
                        <div class="col-md-6 quote">
                        <h4 class="text-uppsercase">"Description begins in the writer’s imagination but should finish in the reader’s."</h4>
                        <p class="paragraph">- Stephen King</p>
                    </div>
                    </div>
                    <div class="author row">
                        <div class="col-sm-2 author-img">
                            <img src="img/testimonials/t2.jpg" alt="img1" class="img-fluid">
                        </div>
                        <div class="col-md-6 quote">
                        <h4 class="text-uppsercase">"Words are our most inexhaustible source of magic."</h4>
                        <p class="paragraph">- J.K. Rowling</p>
                    </div>
                    </div>
                    <div class="author row">
                        <div class="col-sm-2 author-img">
                            <img src="img/testimonials/t3.jpg" alt="img1" class="img-fluid">
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
                                <h1>Recycle your books</h1>
                                <h2></h2>
                                <h3 style="text-align: justify;">Books are an important part of our lives. 
                                Yet, many of us still struggle with old and unwanted books that takes up space 
                                in our shelves. When you decide it's time to part with them, we want you to know 
                                that they can go to a nice home where they can continue to enrich and improve 
                                other students education. We gratefully accept all kinds of books.</h3>
                            </div>
                            <div class="d-flex flex-row flex-wrap">
                                <a href="recycle-page.php">
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

    <?php 
    
    include('partials-front/footer.php');

    ?>