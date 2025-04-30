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
  <?php if (isset($username)): ?>
  <a href="todo.html.php">To Do</a>
  <a href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a class="active" href="login.html.php">Login</a>
  <?php endif; ?>
</div>
<div class="row">
  <div class="column">
    <h2 class="topheader">User Login</h2>
    <p>Welcome back to TaskTab! Login below.</p>
<form action="php/loginUser.php" method="POST">
Username: <input type="uname" name="uname"><br>
Password: <input type="psw" name="psw"><br>
<input type="submit">
</form>
<p>Not a user? Register <a href="register.html.php">here</a>.</p>
  </div>
  <div class="column" style="background-color:black;">
  </div>
</div>

<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>

<script src="js/login.js"></script>
</body>
</html>
