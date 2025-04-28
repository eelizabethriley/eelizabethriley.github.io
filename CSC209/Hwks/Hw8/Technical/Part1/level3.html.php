<?php
$NRIMGS = 0;
$images = glob("Images/*");
$NRIMGS = count($images);
?>
<html>
<body>
<p>Here are some images. Click the toggle to hide the other images.</p>
<!-- <input type="checkbox" id="imageCheck" onclick="toggleImage();"><br>  -->
<div>
<?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
	  <img src="<?= $images[$i] ?>" id="image<?= $i ?>" width=500>
	  <input type="checkbox" id="imageCheck<?= $i ?>" onclick="toggleImage(<?= $i ?>);">
	  <br>
<?php	}?>
</div>
<script type="text/javascript">
	function toggleImage(num){
		console.log("hello");
		let toggle = document.getElementById("imageCheck" + num).checked;
		if (toggle){
			console.log("checked");
			for(i=0; i < <?= $NRIMGS ?>; i++){
				document.getElementById("image" + i).style.visibility="hidden";
			}
			document.getElementById("image" + num).style.visibility="visible";
		}
	}
</script>
</body>
</html>