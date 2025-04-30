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
<!-- <link rel="stylesheet" href="css/todo.css"> -->
<body>
<div class="topnav">
  <a href="index.html.php">Home</a>
  <a href="timer.html.php">Timer</a>
  <a href="login.html.php">Login</a>
  <a class="active" href="todo.html.php">To Do</a>
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
            <h2 style="margin:5px"><?php echo $list["label"]; ?></h2>
        </div>
        <!-- Tasks -->
        <ul>
            <?php foreach ($list["tasks"] as $task): ?>
                <li><?php echo htmlspecialchars($task); ?></li>
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

<script src="js/todo.js"></script>
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);
</script>

</body>
</html>

