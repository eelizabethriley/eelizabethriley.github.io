<?php
$filePath = "../output/users.json";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $removedUser = $_POST["username"];

    if (file_exists($filePath)) {
        $users = json_decode(file_get_contents($filePath), true);
        $updatedUsers = [];

        foreach ($users as $user) {
            if ($user["username"] !== $removedUser) {
                $updatedUsers[] = $user;
            }
        }

        file_put_contents($filePath, json_encode(array_values($updatedUsers)));
        echo "User was deleted successfully.";
    } else {
        echo "Error: file not found.";
    }
}
?>
