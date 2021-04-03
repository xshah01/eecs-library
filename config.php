
<?php
    
    //Start session
    session_start();

    //Create constants to store non repeating values
    define('SITEURL', 'http://localhost:8080/eecs-library/');

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    $db_select = mysqli_select_db($conn, 'eecs-library') or die(mysqli_error());

?>