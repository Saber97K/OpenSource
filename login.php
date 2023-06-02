<?php include("path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>


<?php include('parts/header.php'); ?>

<div class="main">
  <div class="container-upper">
  <form class="login-form" id="login" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method="post">
      <div class="loginText">
        <h2>Login</h2>
      </div>
      <div class="container">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name = "username" value="<?php echo $username; ?>" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name = "password" placeholder="Enter your password" required>
        </div>
      </div>
      <div class="btnzone">
      <?php  include(ROOT_PATH . '/controllers/formErrors.php'); ?>
      <input type="submit" name="login_btn" value="Login" class="btnLogin">
      </div>
    </form>
  </div>
</div>



    <script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
</body>
</html>