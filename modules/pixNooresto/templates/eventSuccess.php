<?php use_helper('Date')?>


<h1>Agenda</h1>

<?php if (count($events)):?>
	<div class="events">
		<ul>
			<?php foreach($events as $event): ?>
				<li>
					<div class="event-date">
				    <div class="event-begin">
				    	<?php echo format_date($event->date_event) ?> 
				    	<div class="event-time-begin"><?php echo format_date($event->time_deb, 't') ?></div>
				    </div>
				    <div class="event-end">
				    	<?php echo ($event->date_end_event == '0000-00-00')?'':format_date($event->date_end_event); ?> 
				    	<div class="event-time-end"><?php echo format_date($event->time_fin, 't') ?></div>
				    </div>
			    </div>
			    <div class="event-name"><?php echo $event->nom_event ?></div>
			    <div class="event-desc"><?php echo $event->desc_event ?></div>
			    <div class="clear"></div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php else:?>
	<p>Il n'y a pas d'événement à venir</p>
<?php endif;?>

