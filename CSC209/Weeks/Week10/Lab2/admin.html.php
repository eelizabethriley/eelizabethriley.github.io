<html>
<body>
<?php
if(file_exists("output/users.txt")){
	$output = fopen("output/users.txt","r");
	$users = file_get_contents("output/users.txt");
	$users = explode("\n",$users);
	$NRUSERS = count($users)-1;
	$names = [];
	for($i = 0; $i < $NRUSERS; $i++){
		$uname = explode("/", $users[$i]);
		array_push($names, $uname);
	}
	fclose($output);
}

?>
<h1>Admin View</h1>
<p>The number of users is: <span id="num"><?= $NRUSERS ?></span></p>

<!-- <ul id="users">
</ul> -->
<ul id="users">
<?php for ( $i=0; $i < $NRUSERS; $i++){ ?>
	  <li>
	  	<?= $names[$i][0] ?>
	  </li>
<?php	}?>
<ul>

<br>
<button type="button" onclick="loadDoc()">Update</button>
</div>

<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
  	let users = this.responseText.split("\n");
  	let numUsers = users.length - 1;
  	document.getElementById("num").innerHTML =
    numUsers;
  	let list = document.getElementById("users");
  	for (i=0; i < numUsers; i++){
  		let user = document.createElement("li");
  		user.innerHTML = users[i].split("/")[0];
  		list.appendChild(user);
  	}
  }
  xhttp.open("GET", "output/users.txt");
  xhttp.send();
}
</script>
</body>
</html>