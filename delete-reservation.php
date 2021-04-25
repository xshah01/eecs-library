<?php

include('config.php');

    $id = $_GET['id'];  //Get the id from reservation to be deleted

    $sql = "DELETE FROM tbl_reservation WHERE id=$id";    //Create SQL query to delete admin from database

     $res = mysqli_query($conn, $sql);  //Execute the query

     if ($res == TRUE) {
        $_SESSION['delete'] = "Reservation Deleted Successfully"; //Create a session variable to display message 
        header("location: ".SITEURL.'manage-reservations.php'); //Redirect to Manage Reservations
     }
     else {
        $_SESSION['delete'] = "Failed to Delete Reservation";   //Create a session variable to display message
        header("location: ".SITEURL.'manage-reservations.php');
     }

?>