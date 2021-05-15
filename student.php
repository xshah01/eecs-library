<?php 

include('partials-front/header-student.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-student">
            <div class="bg-image-student"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">

                            <?php 
                            
                            include('config.php');

                                /* Check whether student is set or not */
                                if(isset($_SESSION['email'])) {

                                    $email = $_SESSION['email'];

                                    /* Get all details based on email */                   
                                    $sql2 = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the name

                                    $res2 = mysqli_query($conn, $sql2); //Execute the query

                                    $count2 = mysqli_num_rows($res2); //Check whether data is available or not

                                    /* Check whether reservation data has been retrieved or not */
                                    if($count2 == 1) {

                                        $row2 = mysqli_fetch_assoc($res2);   //Retrieve the details
                                                                    
                                        $full_name = $row2['full_name'];

                                        ?>

                                        <h3 class="student-title text-center"><?php echo $full_name ?></h3>

                                        <?php

                                    }

                                    else {  
                                                
 
                                        }

                                }

                                else {


                                }

                            ?>

                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="account-title">
                    <h1 class="title text-center">My account</h1>
                    <p></p>
                </div>            
                
                <div class="container">
                    <div class="row">
                        <div class="column-left">
                            <div class="my-information">
                                <div class="col-xl-11">

                                <style>
                                        div.ex1 { 
                                        margin-left: -175px;
                                        }
                                    </style>

                                    <div class="admin-message ex1">

                                    <!-- Display message Admin message -->
                                    <?php 

                                    include('config.php');

                                        if(isset($_SESSION['update'])) {
                                            echo $_SESSION['update'];  //Display session message
                                            unset($_SESSION['update']);   //Remove session message
                                        }

                                        if(isset($_SESSION['change-password'])) {
                                            echo $_SESSION['change-password'];  //Display session message
                                            unset($_SESSION['change-password']);   //Remove session message
                                            
                                        }
                
                                        if(isset($_SESSION['wrong-password'])) {
                                            echo $_SESSION['wrong-password'];  //Display session message
                                            unset($_SESSION['wrong-password']);   //Remove session message
                                        }
                
                                        if(isset($_SESSION['password-not-match'])) {
                                            echo $_SESSION['password-not-match'];  //Display session message
                                            unset($_SESSION['password-not-match']);   //Remove session message
                                        }

                                        if(isset($_SESSION['delete'])) {
                                            echo $_SESSION['delete'];  //Display session message
                                            unset($_SESSION['delete']);   //Remove session message
                                        }

                                        if(isset($_SESSION['recycle'])) {
                                            echo $_SESSION['recycle'];  //Display session message
                                            unset($_SESSION['recycle']);   //Remove session message
                                        }

                                        if(isset($_SESSION['delete-reservation'])) {
                                            echo $_SESSION['delete-reservation'];  //Display session message
                                            unset($_SESSION['delete-reservation']);   //Remove session message
                                        }

                                    ?>

                                    </div>

                                    <br>
                                
                                    <h4>My information</h4>

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

                                                ?>
                                                    <p class="name"><?php echo $full_name; ?><p>
                                                    <p><?php echo $email; ?><p>
                                                    <p><?php echo $phone; ?><p>
                                                <?php

                                            }

                                            else {
                                                
                                            
                                            }

                                        }
                                        
                                        else {


                                        }

                                    ?>

                                        <br>
                                        <a href="<?php echo SITEURL; ?>update-student.php?id=<?php echo $id; ?>"><p class="edit">
                                                Account settings ›</p>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>change-password-student.php?id=<?php echo $id; ?>"><p class="edit">
                                                Change password ›</p>
                                        </a>
                                        <br><br><br>
                                        <button
                                            onclick="window.location.href='logout-student.php';">Logout
                                        </button>      
                                        <br><br><br>           
                                </div>
                            </div>
                        </div>
                        <div class="column-right-student">                              
                            <div class="books"> 
                                <div class="col-xl-11">
                                    <br>
                                    <h4>Books and services</h4>
                                        <a href="#reservations"><p class="edit">
                                            My reservations ›</p>
                                        </a>
                                        <a href="#loans"><p class="edit">
                                            My loans ›</p>
                                        </a>
                                        <a href="#recycled-books"><p class="edit">
                                            Recycled books ›</p>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br>

                <div class="reservations" id=reservations>

                <div class="divider"></div>

                <br><br><br><br><br>

                    <div class="reservation-title">
                        <h1 class="title text-center">Reservations</h1>
                        <p></p>
                    </div>   

                        <?php

                        include('config.php');

                            //SQL Query to get the reservation ID    
                            $sql10 = "SELECT * FROM tbl_reservation WHERE student_email = '$email' AND status = 'Reserved'
                            ORDER BY id ASC";
                                    
                            //SQL Query for reservations based on student_email        
                            $sql3 = "SELECT * FROM tbl_reservation 
                                INNER JOIN tbl_book 
                                ON tbl_reservation.ISBN = tbl_book.ISBN 
                                WHERE student_email = '$email'
                                AND status = 'Reserved' 
                                ORDER BY reservation_date DESC";

                                //Execute queries
                                $res3 = mysqli_query($conn, $sql3);
                                $res10 = mysqli_query($conn, $sql10);

                                //Check whether queries is executed or not
                                if($res3 == TRUE AND $res10 == TRUE) {

                                    //Count rows to check whether we have data in database or not
                                    $count3 = mysqli_num_rows($res3);  //Function to get all rows in database
                                    $count10 = mysqli_num_rows($res10);

                                    //Check the number of rows
                                    if($count3 > 0) {
                                        //We have data in database
                                        //While loop get all data from database and will run as long as there is data to fetch
                                        while($rows3 = mysqli_fetch_assoc($res3) AND $rows10 = mysqli_fetch_assoc($res10)) {
                                            $id = $rows10['id'];    //From tbl_reservation
                                            //From sql3
                                            $title = $rows3['book'];
                                            $author = $rows3['author'];
                                            $edition = $rows3['edition'];
                                            $ISBN = $rows3['ISBN'];
                                            $image_name = $rows3['image_name'];
                                            $reservation_date = $rows3['reservation_date'];

                        ?>

                        <!-- Display Reservations -->

                        <div class="boxes-books">
                            <div class="column-image">
                                <div class="book-img">
                                    <?php
                                        if($image_name != "") {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/books/<?php echo $image_name; ?>" alt="">
                                            <?php
                                        }
                                        else {
                                            echo "Image not found";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="column-description">
                                <div class="book-description">
                                    <h4><?php echo $title; ?></h4>
                                        <p class="author"><?php echo $author; ?></p>
                                        <p class="edition"><?php echo $edition; ?></p> 
                                        <p class="ISBN"><?php echo $ISBN; ?></p>
                                        <p class="date"><?php echo $reservation_date; ?>
                                            (Pick up this book no later than the next day 
                                            or you reservation will be terminated)
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                            <a href="<?php echo SITEURL; ?>cancel-reservation.php?id=<?php echo $id; ?>">
                                                CANCEL <i class="fas fa-ban"></i>
                                            </a>
                                        </p>
                                </div>
                            </div>
                        </div>

                        <?php

                                        } 

                                    }
                                            
                                    else {

                                        echo "<div class='no-reservations-loans'>No Active Reservations</div>";
                                            
                                    }
                        
                                }

                                else {

                                    echo "<div class='no-reservations-loans'>No Active Reservations</div>";
                                        
                                }

                        ?>

                </div>

                <div class="clearfix"></div>

                <div class="loans" id="loans">

                    <div class="divider"></div>

                    <br><br><br><br><br>

                    <div class="loans-title">
                        <h1 class="title text-center">Loans</h1>
                        <p></p>
                    </div>   

                    <?php

                        include('config.php');
                                    
                            //SQL Query for reservations based on student_email        
                            $sql4 = "SELECT * FROM tbl_reservation 
                                INNER JOIN tbl_book 
                                ON tbl_reservation.ISBN = tbl_book.ISBN 
                                WHERE student_email = '$email'
                                AND status = 'Active'
                                ORDER BY reservation_date DESC";

                                //Execute query
                                $res4 = mysqli_query($conn, $sql4);

                                //Check whether query is executed or not
                                if($res4 == TRUE) {

                                    //Count rows to check whether we have data in database or not
                                    $count4 = mysqli_num_rows($res4);  //Function to get all rows in database

                                    //Check the number of rows
                                    if($count4 > 0) {
                                        //We have data in database
                                        //While loop get all data from database and will run as long as there is data to fetch
                                        while($rows4 = mysqli_fetch_assoc($res4)) {
                                            $title = $rows4['book'];
                                            $author = $rows4['author'];
                                            $edition = $rows4['edition'];
                                            $ISBN = $rows4['ISBN'];
                                            $image_name = $rows4['image_name'];
                                            $reservation_date = $rows4['reservation_date'];

                                            /* Calculate "remaining days of loan" */
                                            $date1 = new DateTime('now');  //Current date
                                            $date2 = new DateTime(date('Y-m-d', strtotime($reservation_date. ' + 60 days'))) ;   //Future date
                                            $diff = $date2->diff($date1)->format("%a");  //Find difference
                                            $days = intval($diff);   //Rounding days

                        ?>

                        <!-- Display Active Loans -->

                        <div class="boxes-books">
                            <div class="column-image">
                                <div class="book-img">
                                    <?php
                                        if($image_name != "") {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/books/<?php echo $image_name; ?>" alt="">
                                            <?php
                                        }
                                        else {
                                            echo "Image not found";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="column-description">
                                <div class="book-description">
                                    <h4><?php echo $title; ?></h4>
                                        <p class="author"><?php echo $author; ?></p>
                                        <p class="edition"><?php echo $edition; ?></p> 
                                        <p class="ISBN"><?php echo $ISBN; ?></p>
                                        <p class="date">
                                        <?php 
                                
                                            /* Display days in different colors */
                                            if($days <= "1") {
                                                echo "Days remaining: <label style='color: red';>$days</label>";
                                            }
                                            elseif($days <= "5") {
                                                echo "Days remaining: <label style='color: orange';>$days</label>";
                                            }
                                            else {
                                                echo "Days remaining: <label style='color: blue';>$days</label>";
                                            }

                                        ?>
                                        </p>

                                </div>
                            </div>
                        </div>

                        <?php

                                        }       
                                    }
                                            
                                    else {

                                        echo "<div class='no-reservations-loans'>No Active Loans</div>";
                                            
                                    }
                        
                                }

                                else {

                                    echo "<div class='no-reservations-loans'>No Active Loans</div>";
                                        
                                }

                        ?>

                        <?php

                        include('config.php');
                                    
                            //SQL Query for reservations based on student_email        
                            $sql5 = "SELECT * FROM tbl_reservation 
                                INNER JOIN tbl_book 
                                ON tbl_reservation.ISBN = tbl_book.ISBN 
                                WHERE student_email = '$email'
                                AND status = 'Inactive'";

                                //Execute query
                                $res5 = mysqli_query($conn, $sql5);

                                //Check whether query is executed or not
                                if($res5 == TRUE) {

                                    //Count rows to check whether we have data in database or not
                                    $count5 = mysqli_num_rows($res5);  //Function to get all rows in database

                                    //Check the number of rows
                                    if($count5 > 0) {
                                        //We have data in database
                                        //While loop get all data from database and will run as long as there is data to fetch
                                        while($rows5 = mysqli_fetch_assoc($res5)) {
                                            $title = $rows5['book'];
                                            $author = $rows5['author'];
                                            $edition = $rows5['edition'];
                                            $ISBN = $rows5['ISBN'];
                                            $image_name = $rows5['image_name'];

                        ?>

                        <!-- Display Inactive Loans -->

                        <div class="boxes-books">
                            <div class="column-image">
                                <div class="book-img">
                                    <?php
                                        if($image_name != "") {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/books/<?php echo $image_name; ?>" alt="">
                                            <?php
                                        }
                                        else {
                                            echo "Image not found";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="column-description">
                                <div class="book-description">
                                    <h4><?php echo "<label style='color: red';>$title</label>"; ?></h4>
                                        <p class="author"><?php echo "<label style='color: red';>$author</label>"; ?></p>
                                        <p class="edition"><?php echo "<label style='color: red';>$edition</label>"; ?></p> 
                                        <p class="ISBN"><?php echo "<label style='color: red';>$ISBN</label>"; ?></p>
                                        <p class="date"><?php echo "Days remaining: <label style='color: red';>0</label> 
                                        (Return this book as soon as possible to avoid late fee)"; ?></p>

                                </div>
                            </div>
                        </div>

                        <?php

                                        }       
                                    }
                                            
                                    else {
                                                                            
                                            
                                    }

                                }

                                else {

                                        
                                }

                        ?>

                </div>
                    
                    <div class="clearfix"></div>

                <div class="recycled-books" id="recycled-books">

                    <div class="divider"></div>

                    <br><br><br><br><br>

                    <div class="recycled-books-title">
                        <h1 class="title text-center">Recycled Books</h1>
                            <p></p>
                            <div class="title2 text-center">
                                <h1>How many books have I recycled so far?</h1>
                            </div>
                            <div class="arrow text-center" style='padding-top: 100px; font-size: 50px;'>&#8595;</div>
                            <div class="book-body" style='padding-top: 100px;'>

                            <?php

                            include('config.php');

                                /* Get all details based on email */                   
                                $sql6 = "SELECT * FROM tbl_recycle WHERE student_email = '$email' 
                                AND status = 'Active' OR status = 'Waiting' "; //Create SQL query to retrieve the recycles

                                $res6 = mysqli_query($conn, $sql6); //Execute the query

                                $count6 = mysqli_num_rows($res6); //Check whether data is available or not

                            ?>

                                <div class="book">
                                    <div class="back"></div>
                                    <div class="page6"><?php echo $count6; ?></div>
                                    <div class="page5"></div>
                                    <div class="page4"></div>
                                    <div class="page3"></div>
                                    <div class="page2"></div>
                                    <div class="page1"></div>
                                    <div class="front">
                                        <div>Open me :)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="title3 text-center" style='padding-top: 100px;'>

                            <?php

                            include('config.php');

                                /* Get all details based on email */                   
                                $sql7 = "SELECT * FROM book_recycle "; //Create SQL query to retrieve the recycled loans

                                $res7 = mysqli_query($conn, $sql7); //Execute the query

                                $sql8 = "SELECT * FROM tbl_recycle INNER JOIN book_recycle
                                ON tbl_recycle.ISBN = book_recycle.ISBN
                                WHERE student_email = '$email' 
                                AND status = 'Active' ";

                                $res8 = mysqli_query($conn, $sql8); //Execute the query

                                $count8 = mysqli_num_rows($res8); //Check whether data is available or not

                                /* Get all details based on email */                   
                                $sql9 = "SELECT * FROM tbl_recycle WHERE student_email = '$email' 
                                AND status = 'Waiting' "; //Create SQL query to retrieve the pedning recycles

                                $res9 = mysqli_query($conn, $sql9); //Execute the query

                                $count9 = mysqli_num_rows($res9); //Check whether data is available or not
                                
                            ?>

                                <h1><?php echo $count8; ?> book(s)<sup>*</sup> <i class="fas fa-book"></i> in total are available
                                for reservation and ready to
                            </div>
                            <div class="title3 text-center" style='padding-top: 20px;'>
                                <h1>enrich and improve other students education <i class="fas fa-graduation-cap"></i></h1>
                            </div>
                            <div class="title3-mini text-center" style='padding-top: 20px;'>
                                <h1><sup>*</sup> <?php echo $count9; ?> book(s) are still pending for registration by admin</h1>
                            </div>
                            <div class="arrow text-center" style='padding-top: 100px; font-size: 50px;'>&#8595;</div>
                            <div class="title3 text-center" style='padding-top: 100px;'>
                                <h1>I have reduced my carbon footprint by saving <?php echo ($count8 * 7.5); ?> kg CO<sub>2</sub>!
                                <a href="http://www.takepart.com/article/2014/01/29/using-digital-readers-reduce-carbon-footprint">
                                    <sup>1</sup></h1>
                                </a>
                            </div>
                            <div class="title4 text-center" style='padding-top: 20px;'>
                                <h1>Making this planet <i class="fas fa-globe-americas"></i> a better place
                                </h1>
                            </div>
                            <div class="arrow text-center" style='padding-top: 100px; font-size: 50px;'>&#8595;</div>
                            <div class="title5 text-center" style='padding-top: 100px;'>
                                <a href="recycle-page.php">
                                    <h1>I want to recycle books <i class="fas fa-book"></i> ›</h1>
                                </a>    
                            </div>
	

                    <br><br><br><br><br> 

            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 

    include('partials-front/footer.php');

    ?>