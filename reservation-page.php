    <?php 
    
    include('partials-front/header.php');
    include('login-check-student.php');

    ?>

    <?php  

    include('config.php');

        /* Check whether id is passed or not */
        if(isset($_GET['book_id'])) {

            $book_id = $_GET['book_id'];    //Book id is set, get the id
            
            /* Get the details based on book id */
            $sql = "SELECT * FROM tbl_book WHERE id=$book_id";

            /* Execute the query */
            $res = mysqli_query($conn, $sql);
            
            /* Count the rows */
            $count = mysqli_num_rows($res);

            /* Check whether the data is available or not */
            if($count == 1) {

                /* Get the data from database */
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $author = $row['author'];
                $edition = $row['edition'];
                $ISBN = $row['ISBN'];
                $language = $row['language'];
                $image_name = $row['image_name'];

            }

            else {
  
                header("location: ".SITEURL.'books.php');   //Redirect to book page

            }

        }

        else { 

            header("location: ".SITEURL.'books.php');   //Redirect to book page

        }

    ?>

    <?php 

    include('config.php');

        /* Check whether student is set or not */
        if(isset($_SESSION['email'])) {

            $email = $_SESSION['email'];                                       

            /* Get all details based on email */                   
            $sql3 = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the details

            $res3 = mysqli_query($conn, $sql3); //Execute the query

            $count3 = mysqli_num_rows($res3); //Check whether data is available or not

            /* Check whether reservation data has been retrieved or not */
            if($count3 == 1) {

                $row3 = mysqli_fetch_assoc($res3);   //Retrieve the details

                $id = $row3['id'];  //Get individual data                            
                $full_name = $row3['full_name'];
                $email = $row3['email'];
                $phone = $row3['phone'];

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

                                <?php 

                                    /* Check whether the image is available or not */
                                    if($image_name != "") {

                                        ?>
                                            <img src="<?php echo SITEURL; ?>img/books/<?php echo $image_name; ?>" alt="" width=200px>
                                        <?php

                                    }

                                    else {

                                        echo "Image not available";

                                    }

                                ?>

                            </div>
                            <form method="POST" action="">
                                <div class="book-description">
                                    <h4><?php echo $title; ?></h4>
                                    <input type="hidden" name="book" value="<?php echo $title; ?>">
                                        <p class="author"><?php echo $author; ?></p>
                                        <input type="hidden" name="author" value="<?php echo $author; ?>">
                                        <p class="edition"><?php echo $edition; ?></p>
                                        <input type="hidden" name="edition" value="<?php echo $edition; ?>">
                                        <p class="ISBN"><?php echo $ISBN; ?></p>
                                        <input type="hidden" name="ISBN" value="<?php echo $ISBN; ?>">
                                        <p class="language"><?php echo $language; ?></p>
                                        <input type="hidden" name="language" value="<?php echo $language; ?>">
                                </div>
                        </div>
                                <div class="contact-form">
                                <legend>Personal Details</legend>
                                        <input name="full-name" type="text" class="form-control" placeholder="Full name" value="<?php echo $full_name; ?>" required>
                                        <br>
                                        <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
                                        <br>
                                        <input name="phone" type="text" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>">
                                        <br>
                                        <a href="<?php echo SITEURL; ?>confirmation-page.php?book_id=<?php echo $book_id; ?>">
                                            <input name="submit" type="submit" class="form-control submit" value="Reserve your book">  
                                        </a>
                                    </form>
                                </div>

                                <?php 
                                    
                                include('config.php');
                                                            
                                    /* Check whether submit button is clicked or not */
                                    if(isset($_POST['submit'])) {
                                                            
                                        /* Get all details from Form */
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

                                        /* Execute the query */
                                        $res2 = mysqli_query($conn, $sql2);

                                        /* Check whether query is executed successfully or not */
                                        if($res2 == TRUE) {

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