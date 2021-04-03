<?php

    include('config.php');

    $id = $_GET['id'];  //Get the id from admin to be deleted

    $sql = "DELETE FROM tbl_admin WHERE id=$id";    //Create SQL query to delete admin from database

     $res = mysqli_query($conn, $sql);  //Execute the query

     //Executed query check and display message
     if ($res == TRUE) {
        $_SESSION['delete'] = "Admin Deleted Successfully"; //Create a session variable to display message 
        header("location: ".SITEURL.'manage-accounts.php'); //Redirect to Manage Accounts
     }
     else {
        $_SESSION['delete'] = "Failed to Delete Admin";   //Create a session variable to display message
        header("location: ".SITEURL.'manage-accounts.php');
     }

?>