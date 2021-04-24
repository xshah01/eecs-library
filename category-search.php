<?php 
    
    include('partials-front/header.php');

    ?>

    <?php  

    include('config.php');

        /* Check whether id is passed or not */
        if(isset($_GET['category_id'])) {

            $category_id = $_GET['category_id'];    //Category id is set, get the id
            
            /* Get the category title based on category id */
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            /* Execute the query */
            $res = mysqli_query($conn, $sql);
            
            /* Get the value from database*/
            $row = mysqli_fetch_assoc($res);

            /* Get the title */
            $category_title = $row['title'];

        }

        else {

            header("location: ".SITEURL.'books.php');   //Redirect to book page

        }

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-category-book-search">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <h3 class="books-title text-center">"<?php echo $category_title; ?>"</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->
            
            <!-- ==================== Start Book Area ==================== -->

            <section class="category-book-search">
                <div class="container">
                    <h1>Books</h1>

                        <?php 

                        include('config.php');

                            /* SQL query to get the books based on category */
                            $sql2 = "SELECT * FROM tbl_book WHERE category_id=$category_id";  

                            /* Execute the query */
                            $res2 = mysqli_query($conn, $sql2);

                            /* Count rows */
                            $count2 = mysqli_num_rows($res2);

                            /* Check whether the books are available or not */
                            if($count2 > 0) {

                                while($row2=mysqli_fetch_assoc($res2)) {

                                    /* Get the values */
                                    $title = $row2['title'];
                                    $author = $row2['author'];
                                    $edition = $row2['edition'];
                                    $image_name = $row2['image_name'];

                                    /* Display the books */

                                    ?>

                                        <div class="boxes-books">
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
                                            <div class="book-description">
                                                <h4><?php echo $title; ?></h4>
                                                <p class="author"><?php echo $author; ?></p>
                                                <p class="edition"><?php echo $edition; ?></p>
                                                <button type="button" class="btn-reserve-book" 
                                                    onclick="window.location.href='#';">Reserve Book
                                                </button>
                                            </div>
                                        </div>

                                    <?php

                                }

                            }

                            else {

                                echo "Books not Found";

                            }


                        ?>

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