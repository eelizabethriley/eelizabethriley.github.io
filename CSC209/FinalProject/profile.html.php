<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}
else {
  $username = "guest";
}
$userData = "output/UserData/{$username}.json";
$numLists = 0;

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);
    $numLists = count($lists);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="css/todo.css"> -->
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <?php if (isset($username)): ?>
  <a href="todo.html.php">To Do</a>
  <a class="active" href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a href="login.html.php">Login</a>
  <?php endif; ?>
</div>
    <h1 class="topheader"><?php echo $username ?>'s Profile</h1>
<div>
<h3>Task History</h3>
<ul>
<?php foreach ($lists["history"] as $done): ?>
  <li><?= htmlspecialchars($done["task"]) ?> (from <?= $done["completedFrom"] ?>)</li>
<?php endforeach; ?>
</ul>

<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>
</body>
</html>


