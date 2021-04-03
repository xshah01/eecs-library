
<?php
    
    //Start session
    session_start();

    //Connect to database
    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    $db_select = mysqli_select_db($conn, 'eecs-library') or die(mysqli_error());

?>