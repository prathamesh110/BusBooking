<?php session_start();  
unset($_SESSION["Vuid"]);?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TOur-book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/user.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<?php include('includes/header.php'); ?>
<div class="container-fluid">
  <div class="userlogin">
    <div class="ulogin-bg">
      <div class="login-form">
        <form method="post" class="was-validated" action="includes/userprofile.php" id="userloginform">
         <div class="form-group py-2" id="login-header">
            <h1>Login</h1>
         </div> 
         <div class="form-group py-2">
            <input type="email" class="form-control form_data"  placeholder="Email" name="ulemail" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group py-2">
            <input type="password" class="form-control form_data"  placeholder="Password" name="ulpassword" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="loginbtn py-2" id="loginbtn">
            <h2></h2>
            <br>
            <button type="button" class="btn btn-primary" onclick="loginValidate()"  id="ualbtn" name="ualbtn">Log In</button>
          </div>
          <div class="form-group py-2" id="Lregister">
            <p>Don’t have an account yet? <a href="userregister.php">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/userloginajax.js"></script>>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>