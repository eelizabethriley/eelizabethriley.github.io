//Cell class
class Cell {
	constructor(state, x, y, size){
		this.state = state;
		this.x = x;
		this.y = y;
		this.size = size;
		this.position = ["horizontal", "vertical"];
		switch(x){
			case width - size:
				this.position[0] = "right";
				break;
			case 0 + size:
				break;
			default:
				this.position[0] = "center"
				break;
		}
		switch(y){
			case height - size:
				this.position[1] = "top";
				break;
			case 0 + size:
				this.position[1] = "bottom";
			default:
				this.position[1] = "center";
				break;
		}

	}
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
}

// Initialize a 2D array of dead cells (state of 0)
function createMatrix(n, m){
	var matrix = [];
	for (var i = 0; i < n; i++){
		matrix[i] = [];
		for (var j = 0; j < m; j++){
			let x = j*cellSize;
			let y = i*cellSize;
			matrix[i][j] = new Cell(0, x, y, cellSize);
		}
	}
	console.log(matrix);
	return matrix;
}

function drawGrid(){
	for (var i = 0; i < rows; i++){
		for (var j = 0; j < columns; j++){
			grid[i][j].draw();
		}
	}
}