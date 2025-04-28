<?php
$folders = glob("Images/*");
$images = [];
$NRFOLDERS = count($folders);
for ($i = 0; $i < $NRFOLDERS; $i++){
	$path = $folders[$i]."/*";
	array_push($images, glob($path));
}

$captions = [];
for ($i = 0; $i < $NRFOLDERS; $i++){
	array_push($captions, array());
	for($j=0; $j < count($images[$i]); $j++){
			$start = strlen($folders[$i])+1;
			$name = substr($images[$i][$j], $start, -4);
			array_push($captions[$i], $name);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/slideShow.css">
<link rel="stylesheet" href="css/menu.css">
<script src="js/slideShow.js"></script>
<script src="js/menu.js"></script>
<script>
	// initial slide to show
	const NUM_DIR = <?= $NRFOLDERS ?>;
	var slideIndex = 1;
</script>
</head>
<body>
<!-- MENU -->
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  	<?php for ( $i=0; $i < $NRFOLDERS; $i++){ ?>
	  <a href="#" onclick="showSection(<?= $i ?>, slideIndex)"><?= substr($folders[$i], 7) ?></a>
		<?php	}?>
  </div>
</div>
<span id="menu" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
<br>
<br>

<!-- SLIDESHOW -->
<?php for ( $i=0; $i < $NRFOLDERS; $i++){ ?>
<div id="slides<?= $i ?>">
<div class="slideshow-container">
<!-- Add Slideshow Images -->
<?php for ($j=0; $j < count($images[$i]); $j++){ ?>
  <div class="mySlides fade">
  	<div class="numbertext"><?= $j+1 ?> / <?= count($images[$i]) ?></div>
	<img src="<?= $images[$i][$j]?>" style="width:100%">
	<div class="text"><?= $captions[$i][$j]?></div>
  </div>
<?php	}?>
<!-- Add arrows -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- Add dots -->
<div class ="dots" style="text-align:center">
<?php for ( $j=0; $j < count($images[$i]); $j++){ ?>
  <span class="dot" onclick="currentSlide(<?= $j+1 ?>)"></span>
<?php	}?>
</div>
<?php	}?>
</div>
<br>
	<script>
		showSection(0, slideIndex);
	</script>
</body>
</html> 