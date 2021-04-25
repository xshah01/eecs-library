    <?php 
    
    include('partials-front/header.php');

    ?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-books">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <h3 class="books-title text-center">Books</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->

            <!-- ==================== Start Book Search Area ==================== -->

            <section class="book-search">
                <div class="container">
                    <form action="<?php echo SITEURL; ?>book-search.php" class="search-bar text-center" method="POST">
                        <input type="search" name="search" placeholder="Search for your book here ... ">
                        <input type="submit" name="submit" value="›">
                    </form>
                </div>
            </section>

            <!-- ==================== End Book Search Area ==================== -->

            <!-- ==================== Start Categories Area ==================== -->

            <section class="categories">
                <div class="container">
                    <h1>Categories</h1>

                    <?php 
                    
                        /* Display all categories that are active */

                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'"; //SQL query

                        $res = mysqli_query($conn, $sql);   //Execute the query

                        $count = mysqli_num_rows($res); //Count rows

                        /* Check whether categories are available or not */
                        if($count > 0) {

                            while($row=mysqli_fetch_assoc($res)) {

                                /* Get the values */
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];

                                /* Display the categories */
                                
                                ?>
                            
                                <a href="<?php echo SITEURL; ?>category-search.php?category_id=<?php echo $id; ?>">
                                    <div class="boxes-category">
                                        <?php
                                            if($image_name != "") {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>img/categories/<?php echo $image_name; ?>" alt="">
                                                <?php
                                            }
                                            else {
                                                echo "Image not found";
                                            }
                                        ?>
                                    </div>
                                </a>

                                <?php

                            }

                        }

                        else {

                            echo "Category not found";

                        }

                    ?>

                        <div class="clearfix"></div>
                </div>
            </section>

            <!-- ==================== End Categories Area ==================== -->

            <!-- ==================== Start Book Area ==================== -->

            <section class="books">
                <div class="container">
                    <h1>Books</h1>

                        <?php 
                    
                            /* Display all books that are active */

                            $sql2 = "SELECT * FROM tbl_book WHERE active='Yes'"; //SQL query

                            $res2 = mysqli_query($conn, $sql2);   //Execute the query

                            $count2 = mysqli_num_rows($res2); //Count rows

                            /* Check whether books are available or not */
                            if($count2 > 0) {

                                while($row=mysqli_fetch_assoc($res2)) {

                                    /* Get the values */
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $author = $row['author'];
                                    $edition = $row['edition'];
                                    $image_name = $row['image_name'];

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
                                                    onclick="window.location.href='reservation-page.php?book_id=<?php echo $id; ?>';">Reserve Book
                                                </button>
                                            </div>
                                        </div>

                                    <?php

                                }

                            }

                            else {

                                echo "Books not found";
            
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