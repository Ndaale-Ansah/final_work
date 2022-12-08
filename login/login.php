<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Login </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">

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
  <input type="email" class="login-username" autofocus="true" required="true" placeholder="Email"  name="customer_email"/>
  <input type="password" class="login-password" required="true" placeholder="Password"  name="password"/>
  <input type="submit" name="login" value="Login" class="login-submit" />
</form>
<a href="./register.php" class="login-forgot-pass">Don't have an account?</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
