// TIMER CODE REFERENCE: EFTtechLab on YouTube https://youtu.be/uHVPAcaW1VQ?si=XGGLZOohlAOdqDjm

//Update the time based on user input
function setNumber(){
	min = document.getElementById("minutes").value;
	hr = Math.floor(min/60);
	min = min%60;
	sec = 0;
	console.log("hr", hr, "min", min);
}

function beginCount(){
	setNumber();
	clearInterval(timerLoop);
    inputTime = (hr * 3600000) + (min * 60000) + (sec * 1000);
    console.log(inputTime);
    const startTime = Date.now();
    endTime = startTime + inputTime;
    timerLoop = setInterval(countDownTimer, 1000);
    countDownTimer();
}

function clearTimer() {
    clearInterval(timerLoop);
    hr = 0;
    min = 0;
    sec = 0;
    timer.innerHTML = '<div>00</div><div class="colon">:</div><div>00</div><div class="colon">:</div><div>00</div>';
    timer.style.color = "white";
    circles[0].style.transform = 'rotate(0deg)';
    circles[1].style.transform = 'rotate(0deg)';
    circles[2].style.display = 'block';
    setNumber();
}

function countDownTimer(){
	// Calculate time left
	const currentTime = Date.now();
	const remainingTime = endTime - currentTime;
	const angle = (remainingTime / inputTime) * 360;
	let circle = document.querySelector('.progress-container');
	circle.style.backgroundColor = "white";
	circles[2].display = 'block';
	// Progress bar
	if(angle > 180){
		circles[2].style.display = 'none';
		circles[0].style.transform = 'rotate(180deg)';
		circles[1].style.transform = 'rotate('+ angle +'deg)'
	}
	else {
		circles[2].style.display = 'block';
		circles[0].style.transform = 'rotate('+ angle +'deg)'
		circles[1].style.transform = 'rotate('+ angle +'deg)'
	}

	// Numeric timer; display 2 digits
	const hrs = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
	const mins = Math.floor((remainingTime / (1000 * 60) % 60)).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});;
	const secs = Math.floor((remainingTime / 1000) % 24).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});;
	timer.innerHTML = 
	'<div>' + hrs + '</div> <div class="colon">:</div> <div>' + mins + '</div> <div class="colon">:</div> <div>' + secs + '</div>'

	// When the timer is under 11 seconds, turn red
	if(remainingTime <= 11000){
		timer.style.color = "red";
	}

	// End the countdown, turn the timer yellow to indicate it finished
	if (remainingTime < 0){
		clearInterval(timerLoop);

		// Set timer digits to 0
		timer.innerHTML = 
		'<div>00</div> <div class="colon">:</div> <div>00</div> <div class="colon">:</div> <div>00</div>'
		timer.style.color = "yellow";
	}
}