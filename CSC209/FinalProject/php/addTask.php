<?php
session_start();
$username = $_SESSION["username"];
$listLabel = $_POST["listLabel"]; 
$task = $_POST["taskName"];
$userData = "../output/UserData/{$username}.json";

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);

	// access by reference so we don't make a new list
    foreach ($lists["lists"] as &$list) {
        if ($list["label"] === $listLabel) {
            $list["tasks"][] = $task;
            break;
        }
    }
	file_put_contents($userData, json_encode($lists));
}

header("Location: ../todo.html.php");
exit;
?>