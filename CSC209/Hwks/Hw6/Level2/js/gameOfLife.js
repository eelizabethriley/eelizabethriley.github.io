//Cell class
class Cell {
	constructor(state, x, y, size, i, j){
		this.state = state;
		this.x = x;
		this.y = y;
		this.size = size;
		this.i = i;
		this.j = j;
		this.position = ["horizontal", "vertical"];
		switch(i){
			case rows:
				this.position[0] = "right";
				break;
			case 0:
				this.position[0] = "left";
				break;
			default:
				this.position[0] = "center";
				break;
		}
		switch(j){
			case 0:
				this.position[1] = "top";
				break;
			case columns:
				this.position[1] = "bottom";
			default:
				this.position[1] = "center";
				break;
		}

	}
	getState(){
		return this.state;
	}
	// Add a rectangle to the canvas to represent this cell
	draw(){
		if(this.state == 1){
			ctx.fillStyle = "red";
		}
		if (this.state == 0){
			ctx.fillStyle = "black";
		}
		ctx.strokeStyle = "white";
		ctx.lineWidth = 1;
		ctx.fillRect(this.x, this.y, this.size, this.size);
		ctx.strokeRect(this.x, this.y, this.size, this.size);
	}
	// Switch the cell's status to the opposite, alive or dead
	flip(){
		switch(this.state){
		case 0:
			this.state = 1;
			break;
		case 1:
			this.state = 0;
			break;
		default:
			console.log("Error: invalid state.")
			break;
		}
	}
}

// Initialize a 2D array of dead cells (state of 0)
function createMatrix(n, m){
	var matrix = [];
	for (var i = 0; i < n; i++){
		matrix[i] = [];
		for (var j = 0; j < m; j++){
			let x = j*cellSize;
			let y = i*cellSize;
			matrix[i][j] = new Cell(0, x, y, cellSize, i, j);
		}
	}
	console.log(matrix);
	return matrix;
}

// Add squares to the canvas representing cells in the grid
function drawGrid(){
	for (var i = 0; i < rows; i++){
		for (var j = 0; j < columns; j++){
			grid[i][j].draw();
		}
	}
}

// Reset the values of the cells to 0 (dead)
function clearGrid(){
	for (var i = 0; i < rows; i++){
		for (var j = 0; j < columns; j++){
			grid[i][j].state = 0;
		}
	}
	drawGrid();
}

// Randomize the states of the cells
function randomizeGrid(){
	for (var i = 0; i < rows; i++){
		for (var j = 0; j < columns; j++){
			let states = [0, 1];
			grid[i][j].state = states[Math.floor((Math.random() * 2) + 0)];
		}
	}
	drawGrid();
}

// Apply rules to cells and iterate to the next generation 
function progressGame(){
	// Iterate through each cell in the grid
	for (var i = 0; i < rows; i++){
		for (var j = 0; j < columns; j++){
			// Count live neighbors
			let cell = grid[i][j];
			let neighbors = 0;
			// if right or center check left
			if(cell.position[0] == "right" || cell.position[0] == "center"){
				neighbors += checkLeft(cell);
			}
			// if left or center check right
			if(cell.position[0] == "left" || cell.position[0] == "center"){
				neighbors += checkRight(cell);
			}
			// if top or center check below
			if(cell.position[1] == "top" || cell.position[1] == "center"){
				if(grid[i][j+1].state == 1){
					neighbors ++;
				}
			}
			// if bottom or center check above
			if(cell.position[1] == "bottom" || cell.position[1] == "center"){
				if(grid[i][j-1].state == 1){
					neighbors ++;
				}
			}
			// APPLY RULES TO LIVE CELL
			if(cell.state == 1){
				if(neighbors < 2 || neighbors > 3){
					cell.state = 0;
				}
			}
			else if(cell.state == 0 && neighbors == 3){
				cell.state = 1;
			}
		}
	}
	drawGrid();
}

// Check cells to the left
function checkLeft(cell){
	let count = 0;
	let i = cell.i;
	let j = cell.j;
	console.log(i, j);
	if (grid[i-1][j].getState() == 1){
		count ++;
	}
	switch(cell.position[1]){
		case "top": case "center":
			if (grid[i-1][j+1].getState() == 1){
				count ++;
			}
			break;
		case "bottom": case "center":
			if (grid[i-1][j-1].getState() == 1){
				count ++;
			}
			break;
		default:
			console.log("Counting error.").
			break;
	}
	return count;
}

// Check cells to the right
function checkRight(cell){
	let count = 0;
	let i = cell.i;
	let j = cell.j;
	if (grid[i+1][j].state == 1){
		count ++;
	}
	console.log("here", grid[i+1][j+1]);
	switch(cell.position[1]){
		case "top": case "center":
			if (grid[i+1][j+1].getState() == 1){
				count ++;
			}
			break;
		case "bottom": case "center":
			if (grid[i+1][j-1].getState() == 1){
				count ++;
			}
			break;
		default:
			console.log("Counting error.").
			break;
	}
	return count;
}