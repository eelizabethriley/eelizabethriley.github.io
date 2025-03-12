// Constructor function for Particle objects
function Particle(x, y, vector, color) {
  this.x = x;
  this.y = y;
  this.vector = vector;
  this.color = color;
  this.origin = [x, y];
  this.direction = ["vertical", "horizontal"];
  switch (vector[0]){
    case 10:
        this.direction[0] = "down";
        break;
    case -10:
        this.direction[0] = "up";
        break;
    default:
        console.log("Vector error.")
        break;
  }
  switch (vector[1]){
    case 10:
        this.direction[1] = "right";
        break;
    case -10:
        this.direction[1] = "left";
        break;
    default:
        console.log("Vector error.")
        break;
  }
  drawParticle(x, y, vector, color);
}

// Update the number of particles on the canvas.
function setNumber(){
    let old = NRPTS;
	let current = document.getElementById("myNumber").value;
    if (current > old){
        addParticle();
    }
    if (current < old){
        removeParticle();
    }
    NRPTS = current;
    drawParticles();
}

function setTrace(){
    TRACE = document.getElementById("myCheck").checked;
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
function drawParticle(x, y, vector, color){
	let radius = 10;
	// Draw circle
	ctx.beginPath();
	ctx.arc(x, y, radius, 0, 2 * Math.PI);
	ctx.lineWidth = radius/2;
	ctx.strokeStyle = color;
	ctx.stroke();
	// Draw vector line
	ctx.moveTo(x,y);
	ctx.lineTo(x + vector[0], y + vector[1]);
	ctx.lineWidth = radius/2;
	ctx.lineCap = "round";
	ctx.stroke();
}

// Add a new particle object to the array of points, update NRPTS
function addParticle(){
    let radius = 10;
    let x = randomizePos()[0];
    let y = randomizePos()[1];
    let vector = randomizeVector(radius);
    let color = getRandomColor();
    let point = new Particle(x, y, vector, color);
    points.push(point);
    NRPTS ++;
}

// Pop a particle from our array of points and remove it from the canvas
function removeParticle(){
    // Don't remove anything if there are 0 points already
    if (NRPTS == 0){
        return;
    }
    points.pop();
    NRPTS --;
    ctx.clearRect(0, 0, width, height);
    drawParticles();
}

// Draw the particles in the points array onto the canvas
function drawParticles(){
    for (var i = 0; i < points.length; i++) {
        let point = points[i];
        drawParticle(point.x, point.y, point.vector, point.color);
    }
}

// Update the particles with a new random position
function randomizeParticles(){
    for (var i = 0; i < points.length; i++) {
        let point = points[i];
        let pos = randomizePos();
        point.x = pos[0];
        point.y = pos[1];
        point.origin[0] = point.x;
        point.origin[1] = point.y;
    }  
    ctx.clearRect(0, 0, width, height);
    drawParticles();
}

// Return true when coordinates are within canvas bounds
function checkInBounds(x, y){
    if (x >= width || y >= height){
        return false;
    }
    if (x <= 0 || y <= 0){
        return false;
    }
    return true;
}

// Change vector direction
function reflect(point){
    point.vector[0] *= -1;
    point.vector[1] *= -1; 
}

// Update position of the given point based on its vector direction
function movePoint(point){
    if (point.direction[0]== "down"){
        point.x ++;
    }
    if (point.direction[0]== "up"){
        point.x --;
    }
    if (point.direction[1]== "right"){
        point.y ++;
    }
    if (point.direction[1]== "left"){
        point.y --;
    }
}

// Animate each of the particles
function moveParticles(){
    var stepId;
    var counter = 0;
    clearInterval(stepId);
    stepId = setInterval(stepPoints, 10);
    function stepPoints(){
        if (counter == NRSTEPS){
            clearInterval(stepId);
        }
        if (TRACE == false){
            ctx.clearRect(0, 0, width, height);
        }
        counter ++
        for (var i = 0; i < points.length; i++){
            let point = points[i];
            console.log("step");
            if (checkInBounds(point.x, point.y) == false){
                // Check collision with boundary and reflect
                // reflect(point);
            }
            movePoint(point);
            drawParticles();
        }
    }
}

function resetPoints(){
    ctx.clearRect(0, 0, width, height);
    for(var i = 0; i < NRPTS; i++){
        var point = points[i];
        point.x = point.origin[0];
        point.y = point.origin[1];
    }
    drawParticles();
}