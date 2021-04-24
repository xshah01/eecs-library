<?php

include('config.php');

?>

<!-- ========================= Start Footer Area ========================= -->

<footer class="footer-area">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="#"><img src="./img/eecslogofooter.png" alt="logo"></a>
                </div>
                <div class="footer-text text-center py-4">Book reservations made easy.</div>
                <div class="copyright text-center">
                    <p class="para">Copyright © 2021 EECS-LIBRARY. All rights reserved.</p>
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