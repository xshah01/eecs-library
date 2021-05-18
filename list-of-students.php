<?php 

include('partials-front-admin/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-accounts">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="accounts-title text-center">Students</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-accounts-title">
                        <h1 class="title">List of Students</h1>
                    </div>

                    <div class="admin-message">

                    <!-- Display message Admin message -->
                    <?php 

                    include('config.php');

                        if(isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];  //Display session message
                            unset($_SESSION['delete']);   //Remove session message
                        }

                    ?>

                    </div>

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Manage</th>
                        </tr>

                        <?php

                        include('config.php');
                        
                        $sql = "SELECT * FROM tbl_student";

                        //Execute query
                        $res = mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);  //Function to get all rows in database

                            $sn = 8001;

                            //Check the number of rows
                            if($count > 0) {
                                //We have data in database
                                //While loop get all data from database and will run as long as there is data to fetch
                                while($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];  //Get individual data
                                    $full_name = $rows['full_name'];
                                    $email = $rows['email'];
                                    $phone = $rows['phone'];

                        ?>
                                    
                                <!-- Display the values in our table -->
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin-delete-student.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-delete-admin mr-4">delete student</button>
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
                            echo "Accounts not available";
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