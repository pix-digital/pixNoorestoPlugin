<?php slot('page_class') ?>page-gallerie<?php end_slot() ?>


<?php if (count($restaurant->Gallery)): ?>	

	<div class="galerie">
		<h1 class="galerie-name">Galerie</h1>
		<div class="galerie-images">
      <ul class="galerie-images-list">
        <?php foreach($restaurant->Gallery as $gallerie): ?>
          <?php include_component('pixNooresto', 'diaporama', array('folder' => '/uploads/galeries/'.$restaurant->slug.'/'.$gallerie->slug, 'alt' => $gallerie->nom_galerie.' '.$restaurant->nom_resto))?>
        <?php endforeach; ?>
      </ul>
			<div id="index" ></div>
		</div>
	</div>
	
	<div class="clear"></div>
<?php else: ?>
	<h1>Galerie</h1>
	<p>Il n'y a pas de photos pour le moment</p>
<?php endif; ?>