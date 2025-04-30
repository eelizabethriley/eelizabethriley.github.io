<?php
session_start();
$username = $_SESSION["username"];
$listLabel = $_POST["listLabel"]; 
$taskToRemove = $_POST["taskName"];
$userData = "../output/UserData/{$username}.json";

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);

    // Access by reference to modify directly
    foreach ($lists["lists"] as &$list) {
        if ($list["label"] === $listLabel) {
            $updatedTasks = [];

            foreach ($list["tasks"] as $task) {
                if ($task !== $taskToRemove) {
                    $updatedTasks[] = $task;
                }
            }

            $list["tasks"] = $updatedTasks;
            break;
        }
    }

    file_put_contents($userData, json_encode($lists));
}

header("Location: ../todo.html.php");
exit;
?>
