<link rel="stylesheet" href='<?PHP echo url::site() ?>plugins/popularincidents/css/popularincidents.css' />
<div class="popularmedia">
	
	<?php
	$mediaResources = array();
	foreach ($media as $resources)
	{
		foreach($resources as $resource){
			$mediaResources[$resource->incident_id][] = $resource->media_link; 
		}
	}
	
	foreach ($incidents as $incident)
	{
		$incident_id = $incident->id;
		$incident_title = text::limit_chars(strip_tags($incident->incident_title), 40, '...', True);
	?>
	<div class="popularthumb" style="background-size:cover; background-image:url('<?PHP echo url::site() . "media/uploads/" . $mediaResources[$incident_id][0];  ?>')">
		<p><a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>"> <?php echo html::specialchars($incident_title) ?></a></p>
	</div>
	<?php
	}
	?>
</div>
