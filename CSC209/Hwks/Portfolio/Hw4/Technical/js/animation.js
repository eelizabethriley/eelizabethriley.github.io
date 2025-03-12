function getSpeed() {
    var speed = document.getElementById("squareSpeed").value;
    return speed;
}

// Wrapper for moveSquare() that animates each square
function moveSquares(){   
    for (var i = 0; i < NUM_SQUARES; i++) {
        color = squareColors[i];
        moveSquare(color);
    }
}

// Animate each individual square
function moveSquare(color){
    var square = document.getElementById(color);
    let squarePos = square.style.top;
    let side = square.style.left;
    //Strip "px" ending from the position to convert to a number
    squarePos = squarePos.slice(0, squarePos.length-2);
    clearInterval(stepId); // stop moving/calling function
    var stepId;
    switch(squarePos){
      case "0":
        if (side == "0"){
            stepId = setInterval(stepSquaresDown, getSpeed());
        }
        else {
            stepId = setInterval(stepSquaresDownLeft, getSpeed());
        }
        break;
      case "350":
        if (side == "0"){
            stepId = setInterval(stepSquaresUp, getSpeed());
        }
        else {
            stepId = setInterval(stepSquaresUpRight, getSpeed());
        }
        break;
      default:
        break;
    }
    // Update position of squares to animate motion
    function stepSquaresDown() {
        if (squarePos == 350) { // When the square reaches the edge of the canvas
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos++; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos + 'px';
        }
    }
    function stepSquaresDownLeft() {
        if (squarePos == 350) { // When the square reaches the edge of the canvas
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos++; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos - 'px';
        }
    }
    function stepSquaresUp() {
        if (squarePos == 0) { // When the square reaches the edge of the canvas
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos--; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos + 'px';
        }
    }
    function stepSquaresUpRight() {
        if (squarePos == 0) { // When the square reaches the edge of the canvas
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos--; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos - 'px';
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
    squareDiv.style.top = positionsVertical[i] + 'px';
    squareDiv.style.left = positionsHorizontal[i] + 'px';
    // Assign direction of motion
    squareContainer.appendChild(squareDiv);
  }
}

