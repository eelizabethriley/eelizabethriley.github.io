<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}


$output = "../output/users.json";
$loginSuccess = false;
$message = "";

$username = $_POST["uname"];
$password = $_POST["psw"];

if (file_exists($output)) {
    $jsonData = file_get_contents($output);
    $users = json_decode($jsonData, true);

    // Look for a matching user
    foreach ($users as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
            $loginSuccess = true;
            $_SESSION["username"] = $username;
            // Check for user file or make one
            $userData = "../output/UserData/{$username}.json";
            $lists = [];

            if (!file_exists($userData)) {
                    $userInfo = [
                        "lists" => [],
                        "history" => []
                    ];
                file_put_contents($userData, json_encode($userInfo));
            }
            break;
        }
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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
  <a class="active" href="login.html.php">Login</a>
  <?php endif; ?>
</div>
<?php


if ($loginSuccess) {
    $message = "Login successful. Welcome, " . ($username) . "!";
} else {
    $message = "Login failed. Invalid username or password.";
}
?>
    <h2><?php echo $message; ?></h2>
</body>
</html>
