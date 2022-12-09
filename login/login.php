<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Login </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">
<script src="../js/jQuery3.6.js"></script>
<script src="../js/login_validation.js"></script>

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
  <input type="email" class="login-username" id="login-email" autofocus="true" placeholder="Email"  />
  <input type="password" class="login-password" id="login-pwd" placeholder="Password" />
  <button type="button" id="login-button" class="login-submit" >Login</button>
</form>
<a href="./register.php" class="login-forgot-pass">Don't have an account?</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
