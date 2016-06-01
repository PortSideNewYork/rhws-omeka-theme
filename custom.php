<?php 
require_once dirname(__FILE__) . '/functions.php';

function display_recent_neatline_exhibits() {
	$html = '';
	
	// Get our recent Neatline exhibits, limited to five.
	$neatlineExhibits = get_records('NeatlineExhibit', array('recent' => true), 5);
	
	// Set them for the loop.
	set_loop_records('NeatlineExhibit', $neatlineExhibits);
	
	// If we have any to loop, we'll append to $html.
	if (has_loop_records('NeatlineExhibit')) {
		$html .= '<ul>';
		 
		foreach (loop('NeatlineExhibit') as $exhibit) {
			$html .= '<li>'
					. nl_getExhibitLink(
							$exhibit,
							'show',
							metadata($exhibit, 'title'),
							array('class' => 'neatline')
							)
							. '</li>';
		}
	
		$html .= '</ul>';
	}
	
	echo $html;
}

//add_plugin_hook('public_home', 'display_recent_neatline_exhibits');
