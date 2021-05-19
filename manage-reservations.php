<?php 

include('partials-front-admin/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-reservations">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="reservations-title text-center">Reservations/Loans</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-reservations-title">
                        <h1 class="title">Manage Reservations</h1>
                    </div>

                    <div class="admin-message">

                    <!-- Display message Admin message -->
                    <?php 

                    include('config.php');

                        if(isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];  //Display session message
                            unset($_SESSION['delete']);   //Remove session message
                        }

                        if(isset($_SESSION['update'])) {
                            echo $_SESSION['update'];  //Display session message
                            unset($_SESSION['update']);   //Remove session message
                        }

                    ?>

                    </div>

                    <!-- Display Reservations -->

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Book</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>ISBN</th>
                            <th>Language</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>Status</th>
                            <th>Resv Date</th>
                            <th>Manage</th>
                        </tr>

                        <?php

                        include('config.php');
                        
                            $sql = "SELECT * FROM tbl_reservation WHERE status='Reserved' OR status='Canceled' ";

                            /* Execute query */
                            $res = mysqli_query($conn, $sql);

                            /* Check whether query is executed or not */
                            if($res == TRUE) {

                                /* Count rows to check whether we have data in database or not */
                                $count = mysqli_num_rows($res);  //Function to get all rows in database

                                $sn = 3001;

                                /* Check the number of rows */
                                if($count > 0) {
                                    /* We have data in database */
                                    /* While loop get all data from database and will run as long as there is data to fetch */
                                    while($rows = mysqli_fetch_assoc($res)) {
                                        $id = $rows['id'];  //Get individual data
                                        $book = $rows['book'];
                                        $author = $rows['author'];
                                        $edition = $rows['edition'];
                                        $ISBN = $rows['ISBN'];
                                        $language = $rows['language'];
                                        $student_name = $rows['student_name'];
                                        $student_email = $rows['student_email'];
                                        $student_phone = $rows['student_phone'];
                                        $status = $rows['status'];
                                        $reservation_date = $rows['reservation_date'];

                                        /* Calculate "remaining day of reservation" */
                                        $date1 = new DateTime('now');  //Current date
                                        $date2 = new DateTime(date('Y-m-d', strtotime($reservation_date. ' + 2 days'))) ;   //Future date
                                        $diff = $date2->diff($date1)->format("%a");  //Find difference
                                        $days = intval($diff);   //Rounding days

                                        if($days == "0") {
                                            include('config.php');
                                            $sql4 = "DELETE FROM tbl_reservation WHERE id=$id"; //Query to delete reservation if reservation time has exceeded
                                            $res4 = mysqli_query($conn, $sql4);  //Execute the query
                                        }

                        ?>

                        <!-- Display the values in our table -->
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $book; ?></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $edition; ?></td>
                            <td><?php echo $ISBN; ?></td>
                            <td><?php echo $language; ?></td>
                            <td><?php echo $student_name; ?></td>
                            <td><?php echo $student_email; ?></td>
                            <td><?php echo $student_phone; ?></td>

                            <td>
                                <?php 
                                
                                    /* Display "Reserved", "Active", "Inactive" in different colors */
                                    if($status == "Reserved") {
                                        echo "<label style='color: blue';>$status</label>";
                                    }
                                    elseif($status == "Canceled") {
                                        echo "<label style='color: grey';>$status</label>";
                                    }
                                    elseif($status == "Active") {
                                        echo "<label style='color: green';>$status</label>";
                                    }
                                    elseif($status == "Inactive") {
                                        echo "<label style='color: red';>$status</label>";
                                    }
                                
                                ?>
                            </td>

                            <td><?php echo $reservation_date; ?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>update-reservation.php?id=<?php echo $id; ?>">
                                <button type="button" class="btn-update-reservation mr-4">update resv</button>
                            </a>
                            <a href="<?php echo SITEURL; ?>delete-reservation.php?id=<?php echo $id; ?>">
                                <button type="button" class="btn-delete-reservation mr-4">delete resv</button>
                            </a>
                            </td>
                        </tr>

                        <?php

                            }
                                    }
                                    else {
                                        exit(); // No data in database
                                    }

                            }

                            else {
                                echo "Reservations not available";
                            }

                        ?>

                    </table>
                    <div class="clearfix"></div>
                </div>

                <!-- Display Active Loans -->

                <div class="manage-reservations-title">
                        <h1 class="title">Active Loans</h1>
                </div>

                </div>

                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>ISBN</th>
                        <th>Language</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Status</th>
                        <th>Resv Date</th>
                        <th></th>
                        <th>Manage</th>
                    </tr>

                    <?php

                    include('config.php');
                    
                        $sql1 = "SELECT * FROM tbl_reservation WHERE status='Active' ";

                        /* Execute query */
                        $res1 = mysqli_query($conn, $sql1);

                        /* Check whether query is executed or not */
                        if($res1 == TRUE) {

                            /* Count rows to check whether we have data in database or not */
                            $count1 = mysqli_num_rows($res1);  //Function to get all rows in database

                            $sn1 = 4001;    //Active Loans

                            /* Check the number of rows */
                            if($count > 0) {
                                /* We have data in database */
                                /* While loop get all data from database and will run as long as there is data to fetch */
                                while($rows1 = mysqli_fetch_assoc($res1)) {
                                    $id = $rows1['id'];  //Get individual data
                                    $book = $rows1['book'];
                                    $author = $rows1['author'];
                                    $edition = $rows1['edition'];
                                    $ISBN = $rows1['ISBN'];
                                    $language = $rows1['language'];
                                    $student_name = $rows1['student_name'];
                                    $student_email = $rows1['student_email'];
                                    $student_phone = $rows1['student_phone'];
                                    $status = $rows1['status'];
                                    $reservation_date = $rows1['reservation_date'];

                                    /* Calculate "remaining days of loan" */
                                    $date1 = new DateTime('now');  //Current date
                                    $date2 = new DateTime(date('Y-m-d', strtotime($reservation_date. ' + 60 days'))) ;   //Future date
                                    $diff = $date2->diff($date1)->format("%a");  //Find difference
                                    $days = intval($diff);   //Rounding days

                    ?>

                    <!-- Display the values in our table -->
                    <tr>
                        <td><?php echo $sn1++; ?></td>
                        <td><?php echo $book; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $edition; ?></td>
                        <td><?php echo $ISBN; ?></td>
                        <td><?php echo $language; ?></td>
                        <td><?php echo $student_name; ?></td>
                        <td><?php echo $student_email; ?></td>
                        <td><?php echo $student_phone; ?></td>

                        <td>
                            <?php
                            
                                /* Display "Reserved", "Active", "Inactive" in different colors */
                                if($status == "Reserved") {
                                    echo "<label style='color: blue';>$status</label>";
                                }
                                elseif($status == "Canceled") {
                                    echo "<label style='color: black';>$status</label>";
                                }
                                elseif($status == "Active") {
                                    echo "<label style='color: green';>$status</label>";
                                }
                                elseif($status == "Inactive") {
                                    echo "<label style='color: red';>$status</label>";
                                }
                            
                            ?>
                        </td>

                        <td><?php echo $reservation_date; ?></td>
                        <td>
                                <?php 
                                
                                    /* Display days in different colors */
                                    if($days <= "57") {
                                        include('config.php');
                                        /* Query for automatically updating the status on an outdated loan */
                                        $sql3 = "UPDATE tbl_reservation SET status = 'Inactive' WHERE id='$id' ";
                                        /* Execute this Query */
                                        $res3 = mysqli_query($conn, $sql3);
                                        echo "<label style='color: red';>$days</label> days left";
                                    }
                                    elseif($days <= "5") {
                                        echo "<label style='color: orange';>$days</label> days left";
                                    }
                                    else {
                                        echo "<label style='color: blue';>$days</label> days left";
                                    }

                                ?>
                            </td>
                        <td>
                        <a href="<?php echo SITEURL; ?>update-loan.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn-update-reservation mr-4">update loan</button>
                        </a>
                        <a href="<?php echo SITEURL; ?>delete-reservation.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn-delete-reservation mr-4">delete loan</button>
                        </a>
                        </td>
                    </tr>

                    <?php

                        }
                                }
                                else {
                                    exit(); // No data in database
                                }

                        }

                        else {
                            echo "Loans not available";
                        }

                    ?>

                </table>
                <div class="clearfix"></div>
                </div>

                <!-- Display Inactive Loans -->

                <div class="manage-inactive-reservations-title">
                        <h1 class="title">Inactive Loans</h1>
                </div>

                </div>

                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>ISBN</th>
                        <th>Language</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Status</th>
                        <th>Resv Date</th>
                        <th></th>
                        <th>Manage</th>
                    </tr>

                    <?php

                    include('config.php');
                    
                        $sql2 = "SELECT * FROM tbl_reservation WHERE status='Inactive' ";

                        /* Execute query */
                        $res2 = mysqli_query($conn, $sql2);

                        /* Check whether query is executed or not */
                        if($res2 == TRUE) {

                            /* Count rows to check whether we have data in database or not */
                            $count2 = mysqli_num_rows($res2);  //Function to get all rows in database

                            $sn1 = 5001;    //Inactive Loans

                            /* Check the number of rows */
                            if($count > 0) {
                                /* We have data in database */
                                /* While loop get all data from database and will run as long as there is data to fetch */
                                while($rows2 = mysqli_fetch_assoc($res2)) {
                                    $id = $rows2['id'];  //Get individual data
                                    $book = $rows2['book'];
                                    $author = $rows2['author'];
                                    $edition = $rows2['edition'];
                                    $ISBN = $rows2['ISBN'];
                                    $language = $rows2['language'];
                                    $student_name = $rows2['student_name'];
                                    $student_email = $rows2['student_email'];
                                    $student_phone = $rows2['student_phone'];
                                    $status = $rows2['status'];
                                    $reservation_date = $rows2['reservation_date'];

                                    /* Calculate "remaining days of loan" */
                                    $date1 = new DateTime('now');  //Current date
                                    $date2 = new DateTime(date('Y-m-d', strtotime($reservation_date. ' + 60 days'))) ;   //Future date
                                    $diff = $date2->diff($date1)->format("%a");  //Find difference
                                    $days = intval($diff);   //Rounding days

                    ?>

                    <!-- Display the values in our table -->
                    <tr>
                        <td><?php echo $sn1++; ?></td>
                        <td><?php echo $book; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $edition; ?></td>
                        <td><?php echo $ISBN; ?></td>
                        <td><?php echo $language; ?></td>
                        <td><?php echo $student_name; ?></td>
                        <td><?php echo $student_email; ?></td>
                        <td><?php echo $student_phone; ?></td>

                        <td>
                            <?php
                            
                                /* Display "Reserved", "Active", "Inactive" in different colors */
                                if($status == "Reserved") {
                                    echo "<label style='color: blue';>$status</label>";
                                }
                                elseif($status == "Canceled") {
                                    echo "<label style='color: black';>$status</label>";
                                }
                                elseif($status == "Active") {
                                    echo "<label style='color: green';>$status</label>";
                                }
                                elseif($status == "Inactive") {
                                    echo "<label style='color: red';>$status</label>";
                                }
                            
                            ?>
                        </td>

                        <td><?php echo $reservation_date; ?></td>
                        <td>
                                <?php 
                                
                                    /* Display days in different colors */
                                    if($days <= "1") {
                                        echo "<label style='color: red';>$days</label> days left";
                                    }
                                    elseif($days <= "5") {
                                        echo "<label style='color: orange';>$days</label> days left";
                                    }
                                    else {
                                        echo "<label style='color: blue';>$days</label> days left";
                                    }

                                ?>
                            </td>
                        <td>
                        <a href="<?php echo SITEURL; ?>update-loan.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn-update-reservation mr-4">update loan</button>
                        </a>
                        <a href="<?php echo SITEURL; ?>delete-reservation.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn-delete-reservation mr-4">delete loan</button>
                        </a>
                        </td>
                    </tr>

                    <?php

                        }
                                }
                                else {
                                    exit(); // No data in database
                                }

                        }

                        else {
                            echo "Loans not available";
                        }

                    ?>

                </table>

            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 
    
    include('partials-front-admin/footer.php');

    ?>