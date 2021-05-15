<!-- ========================= Start PHP MyAdmin Area ========================= -->


    
<?php 

include('config.php');

//Check whether the submit button is clicked or not
if(isset($_POST['submit'])) {

    //Retrieve data from form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = ($_POST['password']);

    //SQL to check whether student with email and password exists or not
    $sql = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'";

    //Execute the query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Count rows to check whether student extists or not
    $count = mysqli_num_rows($res);
    
    //If there is no student with posted data
    if(!$count == 1) {
                          
        //SQL query 
        $sql1 = "INSERT INTO tbl_student SET
                full_name = '$full_name',
                email = '$email',
                phone = '$phone',
                password = '$password' ";

        //Execute query and save data into database
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

        if($res1 == TRUE) {

            $_SESSION['email'] = $_POST['email']; // store email
            $_SESSION['password'] = $_POST['password']; // store password
            //Create a session for this login. Check whether student is logged in or not. Logout will unset it
            $_SESSION['student'] = $email;

            $_SESSION['add'] = "Your account has been created.";   //Create a session variable to display message
            header("location: ".SITEURL.'add-student.php'); //Stay on same page
            exit(0);

        }

        else {

            $_SESSION['add'] = "Failed to register. Try again.";   //Create a session variable to display message
            header("location: ".SITEURL.'add-student.php'); //Stay on same page

        }

    }

    else {

        $_SESSION['occupied'] = "This student is already registered";    //Student already registered
        header("location: ".SITEURL.'add-student.php'); //Stay on same page
        exit(0);

    }

}

?>

<!-- ========================= End PHP MyAdmin Area ========================= -->

<html>
<head>
<title>Login Student</title>

<!-- custom css file -->
<link href="./css/style-signup.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link href="./css/all.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="login-page">       
<div class="container-shadow"></div>
<div class="container">
<div class="wrap">
<div class="headings">
<div class="admin-message-signup">

<!-- Display message error message -->
<?php 

include('config.php');


    if(isset($_SESSION['login'])) {
        echo $_SESSION['login'];  //Display session message
        unset($_SESSION['login']);  //Remove session message
    }
    
    if(isset($_SESSION['no-login-message'])) {
        echo $_SESSION['no-login-message']; //Display session message
        unset($_SESSION['no-login-message']);  //Remove session message
    }

    if(isset($_SESSION['occupied'])) {
        echo $_SESSION['occupied'];  //Display session message
        unset($_SESSION['occupied']);  //Remove session message
    }

    if(isset($_SESSION['add'])) {
        echo $_SESSION['add'];  //Display session message
        echo "<a href='".$SITEURL.'login-student.php'."'> LOGIN ›</a>";
        unset($_SESSION['add']);  //Remove session message
    }

?>

</div>
<div class="heading">
    <br>
    <a id="sign-in" class="active"><span>sign up</span></a>
    <a href="home.php" class="home">
        <h1>eecs-library</h1> 
    </a>  
</div>     
</div>
    <div id="sign-in-form">
        <form action="" method="POST">
        <label for="full_name">Full Name</label>
        <input id="full_name" type="text" name="full_name" required/>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" required/>
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="phone" />
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required/>
        <label for="password2">Re-enter password</label>
        <input id="password2" type="password" name="password2"/>
        <input type="submit" class="btn-sign-in" name="submit" value="Sign up" />
        </form>
        <footer>
            <br>
        </footer>
    </div>
    </div>
</div>
</div> 
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
$("#sign-up").click(function () {
    $("#sign-in").removeClass("active");
    $("#sign-in-form").hide();
    $("#sign-up").addClass("active");
    $("#sign-up-form").show();
});
$("#sign-in").click(function () {
    $("#sign-in").addClass("active");
    $("#sign-in-form").show();
    $("#sign-up").removeClass("active");
    $("#sign-up-form").hide();
});
});
</script>

