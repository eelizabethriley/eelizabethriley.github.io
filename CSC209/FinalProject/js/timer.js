// TIMER CODE REFERENCE: EFTtechLab on YouTube https://youtu.be/uHVPAcaW1VQ?si=XGGLZOohlAOdqDjm

function setNumber(){
	min = document.getElementById("minutes").value;
}

function beginCount(){
clearInterval(timerLoop);
    const hr = 0;
    const sec = 0;
    inputTime = (hr * 3600000) + (min * 60000) + (sec * 1000);
    const startTime = Date.now();
    endTime = startTime + inputTime;
    timerLoop = setInterval(countDownTimer, 1000);
    countDownTimer();
}

function clearTimer() {
    clearInterval(timerLoop);
    timer.innerHTML = '<div>00</div><div class="colon">:</div><div>00</div><div class="colon">:</div><div>00</div>';
    timer.style.color = "white";
    circles[0].style.transform = 'rotate(0deg)';
    circles[1].style.transform = 'rotate(0deg)';
    circles[2].style.display = 'block';
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

	// Numeric timer
	const hrs = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
	const mins = Math.floor((remainingTime / (1000 * 60) % 60)).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});;
	const secs = Math.floor((remainingTime / 1000) % 24).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});;
	timer.innerHTML = 
	'<div>' + hrs + '</div> <div class="colon">:</div> <div>' + mins + '</div> <div class="colon">:</div> <div>' + secs + '</div>'

	// When the timer is under 11 seconds, turn red
	if(remainingTime <= 11000){
		timer.style.color = "red";
	}

	// End the countdown
	if (remainingTime < 0){
		clearInterval(timerLoop);

		// Set timer digits to 0
		timer.innerHTML = 
		'<div>00</div> <div class="colon">:</div> <div>00</div> <div class="colon">:</div> <div>00</div>'
		timer.style.color = "yellow";
	}
}