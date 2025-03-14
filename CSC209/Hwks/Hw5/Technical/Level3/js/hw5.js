
function randomizePos(){
	let x = Math.floor((Math.random() * width) + 0);
	let y = Math.floor((Math.random() * height) + 0);
	console.log(x, y);
	return [x, y];
}

function getRandomColor(){
	let r = Math.floor((Math.random() * 255) + 0);
	let g = Math.floor((Math.random() * 255) + 0);
	let b = Math.floor((Math.random() * 255) + 0);
	let color = "rgb(" + r + "," + g + "," + b + ")";
	console.log(color);
	return color;
}

function drawParticle(x, y){
	let radius = 10;
	// Draw circle
	ctx.beginPath();
	ctx.arc(x, y, radius, 0, 2 * Math.PI);
	ctx.lineWidth = radius/2;
	ctx.strokeStyle = getRandomColor();
	ctx.stroke();
	// Draw vector line
	ctx.moveTo(x,y);
	ctx.lineTo(x+radius,y+radius);
	ctx.lineWidth = radius/2;
	ctx.lineCap = "round";
	ctx.stroke();
}

function createParticles(n){
	ctx.clearRect(0, 0, width, height);
	for (var i = 0; i < num; i++) {
		let x = randomizePos()[0];
		let y = randomizePos()[1];
		drawParticle(x, y);
	}
}