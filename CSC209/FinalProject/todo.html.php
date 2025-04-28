<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit;
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
  <a href="login.html.php">Login</a>
</div>
<h1>To-Do List</h2>

<div class="main-container center">
	<p>hello <?php echo($_SESSION["username"]) ?></p>
</div>
</body>
</html>
