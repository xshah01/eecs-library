<?php

    include('config.php');

    $id = $_GET['id'];  //Get the id from student to be deleted

    $sql = "DELETE FROM tbl_student WHERE id=$id";    //Create SQL query to delete admin from database

     $res = mysqli_query($conn, $sql);  //Execute the query

     if ($res == TRUE) {
        $_SESSION['delete'] = "Student Deleted Successfully";   //Create a session variable to display message
        header("location: ".SITEURL.'list-of-students.php'); //Redirect to students
     }
     else {
        $_SESSION['delete'] = "Failed to Delete Student";   //Create a session variable to display message
        header("location: ".SITEURL.'list-of-students.php');
     }

?>