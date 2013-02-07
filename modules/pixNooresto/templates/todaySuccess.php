
<h1>Aujourd'hui</h1>

<?php if (count($restaurant->Daily)): ?>

	<h2>Plat du jour</h2>
	
	<div class="daily">
		<?php foreach ($restaurant->Daily as $daily): ?>
			<div id="daily-<?php echo $daily->nooresto_id ?>" class="daily-item">
				<div class="daily-nom"><?php echo $daily->name ?></div>
				<?php if ($daily->price):?><div class="daily-price"><?php echo $daily->price ?> €</div><?php endif;?>
				<?php if ($daily->description):?><div class="daily-description"><?php echo $daily->description ?></div><?php endif;?>
				<div class="clear"></div>
			</div>
		<?php endforeach ?>
	</div>

<?php endif; ?>

<?php if (false): ?>
<?php if (count($restaurant->Formule)): ?>

	<h2>Formules</h2>
	
	<div class="formules">
		<?php foreach ($restaurant->Formule as $formule): ?>
			<div id="formule-<?php echo $formule->nooresto_id ?>" class="formule-item">
				<div class="formule-nom"><?php echo $formule->nom ?></div>
				<?php if ($formule->prix):?><div class="formule-prix"><?php echo $formule->prix ?> €</div><?php endif;?>
				<?php if ($formule->content):?><div class="formule-content"><?php echo str_replace('||', '<br/>', $formule->content)  ?></div><?php endif;?>
				<div class="clear"></div>
			</div>
		<?php endforeach ?>
	</div>

<?php endif; ?>
<?php endif; ?>

