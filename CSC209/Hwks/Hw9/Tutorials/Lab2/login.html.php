<html>
<body>
<?php include 'php/myLib.php';?>

<h1>Lab <?= extractFolderNumber(basename(__DIR__))
?></h1>

<form action="php/saveUsers.php" method="POST">
Username: <input type="username" name="username"><br>
Password: <input type="pass" name="pass"><br>
<input type="submit">
</form>

</body>
</html>