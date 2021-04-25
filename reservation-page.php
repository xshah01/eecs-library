    <?php 
    
    include('partials-front/header.php');

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
                                </div>
                        </div>
                                <div class="contact-form">
                                <legend>Personal Details</legend>
                                        <input name="full-name" type="text" class="form-control" placeholder="Full name" required>
                                        <br>
                                        <input name="email" type="text" class="form-control" placeholder="Email" required>
                                        <br>
                                        <input name="phone" type="text" class="form-control" placeholder="Phone">
                                        <br>
                                        <input name="submit" type="submit" class="form-control submit" value="Reserve your book">
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
                                        $status = "Reserved";   //Reserved, Active, Inactive
                                        $student_name = $_POST['full-name'];
                                        $student_email = $_POST['email'];
                                        $student_phone = $_POST['phone'];

                                        /* Save the reservation in database */
                                        $sql2 = "INSERT INTO tbl_reservation SET 
                                                book = '$book',
                                                author = '$author',
                                                edition = '$edition',
                                                status = '$status',
                                                student_name = '$student_name',
                                                student_email = '$student_email',
                                                student_phone = '$student_phone',
                                                reservation_date = current_timestamp() ";

                                        /* Execute the query */
                                        $res2 = mysqli_query($conn, $sql2);

                                        /* Check whether query is executed successfullt or not */
                                        if($res2 == TRUE) {

                                            $_SESSION['reservation'] = "Book reserved succesfully";
                                            header("location: ".SITEURL.'books.php');    //Display message on the same page

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