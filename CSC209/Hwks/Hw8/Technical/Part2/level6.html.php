<?php
$NRIMGS = 0;
$images = glob("Images/*");
$NRIMGS = count($images);
$captions = [];
for ($i = 0; $i < $NRIMGS; $i++){
	$name = substr($images[$i], 7, -4);
	array_push($captions, $name);
}
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
		imgCaptions.push("<?= $captions[$i] ?>");
		<?php	}?>
	}
	// initial slide to show
	var slideIndex = 1;
</script>
</head>
<body>

<div class="slideshow-container">

<!-- Add Slideshow Images -->
<?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
  <div class="mySlides fade">
  	<div class="numbertext"><?= $i+1 ?> / <?= $NRIMGS ?></div>
	<img src="<?= $images[$i]?>" style="width:100%">
	<div class="text"><?= $captions[$i]?></div>
  </div>
<?php	}?>
<!-- Add arrows -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- Add dots -->
<div class ="dots" style="text-align:center">
<?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
  <span class="dot" onclick="currentSlide(<?= $i+1 ?>)"></span>
<?php	}?>
</div>

<br>
	<script>
		showSlides(slideIndex);
	</script>
</body>
</html> 
