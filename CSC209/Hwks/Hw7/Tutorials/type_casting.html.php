<!DOCTYPE html>
<html>
<body>

<?php
$x = 5;
$x = (string) $x;
var_dump($x);

// Cast float to int 
$y = 23465.768;
$int_cast = (int)$y;
echo $int_cast;
  
echo "<br>";

// Cast string to int
$y = "23465.768";
$int_cast = (int)$y;
echo $int_cast;

?> 

</body>
</html>
