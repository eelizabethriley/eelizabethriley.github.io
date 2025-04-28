<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <a class="active" href="login.html.php">Login</a>
</div>
<div class="row">
  <div class="column">
    <h2 class="topheader">User Login</h2>
    <p>Welcome back to TaskTabby! Login below.</p>
<form action="php/loginUser.php" method="POST">
Username: <input type="uname" name="uname"><br>
Password: <input type="psw" name="psw"><br>
<input type="submit">
</form>
<p>Not a user? Register <a href="register.html.php">here</a></p>
  </div>
  <div class="column" style="background-color:black;">
  </div>
</div>


<script src="js/login.js"></script>
</body>
</html>
