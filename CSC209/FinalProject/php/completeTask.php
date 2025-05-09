<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}
else {
  $username = "guest";
}
$listLabel = $_POST["listLabel"]; 
$taskToComplete = $_POST["taskName"];
$userData = "../output/UserData/{$username}.json";

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);

	foreach ($lists["lists"] as &$list) {
	    if ($list["label"] === $listLabel) {
	        // Remove task from this list
	        $newTasks = []; 
	        foreach ($list["tasks"] as $task) {
	            if ($task !== $taskToComplete) {
	                $newTasks[] = $task;
	            }
	        }
	        $list["tasks"] = $newTasks;

	        // Add to completed tasks
	        $lists["history"][] = [
	            "task" => $taskToComplete,
	            "completedFrom" => $listLabel,
	        ];
	        break;
	    }
	}

	file_put_contents($userData, json_encode($lists));
}

header("Location: ../todo.html.php");
exit;
?>