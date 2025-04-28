<html>
<body>
Welcome <?php echo $_POST["username"]; ?><br>
Your password is: <?php echo $_POST["pass"]; ?>

<?php
$output = fopen("../output/users.txt","w");
echo fwrite($output, $_POST["username"]);
echo fwrite($output, $_POST["pass"]);
fclose($output);
?>
</body>
</html>