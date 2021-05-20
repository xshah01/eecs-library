<!-- ========================= Start PHP MyAdmin Area ========================= -->


    
<?php 

include('config.php');

//Check whether the submit button is clicked or not
if(isset($_POST['submit'])) {

    //Retrieve data from form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    //SQL to check whether student exists or not
    $sql = "SELECT * FROM tbl_student WHERE email = '$email' ";

    //Execute the query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Count rows to check whether student extists or not
    $count = mysqli_num_rows($res);
    
    //If there is no student with posted data
    if(!$count == 1) {

        //Check whether passwords matches or not
        if($password == $confirm_password) {
                          
            //SQL query to add student
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
                exit(0);

            }

        }

        else {

            $_SESSION['password-not-match'] = "Passwords did not match";
            header("location: ".SITEURL.'add-student.php'); //Stay on same page
            exit(0);

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
        echo "<a href='".$SITEURL.'login-student.php'."'style='color:white;'> LOGIN ›</a>";
        unset($_SESSION['add']);  //Remove session message
    }

    if(isset($_SESSION['password-not-match'])) {
        echo $_SESSION['password-not-match'];  //Display session message
        unset($_SESSION['password-not-match']);  //Remove session message
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
    <div class="signup" id="sign-in-form">
        <form action="" method="POST">
        <label for="full_name">Full Name</label>
        <input id="full_name" type="text" name="full_name" required/>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" required/>
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="phone" />
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required/>
        <label for="confirm_password">Re-enter password</label>
        <input id="confirm_password" type="password" name="confirm_password" required/>
            <div class="checkbox">
                <input id="checkbox" name="condition" type="checkbox" required>
            </div>
            <label for="condition" class="checkbox-text">By checking this box, you indicate that you have read and understood our
                <a onclick="userTerms()">user terms</a>, our <a onclick="GDPR()">personal data management</a> and our <a onclick="cookies()">cookie policy.</a>
            </label>
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
    function userTerms() {
        alert("To use our service, you must be 18 years old or have a parent's approval. We are happy to see that only students use the service, but this is not mandatory. The service is not provided to persons who have previously violated our User Terms. \n\nIt is up to you as a user to collect your reserved book within 48 hours, and avoid the risk of getting your reservation terminated. \n\nIt is your responsibility to return borrowed book(s) and in perfect condition once the loan period of 60 days (including holidays) is due time. You have an extra period of 2 days to return the book(s). If this return period is overdrawn, a late fee will be issued.");
    }
</script>

<script type="text/javascript">
    function GDPR() {
        alert("At EECS-LIBRARY, we care about your privacy on the web and therefore try to collect as little sensitive personal information from you as possible - just enough for the website to work for you and all other users. \n\nWe store your e-mail address so that you can log in to the site, so that we can notify you of changes in User Terms, Policies or Personal Data Processing. We save your phone number so that we can contact you. However, it is optional if the phone number or e-mail address is to be used as the contact method. We save your name so that we know who you are when you reserves/loan book(s). \n\nAll personal information we store about you is the information you enter in the registration form or update via your personal page. If you do not enter information such as name and e-mail address, it will not be possible to create an account as this information is necessary for our member functions.");
    }
</script>

<script type="text/javascript">
    function cookies() {
        alert("As in common practice with almost all professional websites, this website uses cookies, which are small files that are downloaded to your computer to improve your experience. \n\nWe use Account Related Cookies for handling the registration process and general administration. These cookies are usually deleted when you log out, but in some cases they may remain afterwards to remember your website settings when you log out. Form Related Cookies are also utilised when you send data via a form such as the one on the login page. These cookies can be set to remember your user information for future correspondence. \n\nTo preserve the your integrity, Third Party Cookies are not in usage.");
    }
</script>

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

