<?php 
    
    include('partials-front/header.php');

?>

    <!-- ========================= Start Main Area ========================= -->

    <main class="site-main">

        <!-- ==================== Start Banner Area ==================== -->

        <section id="scroll" class="site-banner-category-book-search">
            <div class="bg-image-books"></div>
                <div class="col-lg-7">
                    <?php 
                    
                    include('config.php');

                        /* Get the search key word */
                        $search = $_POST['search'];

                    ?>
                    <h3 class="books-title text-center">"<?php echo $search; ?>"</h3>
                    <h2></h2>
                </div>

        <!-- ==================== End Banner Area ==================== -->
            
            <!-- ==================== Start Book Area ==================== -->

            <section class="category-book-search">
                <div class="container">
                    <h1>Books</h1>

                        <?php 

                        include('config.php');
                    
                            /* Get the search key word */
                            $search = $_POST['search'];

                            /* SQL query to get the books based on search key word */
                            $sql = "SELECT * FROM tbl_book WHERE 
                            title LIKE '%$search%' OR 
                            ISBN LIKE '%$search%' OR 
                            author LIKE '%$search%' ";  

                            /* Execute the query */
                            $res = mysqli_query($conn, $sql);

                            /* Count rows */
                            $count = mysqli_num_rows($res);

                            /* Check whether the books are available or not */
                            if($count > 0) {

                                while($row=mysqli_fetch_assoc($res)) {

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
                                                <a href="<?php echo SITEURL; ?>reservation-page.php?book_id=<?php echo $id; ?>">
                                                    <button 
                                                        type="button" class="btn-reserve-book">Reserve Book
                                                    </button>   
                                                </a>
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