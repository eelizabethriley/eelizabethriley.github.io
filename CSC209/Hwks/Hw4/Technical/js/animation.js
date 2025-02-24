function getRedSpeed() {
  var x = document.getElementById("redSpeed").value;
  console.log(x);
  return x;
}

function getBlueSpeed() {
  var x = document.getElementById("blueSpeed").value;
  console.log(x);
  return x;
}

function getSpeed() {
    var speed = document.getElementById("squareSpeed").value;
    console.log("Speed:", speed);
    return speed;
}

function getSpeed(){
    var i;
    var squares = document.getElementsByClassName("squares");
    // for (i=0; i <) {

    // }
}

// Wrapper for moveSquare() that animates each square
function moveSquares(){   
    for (var i = 0; i < NUM_SQUARES; i++) {
        color = squareColors[i];
        movesquare(color);
    }
}

// Animate each individual square
moveSquare(color){
    var square = document.getElementById(color + "Sq");
    var squarePos = 350; //Start square in top left corner
    var stepId = setInterval(stepSquares, getSpeed()); //Call function according to selected speed
    // Update position of squares to animate motion
    function stepSquares() {
        if (bluePos == 0) { // When the square reaches the edge of the canvas
            clearInterval(stepBlueId); // stop moving/calling function
        } else { // While the square is within bounds
            bluePos--; // Move square, updating position 
            blueSquare.style.top = bluePos + 'px'; 
            blueSquare.style.left = bluePos + 'px';
        }
    }
}

function moveRed(){   
    var redSquare = document.getElementById("redSq");
    var redPos = 0; //Start square in top left corner
    var stepRedId = setInterval(stepRed, getRedSpeed()); //Call function every x ms

    // Update position of red square to animate its motion
    function stepRed() {
        if (redPos == 350) { // When the square reaches the edge of the canvas
            clearInterval(stepRedId); // stop moving/calling function
        } else { // While the square is within bounds
            redPos++; // Move square, updating position 
            redSquare.style.top = redPos + 'px'; 
            redSquare.style.left = redPos + 'px';
        }
    }
}

function moveBlue(){   
    var blueSquare = document.getElementById("blueSq");
    var bluePos = 350; //Start square in bottom right corner
    var stepBlueId = setInterval(stepBlue, getBlueSpeed()); //Call function every 10 ms
    // Update position of blue square to animate its motion
    function stepBlue() {
        if (bluePos == 0) { // When the square reaches the edge of the canvas
            clearInterval(stepBlueId); // stop moving/calling function
        } else { // While the square is within bounds
            bluePos--; // Move square, updating position 
            blueSquare.style.top = bluePos + 'px'; 
            blueSquare.style.left = bluePos + 'px';
        }
    }
}

function createSquares() {
  var squaresContainer = document.getElementsByClassName("squareContainer")[0];
  for (var i = 0; i < NUM_SQUARES; i++) {
    let color = squareColors[i]
    // Create div for square in the square class
    var squareDiv = document.createElement("div");
    squareDiv.setAttribute("class", "square");
    squareDiv.setAttribute("id", color);
    // Assign square color
    squareDiv.style.backgroundColor = color;
    // Assign initial position
    // Assign direction of motion
    squareContainer.appendChild(squareDiv);
  }
}

