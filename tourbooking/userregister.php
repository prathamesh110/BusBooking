<!DOCTYPE html>
<html lang="en">
<head>
  <title>TOur-book</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/user.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
  <div class="usignup">
    <div class="usignup-bg">
      <div class="usignup-form">
        <form method="post"  class="was-validated" id="uregisterform">
         <div class="form-group py-2" id="usignup-header">
            <h1>Sign Up</h1>
         </div> 
         <div class="form-group py-2">
           <input type="text" class="form-control form_data"  value="" placeholder="FullName" name="urname" required>
           <div class="invalid-feedback"></div>
         </div>
         <div class="form-group py-2">
            <input type="email" class="form-control form_data" value="" placeholder="Email" name="uremail" required>
            <div class="invalid-feedback"></div>
            <div class="validateemail"><h2></h2> </div>
          </div>
          <div class="form-group py-2">
            <input type="password" class="form-control form_data" value="" placeholder="Password" name="urpassword" required>
            <div class="invalid-feedback"></div>
            <div class="validatepass"><h2></h2></div>
          </div>
          <div class="form-group py-2">
            <input type="tel" class="form-control form_data" value="" placeholder="Mobile No" name="urmobileno" pattern="[0-9]{10}" required>
            <div class="invalid-feedback"></div>
            <div class="validatemobno"><h2></h2></div>
          </div>
          <div class="form-group py-2" id="termcond">
            <input type="checkbox" id="termcond" required>
            <label for="termcond">Agree to our <a href="../terms.php">Terms and Condition</a></label>
          </div>
          <div class="validate" id="validate"><h2></h2></div>
          <div class="usignup-btn py-2">
            <button type="button" class="btn btn-primary" onclick="URegisterValidate()">Sign Up</button>
          </div>
          <div class="form-group py-2" id="Rlogin">
            <p>Already an admin? <a href="login.php">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/uregisterajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 