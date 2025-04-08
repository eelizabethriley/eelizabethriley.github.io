<?php

$NRIMGS = 0;
$images = glob("Images/*");
print_r($images);
$NRIMGS = count($images);
?>
<html>
<body>
<p>Here are some images.</p>

<div>
<?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
	  <img src="<?= $images[$i] ?>" width=500>
<?php	}?>
</div>
</body>
</html>