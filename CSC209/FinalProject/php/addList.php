<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}
else {
  $username = "guest";
}
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

header("Location: ../todo.html.php");
exit;
?>