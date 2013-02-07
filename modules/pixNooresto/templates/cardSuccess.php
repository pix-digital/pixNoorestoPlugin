
<h1>La Carte</h1>

<div class="cat-type">
		<?php foreach ($types as $type): ?>
			<div id="cattype-<?php echo $type->id ?>" class="cat-type-item">
				<h2 id="cattype-<?php echo $type->slug ?>"><?php echo iconv('utf-8', 'us-ascii//TRANSLIT', $type->cat_name) ?></h2>
				<ul>
					<?php foreach ($restaurant->getCatFromType($type->nooresto_id) as $cat): ?>
						<li id="cattype-<?php echo $cat->id ?>">
							<a href="<?php echo url_for('@pix_nooresto_plat?slug='.$cat->slug)?>" ><?php echo $cat->nom_cat ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
</div>
