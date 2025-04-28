<?php
$NRIMGS = 0;
$images = glob("Images/*");
$NRIMGS = count($images);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/slideShow.css">
<script src="js/slideShow.js"></script>
<script>
	const NUM_IMAGES = <?= $NRIMGS ?>;
	var imgNames = [];
	var imgCaptions = [];
	for (i=0; i < NUM_IMAGES; i++){
		<?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
		imgNames.push("<?= $images[$i] ?>");
		imgCaptions.push("<?= $images[$i] ?>");
		<?php	}?>
	}
	// initial slide to show
	var slideIndex = 1;
</script>
</head>
<body>


<div class="slideshow-container">

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>
<div id="dots" style="text-align:center">
	
	<script>
		createSlides();
		createDots();
		showSlides(slideIndex);
	</script>

</div>



</body>
</html> 
