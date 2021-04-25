<?php 

include('partials-front-admin/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-books">
            <div class="bg-image-accounts"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="books-title text-center">Books</h3>
                            <h2></h2>
                        </div>    
                    </div> 
                </div>
            </div>    
            <div class="main-content">
                <div class="wrapper">
                    <div class="manage-books-title">
                        <h4 class="title">Manage Books</h4>
                    </div>

                    <div class="admin-message">

                    <!-- Display message Admin message -->
                    <?php 

                    include('config.php');
                    include('login-check.php');

                        if(isset($_SESSION['upload'])) {
                            echo $_SESSION['upload'];  //Display session message
                            unset($_SESSION['upload']);   //Remove session message
                        }

                        if(isset($_SESSION['add'])) {
                            echo $_SESSION['add'];  //Display session message
                            unset($_SESSION['add']);   //Remove session message
                        }

                        if(isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];  //Display session message
                            unset($_SESSION['delete']);   //Remove session message
                        }

                        if(isset($_SESSION['no-book-found'])) {
                            echo $_SESSION['no-book-found'];  //Display session message
                            unset($_SESSION['no-book-found']);   //Remove session message
                        }

                        if(isset($_SESSION['remove'])) {
                            echo $_SESSION['remove'];  //Display session message
                            unset($_SESSION['remove']);   //Remove session message
                        }

                        if(isset($_SESSION['upload'])) {
                            echo $_SESSION['upload'];  //Display session message
                            unset($_SESSION['upload']);   //Remove session message
                        }

                        if(isset($_SESSION['failed-to-remove-current-image'])) {
                            echo $_SESSION['failed-to-remove-current-image'];  //Display session message
                            unset($_SESSION['failed-to-remove-current-image']);   //Remove session message
                        }

                        if(isset($_SESSION['update'])) {
                            echo $_SESSION['update'];  //Display session message
                            unset($_SESSION['update']);   //Remove session message
                        }

                    ?>

                    </div>

                    <br><br>

                    <div class="add-book-button">
                    <!-- Button to add admin -->
                    <button type="button" class="btn-add-book mr-4" 
                        onclick="window.location.href='add-book.php';">add book
                    </button>
                    </div>

                    <table class="tbl-full">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>ISBN</th>
                            <th>Language</th>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Manage</th>
                        </tr>

                        <?php 

                        include('config.php');
                        include('login-check.php');

                        $sql = "SELECT * FROM tbl_book";

                        //Execute query
                        $res = mysqli_query($conn, $sql);

                        //Check whether query is executed or not
                        if($res == TRUE) {

                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res);  //Function to get all rows in database

                            $sn = 3001;

                            //Check the number of rows
                            if($count > 0) {
                                //We have data in database
                                //While loop get all data from database and will run as long as there is data to fetch
                                while($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];  //Get data
                                    $title = $rows['title'];
                                    $author = $rows['author'];
                                    $edition = $rows['edition'];
                                    $ISBN = $rows['ISBN'];
                                    $language = $rows['language'];
                                    $image_name = $rows['image_name'];
                                    $active = $rows['active'];

                        ?>
                                    
                                <!-- Display the values in our table -->
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $author; ?></td>
                                    <td><?php echo $edition; ?></td>
                                    <td><?php echo $ISBN; ?></td>
                                    <td><?php echo $language; ?></td>
                                    
                                    <td>
                                        <?php
                                        
                                            //Check whether the image is available or not
                                            if($image_name != "") {
                                                //Display the image
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>img/books/<?php echo $image_name; ?>"width="80px">
                                                <?php
                                            }
                                            else {
                                                echo "Image not added"; //Display message
                                            }

                                        ?>
                                    </td>

                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>update-book.php?id=<?php echo $id; ?>">
                                            <button type="button" class="btn-update-book mr-4">update book</button>
                                        </a>
                                        <a href="<?php echo SITEURL; ?>delete-book.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>">
                                            <button type="button" class="btn-delete-book mr-4">delete book</button>
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