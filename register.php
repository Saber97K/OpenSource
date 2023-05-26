<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/register.css">
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
        <h2>Register</h2>
      </div>
      <div class="container">
        <div class="main-form-group">
            <div class="upper-form-group1">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" id="fname" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="sname">Second name</label>
                    <input type="text" id="sname" placeholder="Enter your second name" required>
                </div>
            </div>

            <div class="upper-form-group2">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Enter your username" required>
                </div>
                <div class="dropdown">
                    <label for="role">Role</label>
                    <select name="role_id" class="text-input" onchange="handleSelectChange()">
                    <option value="" disabled selected hidden>Select role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>                    
                    </select>
                </div>
            </div>
        </div>


        <div class="password-zone">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="password">Repeat password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
            </div>
        </div>
      </div>
      <div class="btnzone">
        <button type="submit" class="btnLogin">Login</button>
      </div>
    </form>
  </div>
</div>




    <script src="https://kit.fontawesome.com/bbd49eb172.js" crossorigin="anonymous"></script>
    <script>
    function handleSelectChange() {
      var selectElement = document.getElementById("role_id");
      var firstOption = selectElement.options[0];

      if (firstOption.selected) {
        firstOption.style.display = "none";
      } else {
        firstOption.style.display = "block";
      }
    }</script>
</body>
</html>