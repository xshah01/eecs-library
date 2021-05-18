<?php

include('config.php');

include('login-check-student.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EECS Library</title>

    <!-- bootstrap file via jsDelivr -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- custom css file -->
    <link href="./css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Gravitas+One"/>
    
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- owl-carousel css file -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">

     <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/4d29e9b01e.js" crossorigin="anonymous"></script>

</head> 
<body>
    
    <!-- ========================= Start Header Area ========================= -->

    <?php 
    
    include('config.php');

        /* Check whether student is set or not */
        if(isset($_SESSION['email'])) {

            $email = $_SESSION['email'];

            /* Get all details based on email */                   
            $sql = "SELECT * FROM tbl_student WHERE email = '$email'"; //Create SQL query to retrieve the name

            $res = mysqli_query($conn, $sql); //Execute the query

            $count = mysqli_num_rows($res); //Check whether data is available or not

            /* Check whether data has been retrieved or not */
            if($count == 1) {

                $row = mysqli_fetch_assoc($res);   //Retrieve the details
                                            
                $full_name = $row['full_name'];

                $words = explode(" ", $full_name);  //Split the full name and take the first name
                $firstname = $words[0];

                ?>

    <header>
        <a href="<?php echo SITEURL; ?>home.php" class="logo"href="<?php echo SITEURL; ?>home.php"><img src="./img/eecslogo.png" alt="logo"></a>
            <ul>
                <li><a href="<?php echo SITEURL; ?>home.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo SITEURL; ?>books.php">Books</a></li>
                <li><a href="<?php echo SITEURL; ?>services.php">Services</a></li>
                <li><a href="<?php echo SITEURL; ?>about-us.php">About us</a></li>
                <li><a href="<?php echo SITEURL; ?>contact.php">Contact us</a></li>
                <li><a id="student" href="<?php echo SITEURL; ?>student.php">
                    <?php include('config.php'); if(isset($_SESSION['email'])) { 
                        echo $firstname; 
                    } 
                    else {
                        echo "Student";
                    }?></a></li>
                <li><a id="logout" href="logout-student.php">Logout</a></li>
            </ul>
    </header>

            <?php

            }

            else {  

            }

        }

        else {

            ?>
    <header>
        <a href="<?php echo SITEURL; ?>home.php" class="logo"href="<?php echo SITEURL; ?>home.php"><img src="./img/eecslogo.png" alt="logo"></a>
            <ul>
            <li><a href="<?php echo SITEURL; ?>home.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo SITEURL; ?>books.php">Books</a></li>
            <li><a href="<?php echo SITEURL; ?>services.php">Services</a></li>
            <li><a href="<?php echo SITEURL; ?>about-us.php">About us</a></li>
            <li><a href="<?php echo SITEURL; ?>contact.php">Contact us</a></li>
            <li><a id="student" href="<?php echo SITEURL; ?>student.php">Student</a></li>
            <li><a id="admin" href="<?php echo SITEURL; ?>admin.php">Admin</a></li>
            </ul>
    </header>

            <?php

        }

    ?>

    <!-- ========================= End Header Area ========================= -->