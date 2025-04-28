<!-- REFERENCE: https://www.geeksforgeeks.org/php-sessions/ -->

<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
session_start();

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
            break;
        }
    }
}

if ($loginSuccess) {
    $message = "Login successful. Welcome, " . htmlspecialchars($username) . "!";
} else {
    $message = "Login failed. Invalid username or password.";
}
?>
    <h2><?php echo $message; ?></h2>
</body>
</html>
