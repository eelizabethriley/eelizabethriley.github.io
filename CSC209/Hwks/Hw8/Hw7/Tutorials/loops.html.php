<!DOCTYPE html>
<html>
<body>

<?php  
$i = 1;

while ($i < 6) {
  if ($i == 3) break;  
  echo $i;
  $i++;
} 

for ($x = 0; $x <= 10; $x++) {
  if ($x == 3) continue;
  echo "The number is: $x <br>";
}

$colors = array("red", "green", "blue", "yellow");

foreach ($colors as &$x) {
  if ($x == "blue") $x = "pink";
}

var_dump($colors);
?>  
</body>
</html>
loops.html.php