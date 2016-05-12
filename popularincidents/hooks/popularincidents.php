<?php defined('SYSPATH') or die('No direct script access.');
// Start wildlife category block
class popularincidents { // CHANGE THIS FOR OTHER BLOCKS
	public function __construct()
	{
		// Array of block params
		$block = array(
			"classname" => "popularincidents", // Must match class name aboce
			"name" => "Popular Incidents",
			"description" => "List popular incidents"
		);
		// register block with core, this makes it available to users 
		blocks::register($block);
	}
	public function block()
	{
		// Load the reports block view
		$content = new View('popularincidents'); // CHANGE THIS IF YOU WANT A DIFFERENT VIEW
		
		// Get Reports
		$content->incidents = ORM::factory('incident')
			->join('media', 'incident.id', 'media.incident_id')
			->where('incident_active', '1')
			->where('media_type', '1')
			->limit('10')
			->orderby('incident_date', 'desc')
			->find_all();
			
		$content->media = array();	
		
		foreach($content->incidents as $incident){	
			$content->media[$incident->id] = ORM::factory('media')
			->where('incident_id', $incident->id)
			->where('media_type', '1')
			->find_all();			
		}
			
		echo $content;
	}
}
new popularincidents;