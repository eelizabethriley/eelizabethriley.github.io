<!DOCTYPE html>
<html>
<body>

<?php

echo file_exists("test.txt");

$file = fopen("test.txt","r");
//Output lines until EOF is reached
while(! feof($file)) {
  $line = fgets($file);
  echo $line. "<br>";
}

fclose($file);

$file = fopen("test.txt","r");
fread($file,"10");
fclose($file);

$file = fopen("test.txt","w");
echo fwrite($file,"Hello World. Testing!");
fclose($file);

echo file_exists("nothere.txt");

print_r(glob("*.txt"));
?>

</body>
</html>