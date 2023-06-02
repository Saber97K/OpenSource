<?php include("path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php'); ?>
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


<?php include(ROOT_PATH . '/parts/header.php'); ?>

<div class="main">
  <div class="container-upper">
    <form class="login-form" id="register" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>"  method="post">
      <div class="loginText">
        <h2>Register</h2>
      </div>
      <div class="container">
        <div class="main-form-group">
            <div class="upper-form-group1">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="sname">Second name</label>
                    <input type="text" name="sname" value="<?php echo $sname; ?>" placeholder="Enter your second name" required>
                </div>
            </div>

            <div class="upper-form-group2">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
                </div>
            </div>
        </div>


        <div class="password-zone">
          <div class="dropdown">
                    <label for="role">Role</label>
                    <select name="role_id" class="text-input" onchange="handleSelectChange()">

                    <option value="" disabled selected hidden>Select role</option>
                      <?php foreach ($roles as $key => $role):  ?>

                        <?php  if(!empty($role_id) && $role_id == $role['role_id']): ?>
                          
                        <option selected value="<?php echo $role_id ?>"><?php echo $role['role_name']?></option>
                        <?php else: ?>
                        <option  value="<?php echo $role['role_id'] ?>"><?php echo $role['role_name'] ?></option>
                                <?php endif; ?>
                      <?php endforeach; ?>                      
                    </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                id="password" name="password" placeholder="Enter your password" required>
                <span id="passwordError" class="error"></span><br>
            </div>
            <div class="form-group">
                <label for="password">Repeat password</label>
                <input type="password" 
                name="password2" placeholder="Enter your password" required>
            </div>
        </div>
      </div>
    <?php  include(ROOT_PATH . '/controllers/formErrors.php'); ?>
      <div class="btnzone">
        <input type="submit" name="register_btn" value="Register" class="btnLogin">
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
    }

    
    </script>
</body>
</html>
