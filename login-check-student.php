<?php

    //If student session is not set
    if(!isset($_SESSION['student'])) {

         //Student is not logged in
        $_SESSION['no-login-message'] = "Login to access Student Page";
        header("location: ".SITEURL.'login-student.php'); //Redirect to login page

        }

?>
