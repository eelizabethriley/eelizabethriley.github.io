<?php
session_start();
if ($_SESSION["username"] != "admin") {
	echo("Access denied.");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
$output = "output/users.json";
$users = [];

if (file_exists($output)) {
    $json = file_get_contents($output);
    $users = json_decode($json, true);
}

$numUsers = count($users);
?>

<h1>Admin View</h1>
<p>The number of users is: <span id="num"><?= $numUsers ?></span></p>

<table id="users">
<tr>
    <th>Username</th>
    <th>Password</th>
</tr>
<?php foreach ($users as $user): ?>
<tr>
    <td><?= ($user["username"]) ?></td>
    <td><?= ($user["password"]) ?></td>
</tr>
<?php endforeach; ?>
</table>

<button type="button" onclick="loadUsers()">Update</button>

<script>
function loadUsers() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        const users = JSON.parse(this.responseText);
        document.getElementById("num").innerHTML = users.length;

        let table = document.getElementById("users");
        table.innerHTML = ""; 

        let header = document.createElement("tr");
        let userLabel = document.createElement("td");
        userLabel.innerHTML = "Username";
        header.appendChild(userLabel);
        let passLabel = document.createElement("td");
        passLabel.innerHTML = "Password";
        header.appendChild(passLabel);
        table.appendChild(header);
        

        for (let i = 0; i < users.length; i++) {
            let row = document.createElement("tr");
            let username = document.createElement("td");
            username.innerHTML = users[i]["username"];
            row.appendChild(username);
            let password = document.createElement("td");
            password.innerHTML = users[i]["password"];
            row.appendChild(password);
            let remove = document.createElement("td");
            let removeButton = document.createElement("button");
            removeButton.innerHTML = "Remove";
            removeButton.onclick = function () {
                removeUser(users[i]["username"]);
            };
            remove.appendChild(removeButton);
            row.appendChild(remove);
            table.appendChild(row);
        }
    };
    xhttp.open("GET", "output/users.json", true);
    xhttp.send();
}

function removeUser(username) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        console.log(this.responseText);
        loadUsers();
    };
    xhttp.open("POST", "removeUser.php", true);
    xhttp.send("username=" + username);
}
</script>
</body>
</html>
