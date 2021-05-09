<?php

include('config.php');

   $id = $_GET['id'];  //Get the id from recycle to be deleted

   $sql = "DELETE FROM tbl_recycle WHERE id=$id";    //Create SQL query to delete recycle from database

   $res = mysqli_query($conn, $sql);  //Execute the query

   if ($res == TRUE) {
      $_SESSION['delete'] = "Recycle Deleted Successfully"; //Create a session variable to display message 
         header("location: ".SITEURL.'manage-recycles.php'); //Redirect to Manage Reservations
   }
   else {
      $_SESSION['delete'] = "Failed to Delete Recycle";   //Create a session variable to display message
      header("location: ".SITEURL.'manage-recycles.php');
   }

?>