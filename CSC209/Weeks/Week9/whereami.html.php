<?php 
	// Find the path to the current folder
	$path = realpath(basename("./"));
	$weekNrString = substr($path, -1);
	if (is_numeric($weekNrString)){
		$weekNr = (int) $weekNrString;
	}
?>
<html>
<body>

<p>This page figures out its whereabouts. My week number is <?= $weekNr ?>.</p>
</body>
</html>