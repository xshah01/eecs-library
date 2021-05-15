<!-- ========================= Start PHP MyAdmin Area ========================= -->


    
    <?php 

        include('config.php');
    
        //Check whether the submit button is clicked or not
        if(isset($_POST['submit'])) {

            //Retrieve data from form
            $email = $_POST['email'];
            $password = ($_POST['password']);

            //SQL to check whether admin with email and password exists or not
            $sql = "SELECT * FROM tbl_student WHERE email = '$email' AND password = '$password'";

            //Execute the query
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //Count rows to check whether admin extists or not
            $count = mysqli_num_rows($res);
            
            if($count == 1) {

            
                $_SESSION['email'] = $_POST['email']; //Store email
                $_SESSION['password'] = $_POST['password']; //Store password
                //Create a session for this login. Check whether student is logged in or not. Logout will unset it
                $_SESSION['student'] = $email;

                if(isset($_SESSION['redirectURL'])) {
                    header('location:'.$_SESSION['redirectURL']);   //Redirect to previous page
                    exit(0);
                }
                else {
                    header("location: ".SITEURL.'student.php'); //Redirect to student page
                }

            }

            else {

                $_SESSION['login'] = "Email or Password is incorrect";    //Student not available
                header("location: ".SITEURL.'login-student.php'); //Stay on same page
                exit(0);

            }

        }

    ?>

    <!-- ========================= End PHP MyAdmin Area ========================= -->
  
<html>
    <head>
        <title>Login Student</title>

        <!-- custom css file -->
        <link href="./css/style-login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
            
        ?>

        </div>
        <a id="sign-in" class="active"><span>login</span></a>
            <h1>student page</h1>        
        </div>
            <div id="sign-in-form">
                <form action="" method="POST">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" required/>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required/>
                <input type="submit" class="btn-sign-in" name="submit" value="Sign in" />
                </form>
                <footer>
                <div class="sign-up">
                    <a href="add-student.php">
                        <p>Sign Up</p>
                    </a>
                </div>
                    <div class="fp">
                        <h1 class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </h1>
                    </div>
                    <a href="home.php">
                        <div class="home-link">
                            <p>Take me to home page</p>
                        </div>
                    </a>
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

