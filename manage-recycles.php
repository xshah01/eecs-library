<?php 

include('partials-front-admin/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-recycles">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="recycle-title text-center">Book recycles</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-recycles-title">
                        <h1 class="title">Manage Book Recycles</h1>
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

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>ISBN</th>
                            <th>Language</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>

                        <?php

                        include('config.php');
                        
                            $sql = "SELECT * FROM tbl_recycle";

                            /* Execute query */
                            $res = mysqli_query($conn, $sql);

                            /* Check whether query is executed or not */
                            if($res == TRUE) {

                                /* Count rows to check whether we have data in database or not */
                                $count = mysqli_num_rows($res);  //Function to get all rows in database

                                $sn = 6001;

                                /* Check the number of rows */
                                if($count > 0) {
                                    /* We have data in database */
                                    /* While loop get all data from database and will run as long as there is data to fetch */
                                    while($rows = mysqli_fetch_assoc($res)) {
                                        $id = $rows['id'];  //Get individual data
                                        $title = $rows['title'];
                                        $author = $rows['author'];
                                        $edition = $rows['edition'];
                                        $ISBN = $rows['ISBN'];
                                        $language = $rows['language'];
                                        $student_name = $rows['student_name'];
                                        $student_email = $rows['student_email'];
                                        $student_phone = $rows['student_phone'];
                                        $status = $rows['status'];
                                        $reservation_date = $rows['reservation_date'];

                        ?>

                        <!-- Display the values in our table -->
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $edition; ?></td>
                            <td><?php echo $ISBN; ?></td>
                            <td><?php echo $language; ?></td>
                            <td><?php echo $student_name; ?></td>
                            <td><?php echo $student_email; ?></td>
                            <td><?php echo $student_phone; ?></td>

                            <td>
                                <?php 
                                
                                    /* Display "Waiting", "Active" in different colors */
                                    if($status == "Waiting") {
                                        echo "<label style='color: blue';>$status</label>";
                                    }
                                    elseif($status == "Active") {
                                        echo "<label style='color: green';>$status</label>";
                                    }
                                
                                ?>
                            </td>

                            <td>
                            <a href="<?php echo SITEURL; ?>update-recycle.php?id=<?php echo $id; ?>">
                                <button type="button" class="btn-update-recycle mr-4">update recycle</button>
                            </a>
                            <a href="<?php echo SITEURL; ?>delete-recycle.php?id=<?php echo $id; ?>">
                                <button type="button" class="btn-delete-recycle mr-4">delete recycle</button>
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
                                echo "Recycles not available";
                            }

                        ?>

                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>   

    </main>

    <!-- ========================= End Banner Area ========================= -->
    
    <!-- ========================= End Main Area ========================= -->

    <?php 
    
    include('partials-front-admin/footer.php');

    ?>