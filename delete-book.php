<?php

    include('config.php');
    
    //Check whether the id and image_name are set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])) {

        /* Get data from book to be deleted*/
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];  

        /* Remove the physical image if available */
        if($image_name != "") {

            $path = "img/books/".$image_name;  //Create path to access the folder

            $remove = unlink($path); //Remove the image

            /* Add error message and stop process if failed to remove image */
            if($remove == FALSE) {

                $_SESSION['remove'] = "Failed to remove book image";    //Create a session variable to display message  
                header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books
                die();  //Stop the process

            }

        }

        $sql = "DELETE FROM tbl_book WHERE id=$id";    //Create SQL query to delete books from database

        $res = mysqli_query($conn, $sql);  //Execute the query

        if ($res == TRUE) {
            $_SESSION['delete'] = "Book Deleted Successfully"; //Create a session variable to display message 
            header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books
         }
         else {
            $_SESSION['delete'] = "Failed to Delete Book";   //Create a session variable to display message
            header("location: ".SITEURL.'manage-books.php');
         }

    }

    else {

        header("location: ".SITEURL.'manage-books.php'); //Redirect to Manage Books

    }

?>