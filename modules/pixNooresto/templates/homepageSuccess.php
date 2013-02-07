
<h1>BIENVENUE SUR LE SITE<br/> 
DU RESTAURANT <?php echo $restaurant->nom_resto ?></h1>



<?php foreach($restaurant->InfosResto as $info): ?>
	<?php if ($info->type == 45): ?>
		<?php echo $info->content ?>
	<?php endif; ?>
<?php endforeach?>