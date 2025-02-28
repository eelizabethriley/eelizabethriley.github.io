
function drawParticle(x, y){
	let radius = 10;
	// Draw circle
	ctx.beginPath();
	ctx.arc(x, y, radius, 0, 2 * Math.PI);
	ctx.lineWidth = radius/2;
	ctx.strokeStyle = "blue";
	ctx.stroke();
	// Draw vector line
	ctx.moveTo(x,y);
	ctx.lineTo(x+radius,y+radius);
	ctx.lineWidth = radius/2;
	ctx.lineCap = "round";
	ctx.stroke();
}
