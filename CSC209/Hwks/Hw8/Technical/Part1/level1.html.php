<?php
  $NRIMGS = 0;
  $images = glob("Images/*");
  print_r($images);
  $NRIMGS = count($images);
?>
<html>
<body>
<p>Here are some images.</p>

<div id="images">

</div>
<script type="text/javascript">
  function addAllImages(){
      let imgContainer = document.getElementById("images");
      <?php for ( $i=0; $i < $NRIMGS; $i++){ ?>
      let image<?= $i ?> = document.createElement("img");
      image<?= $i ?>.setAttribute("src", "<?= $images[$i] ?>");
      imgContainer.appendChild(image<?= $i ?>);
      <?php }?>
  }
  addAllImages();
</script>
</body>
</html>