<?php 

    include('config.php');

    session_destroy();  //Unsets $_SESSION['$email']

    header("location: ".SITEURL.'login-student.php'); //Redirect to login page

?>