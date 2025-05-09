<?php
session_start();
if (isset($_SESSION["username"])){
  $username = $_SESSION["username"];
}
else {
  $username = "guest";
}
$listToRemove = $_POST["listLabel"];
$userData = "../output/UserData/{$username}.json";

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);

    $updatedLists = [];

    foreach ($lists["lists"] as $list) {
        if ($list["label"] !== $listToRemove) {
            $updatedLists[] = $list;
        }
    }

    $lists["lists"] = $updatedLists;
    file_put_contents($userData, json_encode($lists));
}

header("Location: ../todo.html.php");
exit;
?>
