<html>
<body>
Welcome <?php echo $_POST["username"]; ?><br>
Your password is: <?php echo $_POST["pass"]; ?>

<?php
$output = fopen("../output/users.txt","a");
echo fwrite($output, $_POST["username"]);
echo fwrite($output, "/");
echo fwrite($output, $_POST["pass"]);
echo fwrite($output, "\n");
fclose($output);
?>
</body>
</html>