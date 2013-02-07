
<h1>La Carte <?php echo $cat->nom_cat ?></h1>

<div id="cat-<?php echo $cat->id ?>" class="plat plat-count-<?php echo count($plats)?> plat-list-size-<?php echo (count($plats) > 10)?'large':'small';?>">
	<ul>
		<?php foreach ($plats as $key => $plat): ?>
      <?php if ($plat->nom_plat != ''):?>
      	<?php if (substr_count($plat->nom_plat, '°°')):?>
	</ul>
      		<h2><?php echo iconv('utf-8', 'us-ascii//TRANSLIT', str_replace('°°', '', $plat->nom_plat)) ?></h2>
	<ul>
      	<?php else:?>	
				  <li id="plat-<?php echo $plat->id ?>" >
						  <div class="plat-nom"><?php echo $plat->nom_plat ?></div>
						  <?php if ($plat->prix_plat):?><div class="plat-prix"><?php echo $plat->prix_plat ?> €</div><?php endif;?>
						  <?php if ($plat->desc_plat):?><div class="plat-desc"><?php echo $plat->desc_plat ?></div><?php endif;?>
						  <div class="clear"></div>
				  </li>
      	<?php endif;?>	
      <?php endif;?>	
		<?php endforeach; ?>
	</ul>
</div>

<div class="clear"></div>
<h2>Les autres <?php echo $type->cat_name ?></h2>
<div id="cattype-<?php echo $type->id ?>" class="cattype other-link">
	<?php foreach ($restaurant->getCatFromType($type->nooresto_id) as $categorie): ?>
		<a href="<?php echo url_for('@pix_nooresto_plat?slug='.$categorie->slug)?>" id="cat-<?php echo $categorie->id ?>" class="cat"><?php echo $categorie->nom_cat ?></a>
	<?php endforeach; ?>
</div>
