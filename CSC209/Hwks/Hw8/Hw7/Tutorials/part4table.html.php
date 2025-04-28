<?php

$NRCOLS = 0;
$NROWS = 0;

$LISTROWS = array(["First Name", "Last Name", "Age"], ["Bob", "Smith", "47"], ["Sarah", "Martinez", "25"], ["Natalie", "Johnson", "31"]);
$NRROWS = count($LISTROWS);
$NRCOLS = count($LISTROWS[0]);
?>

<html>
<head>

</head>
<body>

<table>
<?php for ( $i=0; $i < $NRROWS; $i++){ ?>
	  <tr>
	  	<?php for($j=0; $j < $NRCOLS; $j++) { ?>
	  		<th><?= $LISTROWS[$i][$j] ?></th>
	  	<?php } ?>
	  </tr>
<?php	}?>
<table>
</body>
</html>