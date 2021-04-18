    <?php 
    
    include('partials-front/header.php');

    ?>

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
                                <img src="img/portfolio-categories/calculus.png" alt="calculus">
                            </div>
                        </a>
                        <a href="#">
                            <div class="boxes-category">
                                <img src="img/portfolio-categories/database.png" alt="database">
                            </div>
                        <div class="boxes-category">
                            <img src="img/portfolio-categories/network.png" alt="network">
                        </div>
                        </a>
                        <a href="#">
                            <div class="boxes-category">
                                <img src="img/portfolio-categories/computer-science.png" alt="computer-science">
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

    <?php 
    
    include('partials-front/footer.php');

    ?>