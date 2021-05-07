    <?php 
    
    include('partials-front/header.php');
    include('login-check-student.php');

    ?>

    <?php 

    include('config.php');

        /* Check whether student is set or not */
        if(isset($_SESSION['email'])) {

            $email = $_SESSION['email'];                                       

            /* Get all details based on email */                   
            $sql = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the details

            $res = mysqli_query($conn, $sql); //Execute the query

            $count = mysqli_num_rows($res); //Check whether data is available or not

            /* Check whether reservation data has been retrieved or not */
            if($count == 1) {

                $row = mysqli_fetch_assoc($res);   //Retrieve the details

                $id = $row['id'];  //Get individual data                            
                $full_name = $row['full_name'];
                $email = $row['email'];
                $phone = $row['phone'];

            }

            else {
                
            
            }

        }
        
        else {


        }

    ?>

        <!-- ========================= Start Main Area ========================= -->

        <main class="site-main">

<!-- ==================== Start Banner Area ==================== -->

<section id="scroll" class="site-banner-reservation-page">
    <div class="bg-image-books"></div>
        <div class="col-lg-7">
            <h3 class="books-title text-center">Book recycle</h3>
            <h2></h2>
        </div>

<!-- ==================== End Banner Area ==================== -->
    
    <!-- ==================== Start Book Area ==================== -->

    <section class="recycle-page">
        <div class="container">
            <div class="wrap">
                <div class="book-recycle-floatleft">
                    <div class="contact-us-title tex-center">
                        <h1>Get in touch with us</h1>
                    </div>
                    <div class="book-recycle-description">
                        textbeskrivning + CO2 fakta
                    </div>
                </div>
                <div class="book-recycle-floatright">
                    <div class="find-us-title col-sm-3">
                        <h1>Find us</h1>
                        <p>Isafjordsgatan 22
                            164 40 Kista</p>
                    </div>
                    <div class="maps">

                    </div>
                </div>
            </div>

            <?php 
                
            include('config.php');
                                        
                /* Check whether submit button is clicked or not */
                if(isset($_POST['submit'])) {
                                        
                    /* Get all details from Form */
                    $id = $_POST['book_id'];
                    $book = $_POST['book'];
                    $author = $_POST['author'];
                    $edition = $_POST['edition'];
                    $ISBN = $_POST['ISBN'];
                    $language = $_POST['language'];
                    $status = "Reserved";   //Reserved, Active, Inactive
                    $student_name = $_POST['full-name'];
                    $student_email = $_POST['email'];
                    $student_phone = $_POST['phone'];

                    /* Save the reservation in database */
                    $sql2 = "INSERT INTO tbl_reservation SET 
                            book = '$book',
                            author = '$author',
                            edition = '$edition',
                            ISBN = '$ISBN',
                            language = '$language',
                            status = '$status',
                            student_name = '$student_name',
                            student_email = '$student_email',
                            student_phone = '$student_phone',
                            reservation_date = current_timestamp() ";

                    /* Update Active = "No" in tbl_book */
                    $sql4 = "UPDATE tbl_book SET active = 'No' WHERE id = '$id' ";

                    /* Execute the queries */
                    $res2 = mysqli_query($conn, $sql2);
                    $res4 = mysqli_query($conn, $sql4);

                    /* Check whether query is executed successfully or not */
                    if($res2 == TRUE AND $res4 == TRUE) {

                        echo "<script>window.location.href='confirmation-page.php';</script>";    //Redirect to confirmation page

                    }

                    else {

                        $_SESSION['reservation'] = "Failed to reserve book";
                        header("location: ".SITEURL.'reservation-page.php');    //Display message on the same page

                    }
                                        
                }
                                        
                else {

                    header("location: ".SITEURL.'books.php');    //Redirect to book page

                }
                                        
            ?>

            <div class="admin-message">

                <?php 

                include('config.php');

                    if(isset($_SESSION['reservation'])) {
                        echo $_SESSION['reservation'];  //Display session message
                        unset($_SESSION['reservation']);  //Remove session message
                    }

                ?>

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