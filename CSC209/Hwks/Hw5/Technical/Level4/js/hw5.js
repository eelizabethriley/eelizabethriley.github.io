// Update the number of particles on the canvas.
function setNumber(){
	NRPTS = document.getElementById("myNumber").value;
	// drawParticle(randomizePos()[0], randomizePos()[1]);
	createParticles(NRPTS);
}

// Generate random x and y coordinates within the canvas dimensions
function randomizePos(){
	let x = Math.floor((Math.random() * width) + 0);
	let y = Math.floor((Math.random() * height) + 0);
	return [x, y];
}

// Generate a random endpoint for the particle's vector
function randomizeVector(length){
	let multiplier = [1, -1];
	let x = length * multiplier[Math.floor((Math.random() * 2) + 0)];
	let y = length * multiplier[Math.floor((Math.random() * 2) + 0)];
	console.log(x, y);
	return [x, y];
}

// Generate a random rgb color
function getRandomColor(){
	let r = Math.floor((Math.random() * 255) + 0);
	let g = Math.floor((Math.random() * 255) + 0);
	let b = Math.floor((Math.random() * 255) + 0);
	let color = "rgb(" + r + "," + g + "," + b + ")";
	return color;
}

// Draw a single particle with a circle and vector
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
	ctx.lineTo(x+randomizeVector(radius)[0],y+randomizeVector(radius)[1]);
	ctx.lineWidth = radius/2;
	ctx.lineCap = "round";
	ctx.stroke();
}

// Draw n particles on the canvas, calling drawParticle
function createParticles(n){
	ctx.clearRect(0, 0, width, height);
	for (var i = 0; i < NRPTS; i++) {
		let x = randomizePos()[0];
		let y = randomizePos()[1];
		drawParticle(x, y);
	}
}