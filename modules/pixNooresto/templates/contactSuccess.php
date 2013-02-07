
<h1>Contact</h1>

<div class="grid_1">
	<h3><?php echo $restaurant->nom_resto ?></h3>
	<?php echo $restaurant->adress_street ?><br/>
	<?php echo $restaurant->adress_postal ?> - <?php echo $restaurant->adress_town ?><br/>
	<?php if($restaurant->tel_resto != ''): ?>
		Tel: <span class="tel"><?php echo $restaurant->tel_resto ?></span><br/>
	<?php endif; ?>
	<?php if($restaurant->tel_resto2 != ''): ?>
		Tel: <span class="tel"><?php echo $restaurant->tel_resto2 ?></span><br/>
	<?php endif; ?>

	<?php if($restaurant->mail_resto != ''): ?>
		<a href="mailto:<?php echo $restaurant->mail_resto ?>" class="mail" ><?php echo $restaurant->mail_resto ?></a><br/>
	<?php endif; ?>
</div>

<div class="grid_1">
	<?php if($restaurant->midi_avail == 'yes'): ?>
		<div class="midi-avail">Ouvert de <?php echo $restaurant->open_am ?> à <?php echo $restaurant->close_am ?></div>
	<?php endif; ?>
	<?php if($restaurant->soir_avail == 'yes'): ?>
		<div class="soir-avail">et de <?php echo $restaurant->open_pm ?> à <?php echo $restaurant->close_pm ?></div>
	<?php endif; ?>
</div>
<div class="clear"></div>

<div id="google-map" data-long="<?php echo $restaurant->adress_long ?>" data-lat="<?php echo $restaurant->adress_lat ?>" ></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<?php foreach($restaurant->InfosResto as $info): ?>
	<?php if (($info->content != 'Non renseigné') && ($info->type != 45)): ?>
		<div class="infos-type-<?php echo $info->type ?>">
			<?php echo $info->title ?> : <?php echo $info->content ?>
		</div>
	<?php endif; ?>
<?php endforeach?>