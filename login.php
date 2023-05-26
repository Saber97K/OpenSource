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
    <form class="login-form">
      <div class="loginText">
        <h2>Login</h2>
      </div>
      <div class="container">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" required>
        </div>
      </div>
      <div class="btnzone">
        <button type="submit" class="btnLogin">Login</button>
      </div>
    </form>
  </div>
</div>



    <script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
</body>
</html>