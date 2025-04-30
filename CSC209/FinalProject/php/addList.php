<?php
session_start();
$username = $_SESSION["username"];
$label = $_POST["listName"];
$userData = "../output/UserData/{$username}.json";

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);
	$lists["lists"][] = [
	    "label" => $label,
	    "tasks" => []
	];
	file_put_contents($userData, json_encode($lists));
}
?>

<html>
<head>
<link rel="stylesheet" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

The list <?php echo $label; ?> was created.<br>
</body>
</html>