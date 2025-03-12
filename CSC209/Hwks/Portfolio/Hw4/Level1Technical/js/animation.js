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

function moveRed()
{   
    var redSquare = document.getElementById("redSq");
    var redPos = 0; //Start square in top left corner
    var stepRedId = setInterval(stepRed, getRedSpeed()); //Call function every 10 ms

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

function moveBlue()
{   
    var blueSquare = document.getElementById("blueSq");
    var bluePos = 350; //Start square in top left corner
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


