<?php 
    
    include('partials-front/header.php');
?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-confirmation-page">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <h3 class="books-title text-center">Book reservation</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->
            
            <!-- ==================== Start Book Area ==================== -->

            <section class="confirmation-page">
                <div class="container">

                    <h1>Your book is now reserved</h1>

                    <h4>Please pick up your book within 24h</h4>
                    <p>or your reservation will be terminated</p>

                    <br><br>

                    <div class="countdown text-center">
                        <div id="clockdiv"><div>
                            <span class="hours"></span>
                        </div>
                        <div>
                            <span class="minutes"></span>
                        </div>
                        <div>
                            <span class="seconds"></span>
                        </div>
                        </div>
                    </div>

                    <br><br><br>

                    <p>Click <a href="contact.php">here </a> to find your library</p>

                    <div class="clearfix"></div>

                    <br><br><br>

                </div>
            </section>

        </section>

    <!-- ==================== End Book Area ==================== -->

    <script type="text/javascript">
        function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        return {
            'total': t,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
        }

        function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
            clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>

    </main>
    
    <!-- ========================= End Main Area ========================= -->

    <?php 
    
    include('partials-front/footer.php');

    ?>