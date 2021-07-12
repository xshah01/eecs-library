<?php 

    include('config.php');

    session_destroy();  //Unsets $_SESSION['$email']

    header("location: ".SITEURL.'home.php'); //Redirect to home page

?>