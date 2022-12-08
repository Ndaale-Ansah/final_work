<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../css/style_login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form class="login-form" action="register_process.php" method="POST">
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="text" class="login-username" autofocus="true" required="true" placeholder="First Name" name="first_name"/>
  <input type="text" class="login-username" autofocus="true" required="true" placeholder="Last Name" name="last_name"/>
  <input type="email" class="login-username" autofocus="true" required="true" placeholder="Email" name="customer_email"/>
  <input type="text" class="login-username" autofocus="true" required="true" placeholder="Phone Number" name="contact"/>
  <input type="password" class="login-password" required="true" placeholder="Password" name="password"/>
  <input type="password" class="login-password" required="true" placeholder="confirm_password" />
  <input type="submit" name="register" value="Register" class="login-submit" />
</form>
<a href="./login.php" class="login-forgot-pass">Already have an account</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div>
<!-- partial -->
  
</body>
</html>
