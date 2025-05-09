<?php
session_start();
$username = $_SESSION["username"];
if ($username != "admin") {
	echo("Access denied.");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="js/admin.js"></script>
    <script> loadUsers()</script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <?php if (isset($username)): ?>
  <a href="todo.html.php">To Do</a>
  <a href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a class="active" href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a href="login.html.php">Login</a>
  <?php endif; ?>
</div>
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
<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>
</body>
</html>
