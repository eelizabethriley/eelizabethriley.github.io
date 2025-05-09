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
<link rel="stylesheet" href="css/timer.css">
<meta n ame="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a class="active" href="timer.html.php">Timer</a>
  <a href="todo.html.php">To Do</a>
  <?php if (isset($_SESSION["username"])): ?>
  <a href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a href="login.html.php">Login</a>
  <?php endif; ?>
</div>
	<h1 class="topheader">Productivity Timer</h1>
	<br><br>	<br><br>
	<div class="main-container center">
		<!-- Progress Bar -->
		<div class="progress-container center">
			<div class="semicircle"></div>
			<div class="semicircle"></div>
			<div class="semicircle"></div>
			<div class="outercircle"></div>
		</div>
		<!-- Numerical Countdown Timer -->
		<div class="timer-container center">
			<div id="timer" class="timer center">
					<div> 00 </div> <div class="colon">:</div> <div> 00 </div> <div class="colon">:</div> <div> 00 </div>
			</div>
		</div>
		<br>
	</div><br><br><br><br>
<!-- Controls -->
	<div class="controls center">
		<input type="number" value="0" min="0" name="minutes" id="minutes" onclick="setNumber();">
		<button id="start" onclick="beginCount();">Start</button>
		<button id="end" onclick="clearTimer();">End</button>
	</div>
	<br><br>
<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>
<script src="js/timer.js"></script>
<script>
	let circles = document.querySelectorAll('.semicircle');
	let timer = document.querySelector('.timer');
	let inputTime;
	let endTime;
	let timerLoop;
// Input time
	let hr = 0;
	let min = 0;
	let sec = 0;
</script>
</body>
</html>
