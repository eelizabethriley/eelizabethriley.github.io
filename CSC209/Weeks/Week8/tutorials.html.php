<!DOCTYPE html>
<html>
<body>

<?php
$x = 5;
$y = 10;

function myTest() {
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
} 

myTest();
echo $y;

$z = "Hello world!";
$w = 'Hello world!';

var_dump($z);
echo "<br>"; 
var_dump($w);
?>

</body>
</html>
