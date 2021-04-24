<?php 
    
    include('partials-front/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-reservation-page">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <h3 class="books-title text-center">Book reservation</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->
            
            <!-- ==================== Start Book Area ==================== -->

            <section class="reservation-page">
                <div class="container">
                    <h1>Confirm your reservation</h1>

                        <div class="boxes-books">
                            <div class="book-img">
                                <img src="img/books/image_book_61.jpg" alt="">
                            </div>
                            <div class="book-description">
                                <h4>Calculus</h4>
                                    <p class="author">C.H. Edwards</p>
                                    <p class="edition">6th Edition</p>
                            </div>
                        </div>

                        
                            <div class="contact-form">
                                <legend>Personal Details</legend>
                                    <form method="POST" action="">
                                        <input name="Full name" type="text" class="form-control" placeholder="Full name">
                                        <br>
                                        <input name="Email" type="text" class="form-control" placeholder="Email">
                                        <br>
                                        <input name="Phone" type="text" class="form-control" placeholder="Phone">
                                        <br>
                                        <input type="submit" class="form-control submit" value="Reserve your book">
                                    </form>
                                </div>

                    <div class="clearfix"></div>

                    <br><br><br>

                </div>
            </section>

        </section>

    <!-- ==================== End Book Area ==================== -->

    </main>
    
    <!-- ========================= End Main Area ========================= -->

    <?php 
    
    include('partials-front/footer.php');

    ?>