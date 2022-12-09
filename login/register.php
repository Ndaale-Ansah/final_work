<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">
<script src="../js/jQuery3.6.js"></script>
<script src="../js/registration_validation.js"></script>
<title>Register</title>

</head>
<body>
<!-- partial:index.partial.html -->
<form class="login-form">
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="text" class="login-username" autofocus="true" id="first_name" placeholder="First Name" />
  <input type="text" class="login-username" autofocus="true" id="last_name" placeholder="Last Name" />
  <input type="email" class="login-username" autofocus="true" id="email" placeholder="Email"/>
  <input type="text" class="login-username" autofocus="true" id="contact" placeholder="Phone Number" />
  <input type="password" class="login-password" id="pwd" placeholder="Password" />
  <input type="password" class="login-password" id="conf_pwd" placeholder="Confirm Password" />
  <button type="button" id="login-button" class="login-submit" >Register</button>
</form>
<a href="./login.php" class="login-forgot-pass">Already have an account</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
