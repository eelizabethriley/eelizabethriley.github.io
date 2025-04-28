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

<ul id="users">
<?php foreach ($users as $user): ?>
    <li><?= ($user["username"]) ?></li>
<?php endforeach; ?>
</ul>

<table id="users">
<tr>
    <th>Usernames</th>
    <th>Passwords</th>
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
        document.getElementById("num").textContent = users.length;

        const userList = document.getElementById("users");
        userList.innerHTML = "";

        users.forEach(user => {
            const li = document.createElement("li");
            li.textContent = user.username;
            userList.appendChild(li);
        });
    };
    xhttp.open("GET", "output/users.json", true);
    xhttp.send();
}
</script>

</body>
</html>
