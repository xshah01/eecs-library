<?php

    //If admin session is not set
    if(!isset($_SESSION['admin'])) {

        //Admin is not logged in
        $_SESSION['no-login-message'] = "Login to access Admin Panel";
        header("location: ".SITEURL.'login.php'); //Redirect to login page
    }

?>