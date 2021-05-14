<?php

include('config.php');

   $id = $_GET['id'];  //Get the id from reservation to be deleted

   $sql = "SELECT * FROM tbl_reservation WHERE id=$id";    //Create SQL query to select book information

   $res = mysqli_query($conn, $sql);  //Execute the query
   $rows = mysqli_fetch_assoc($res);

   $ISBN = $rows['ISBN']; //Select ISBN



   $sql2 = "UPDATE tbl_reservation SET status = 'Canceled' WHERE id=$id";    //Create SQL query to delete reservation/ from database

   $sql3 = "UPDATE tbl_book SET active = 'Yes' WHERE ISBN = $ISBN ";   //Update Active = "Yes" in tbl_book

   $res2 = mysqli_query($conn, $sql2);  //Execute the query
   $res3 = mysqli_query($conn, $sql3);  //Execute the query

   if ($res2 == TRUE AND $res3 == TRUE) {
      $_SESSION['delete-reservation'] = "Reservation Canceled Successfully"; //Create a session variable to display message 
         header("location: ".SITEURL.'student.php'); //Refresh page
   }
   else {
      $_SESSION['delete-reservation'] = "Failed to Cancel Reservation";   //Create a session variable to display message
      header("location: ".SITEURL.'student.php');
   }

?>