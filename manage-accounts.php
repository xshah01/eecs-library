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
                            <h3 class="accounts-title text-center">Accounts</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-accounts-title">
                        <h1 class="title">Manage Accounts</h1>
                    </div>

                    <div class="admin-message">

                    <!-- Display message Admin message -->
                    <?php 

                    include('config.php');

                        if(isset($_SESSION['add'])) {
                            echo $_SESSION['add'];  //Display session message
                            unset($_SESSION['add']);   //Remove session message
                        }

                        if(isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];  //Display session message
                            unset($_SESSION['delete']);   //Remove session message
                        }

                        if(isset($_SESSION['update'])) {
                            echo $_SESSION['update'];  //Display session message
                            unset($_SESSION['update']);   //Remove session message
                        }

                        if(isset($_SESSION['admin-not-found'])) {
                            echo $_SESSION['admin-not-found'];  //Display session message
                            unset($_SESSION['admin-not-found']);   //Remove session message
                        }

                        if(isset($_SESSION['password-not-match'])) {
                            echo $_SESSION['password-not-match'];  //Display session message
                            unset($_SESSION['password-not-match']);   //Remove session message
                        }
                        
                        if(isset($_SESSION['change-password'])) {
                            echo $_SESSION['change-password'];  //Display session message
                            unset($_SESSION['change-password']);   //Remove session message
                        }

                    ?>

                    </div>

                    <br><br>

                    <div class="add-account-button">
                        <!-- Button to add admin -->
                        <button type="button" class="btn-add-admin mr-4" 
                            onclick="window.location.href='add-admin.php';">add admin ›
                        </button>
                    </div>

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>E-mail</th>
                            <th>Manage</th>
                        </tr>

                        <?php

                        include('config.php');
                        include('login-check.php');
                        
                        $sql = "SELECT * FROM tbl_admin";

                        //Execute query
                        $res = mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);  //Function to get all rows in database

                            $sn = 1001;

                            //Check the number of rows
                            if($count > 0) {
                                //We have data in database
                                //While loop get all data from database and will run as long as there is data to fetch
                                while($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];  //Get individual data
                                    $full_name = $rows['full_name'];
                                    $email = $rows['email'];

                        ?>
                                    
                                <!-- Display the values in our table -->
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>change-password.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-change-password mr-4">change password</button>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-update-admin mr-4">update admin</button>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-delete-admin mr-4">delete admin</button>
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