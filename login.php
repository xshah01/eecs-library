<html>
    <head>
        <title>Login Admin Panel</title>

        <!-- custom css file -->
        <link href="./css/style-login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    </head>
    
    <body>
<div class="login-page">       
  <div class="container-shadow"></div>
  <div class="container">
    <div class="wrap">
      <div class="headings">
        <a id="sign-in" href="#" class="active"><span>Log In</span></a>
      </div>
      <div id="sign-in-form">
        <form>
          <label for="username">Email</label>
          <input id="username" type="text" name="username" />
          <label for="password">Password</label>
          <input id="password" type="password" name="password" />
          <input type="submit" class="btn-sign-in" name="submit" value="Sign in" />
        </form>

        <footer>
          <div class="hr"></div>
          <div class="fp"><a href="">EECS LIBRARY ADMIN PANEL</a></div>
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

