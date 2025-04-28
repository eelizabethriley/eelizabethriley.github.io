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

Welcome <?php echo $username; ?><br>
Your password is: <?php echo $password; ?>
</body>
</html>