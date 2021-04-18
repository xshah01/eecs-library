<?php 

/* Conflict with data-filter when displaying books from the database.
   Possible sulution: create php-tag for every category and add that category in the sql query for retrieval.
   Or, skip this as the first page only is for "show" and not for actual functionality.
*/
                    
/* Display all books that are featured and active */

$sql = "SELECT * FROM tbl_book WHERE featured='Yes' AND active='Yes'"; //SQL query

$res = mysqli_query($conn, $sql);   //Execute the query

$count = mysqli_num_rows($res); //Count rows

/* Check whether books are available or not */
if($count > 0) {

    while($row=mysqli_fetch_assoc($res)) {

        /* Get the values */
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['title'];
        $image_name = $row['image_name'];

        /* Display the books */

        ?>

            <div class="col-lg-4 col-md-6 col-sm-12 book-thumbnail all calculus">
                <div class="img">
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
                <div class="col-md-8 title py-4">
                    <h4 class="text-uppercase"><?php echo $title; ?></h4>
                    <span class="text-secondary"><?php echo $author; ?></span>
                </div>
            </div>

        <?php


    }

}

else {

    echo "Books not found";

}

?>