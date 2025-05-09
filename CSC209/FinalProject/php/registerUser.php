<html>
<head>
<link rel="stylesheet" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
$output = "../output/users.json";
if (file_exists($output)) {
    $current = file_get_contents($output);
    $users = json_decode($current, true);
}
else {
	$users = [];
}

$username = $_POST["uname"];
$password = $_POST["psw"];

// Prevent duplicate usernames
foreach ($users as $user) {
    if ($user["username"] === $username) {
        exit ("ERROR: username already exists.");
    }
}

$users[] = [
    "username" => $username,
    "password" => $password
];

file_put_contents("../output/users.json", json_encode($users));
?>
<div class="topnav">
  <a href="../index.html.php">Home</a>
  <a href="../timer.html.php">Timer</a>
  <?php if (isset($_SESSION["username"])): ?>
  <a href="../todo.html.php">To Do</a>
  <a href="../profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="../admin.html.php">Admin</a> 
  <?php endif; ?>
  <a href="logout.php">Log Out</a>
  <?php else: ?>
  <a href="../login.html.php">Login</a>
  <?php endif; ?>
</div>
Welcome <?php echo $username; ?><br>
Your password is: <?php echo $password; ?>
</body>
</html>