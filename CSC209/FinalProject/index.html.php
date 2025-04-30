<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a class="active" href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <?php if (isset($_SESSION["username"])): ?>
  <a href="todo.html.php">To Do</a>
  <a href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a href="login.html.php">Login</a>
  <?php endif; ?>
</div>
<h1>Welcome To TaskTab!</h2>

<div class="main-container center">
	<p>a productivity timer and to-do list</p><br>
</div>
<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>

</body>
</html>
