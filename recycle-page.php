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

<section id="scroll" class="site-banner-recycle-page">
    <div class="bg-image-books"></div>
        <div class="col-lg-7">
            <h3 class="books-title text-center">Book recycle</h3>
            <h2></h2>
        </div>

<!-- ==================== End Banner Area ==================== -->
    
    <!-- ==================== Start Book Area ==================== -->

    <section class="recycle-page">
    <br><br><br>
        <div class="container">
            <div class="wrap">
                <div class="book-recycle-floatleft">
                    <div class="inner-box">
                        <div class="book-recycle-title text-center">
                            <h1>Recycle your books</h1>
                            <h2></h2>
                        </div>
                        <div class="book-recycle-description">
                            <p>
                                Books are an important part of our lives. Yet, many of us still struggle 
                                with old and unwanted books that takes up space in our shelves. When you decide 
                                it's time to part with them, we want you to know that they can go to a nice home 
                                where they can continue to enrich and improve other students education. 
                                We gratefully accept all kinds of books.
                                <br><br>
                                By recycling unused books, you will make an even greater impact by conserving resources
                                and finances that will generate less paper waste, ultimately reducing your carbon foot print.
                                Book by book, we encourage you to embark on this greater and meaningful cause in making
                                this planet a better place to live for the generations to come.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="book-recycle-floatright">
                    <div class="recycle-form">
                        <form id="recycle-form" action="" method="POST">
                            <legend>Book details</legend>
                            <br><br>
                            <input name="title" type="text" class="form-control" placeholder="Title" required>
                            <br>
                            <input name="author" type="text" class="form-control" placeholder="Author" required>
                            <br>
                            <input name="edition" type="text" class="form-control" placeholder="Edition" required>
                            <br>
                            <input name="ISBN" type="text" class="form-control" placeholder="ISBN" required>
                            <br>
                            <input name="language" type="text" class="form-control" placeholder="Language" required>
                            <br><br>
                            <legend>Personal details</legend>
                            <br><br>
                            <input name="full_name" type="text" class="form-control" placeholder="Full name" required>
                            <br>
                            <input name="email" type="text" class="form-control" placeholder="Email" required>
                            <br>
                            <input name="phone" type="text" class="form-control" placeholder="Phone">
                            <br><br>
                            <input name="condition" type="checkbox" required>
                            <label for="condition" class="checkbox">By checking this box, you indicate that you have read and understood our
                                <a href="book-condition-guidelines.php">book condition guidelines.</a>
                            </label>
                            <br><br><br>
                            <input type="submit" class="form-control submit" value="Recycle book">
                        </form>
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