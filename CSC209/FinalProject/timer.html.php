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
  <a href="login.html.php">Login</a>
</div>
	
	<h1 class="topheader">Productivity Timer</h1>
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
	</div>
<!-- Controls -->
	<div class="controls center">
		<input type="number" value="0" min="0" name="minutes" id="minutes" onclick="setNumber();">
		<button id="start" onclick="beginCount();">Start</button>
		<button id="start" onclick="clearInterval(countDownTimer);">Clear</button>
	</div>

<script src="js/timer.js"></script>
<script>
	const circles = document.querySelectorAll('.semicircle');
	const timer = document.querySelector('.timer');
// Input time
	let hr = 0;
	let min = 0;
	let sec = 0;
// Convert time to miliseconds 
	const hours = hr * 3600000;
	const minutes = min * 60000;
	const seconds = sec * 1000;
	const inputTime = hours + minutes + seconds;
	const startTime = Date.now();
	const endTime = startTime + inputTime;

	let timerLoop;
// Call timer countdown incrementally
	// const timerLoop = setInterval(countDownTimer);
	// countDownTimer();
</script>
</body>
</html>
