    <?php 
    
    include('partials-front/header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-contact">
            <div class="bg-image-contact"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="contact-title text-center">Contact us</h3>
                            <h2></h2>
                        </div>
                        <div class="wrap">
                            <div class="floatleft">
                                <div class="contact-us-title col-lg-7">
                                    <h1>Get in touch with us</h1>
                                    <p>Email us with any questions or inquiries, or use 
                                        our contact data. We will be happy to answer you.</p>
                                </div>
                                <div class="contact-form">
                                    <form id="contact-form" action="https://formsubmit.co/eecs.library@gmail.com" method="POST">
                                        <input name="First name" type="text" class="form-control" placeholder="First name" required>
                                        <br>
                                        <input name="Last name" type="text" class="form-control" placeholder="Last name" required>
                                        <br>
                                        <input name="Email" type="text" class="form-control" placeholder="Email" required>
                                        <br>
                                        <input type="hidden" name="_subject" value="New Inquiry">
                                        <textarea name="Message" type="text" class="form-control" placeholder="Message" row="5" required></textarea>
                                        <input type="hidden" name="_next" value="http://localhost/eecs-library/thankyou.php">
                                        <br>
                                        <input type="submit" class="form-control submit" value="Send message">
                                    </form>
                                </div>
                            </div>
                            <div class="floatright">
                                <div class="find-us-title col-sm-3">
                                    <h1>Find us</h1>
                                    <p>Isafjordsgatan 22
                                        164 40 Kista</p>
                                </div>
                                <div class="maps">
                                    <iframe class="maps" 
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8038.755152374161!2d17.949390361940385!3d59.404835588874974!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa9c96b10c773bf43!2sKTH%20Kista!5e0!3m2!1ssv!2sse!4v1616356311379!5m2!1ssv!2sse" 
                                    width="645" height="352" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="contact-data">
                            <div class="row grid">
                                <div class="col-sm-3">
                                    <h1 class="tel">
                                        <i class="fas fa-phone"></i>
                                    </h1>
                                    <h2></h2>
                                    <p>08-790 40 00</p>
                                </div>
                                <div class="col-sm-3">
                                    <h1 class="email">
                                        <i class="fas fa-envelope"></i>
                                    </h1>
                                    <h2></h2>
                                    <p>eecs.library@gmail.com</p>
                                </div>
                                <div class="col-sm-3">
                                    <h1 class="hours">
                                        <i class="fas fa-clock"></i>
                                    </h1>
                                    <h2></h2>
                                    <p>Mon - Fri: 10 am to 15 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </main>
    
    <!-- ========================= End Main Area ========================= -->

    <?php 
    
    include('partials-front/footer.php');

    ?>