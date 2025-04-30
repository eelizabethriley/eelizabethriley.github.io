<?php
session_start();
$username = $_SESSION["username"];
$userData = "output/UserData/{$username}.json";
$numLists = 0;

if (file_exists($userData)) {
    $data = file_get_contents($userData);
    $lists = json_decode($data, true);
    $numLists = count($lists);
}
?>
<!-- Code adapted from W3schools https://www.w3schools.com/howto/howto_js_todolist.asp -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/todo.css">
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <?php if (isset($username)): ?>
  <a class="active" href="todo.html.php">To Do</a>
  <a href="profile.html.php">Profile</a>
  <?php if ($username == "admin"): ?>
  <a href="admin.html.php">Admin</a>
  <?php endif; ?>
  <a href="php/logout.php">Log Out</a>
  <?php else: ?>
  <a href="login.html.php">Login</a>
  <?php endif; ?>
</div>
    <h1 class="topheader"><?php echo $username ?>'s To-Do Lists</h1>
<div>
<div class="list-container">
<p>
<form action="php/addList.php" method="POST">
New List: <input type="listName" name="listName">
<input type="submit">
</form>
</p>
</div>


<?php if (isset($lists["lists"])): ?>
    <?php foreach ($lists["lists"] as $list): ?>
      <!-- List Title Header -->
        <div class="header">
          <!-- List name -->
            <h2 style="margin:5px"><?php echo $list["label"]; ?></h2>
            <!-- Remove list -->
            <form action="php/removeList.php" method="POST" style="display:inline;">
              <input type="hidden" name="listLabel" value="<?= ($list['label']) ?>">
              <button type="submit" class="closeList" title="Remove list">X</button>
            </form>
        </div>
        <!-- Tasks -->
        <ul>
            <?php foreach ($list["tasks"] as $task): ?>
              <li>
                 <?php echo ($task); ?>
                 <!-- Mark task as completed-->
                <form action="php/completeTask.php" method="POST" style="display:inline;">
                  <input type="hidden" name="listLabel" value="<?= $list['label'] ?>">
                  <input type="hidden" name="taskName" value="<?= ($task) ?>">
                  <button type="submit" class="check" title="Mark as done">✔</button>
                </form>
                <form action="php/removeTask.php" method="POST" style="display:inline;">
                    <input type="hidden" name="listLabel" value="<?= ($list['label']) ?>">
                    <input type="hidden" name="taskName" value="<?= ($task) ?>">
                    <button type="submit" class="close" title="Remove task">X</button>
                </form>
              </li>
            <?php endforeach; ?>
        </ul>
        <form action="php/addTask.php" method="POST">
        <input type="hidden" name="listLabel" value="<?= $list['label'] ?>">
        <input type="text" name="taskName" placeholder="New task...">
        <input type="submit" value="Add Task">
        </form>
    <?php endforeach; ?>
<?php else: ?>
    <p>No lists found.</p>
<?php endif; ?>
</div>
<br>
<div class="footer">
  <p>Created by Erin Riley 2025</p>
</div>
</body>
</html>


