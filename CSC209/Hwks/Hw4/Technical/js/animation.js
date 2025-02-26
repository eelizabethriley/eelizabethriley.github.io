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
    console.log("pos", squarePos);
    var stepId;
    switch(squarePos){
      case "0":
        if (side == "0"){
            stepId = setInterval(stepSquaresDown, getSpeed());
            console.log("step: down");
        }
        else {
            stepId = setInterval(stepSquaresDownLeft, getSpeed());
            console.log("step: downleft", stepId);
        }
        break;
      case "350":
        if (side == "0"){
            stepId = setInterval(stepSquaresUp, getSpeed());
            console.log("step: ", stepId);
        }
        else {
            stepId = setInterval(stepSquaresUpRight, getSpeed());
            console.log("step: ", stepId);
        }
        break;
      default:
        console.log("default");
        break;
    }
    // Update position of squares to animate motion
    function stepSquaresDown() {
        if (squarePos == 350) { // When the square reaches the edge of the canvas
            console.log("STOPPED");
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos++; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos + 'px';
        }
    }
    function stepSquaresDownLeft() {
        if (squarePos == 350) { // When the square reaches the edge of the canvas
            console.log("STOPPED");
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos++; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos - 'px';
        }
    }
    function stepSquaresUp() {
        if (squarePos == 0) { // When the square reaches the edge of the canvas
            console.log("STOPPED");
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos--; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos + 'px';
        }
    }
    function stepSquaresUpRight() {
        if (squarePos == 0) { // When the square reaches the edge of the canvas
            console.log("STOPPED");
            clearInterval(stepId); // stop moving/calling function
        } else { // While the square is within bounds
            squarePos--; // Move square, updating position 
            square.style.top = squarePos + 'px'; 
            square.style.left = squarePos - 'px';
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
    squareDiv.style.top = positionsVertical[i] + 'px';
    squareDiv.style.left = positionsHorizontal[i] + 'px';
    console.log(squareDiv);
    // Assign direction of motion
    squareContainer.appendChild(squareDiv);
  }
}

