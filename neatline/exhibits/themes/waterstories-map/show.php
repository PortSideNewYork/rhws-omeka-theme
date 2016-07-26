<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html

 * Copied from Neatline 7/5/16:
 *   plugins/Neatline/views/public/exhibits/show.php
 */

?>


<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>

<?php 
  //Put list of subjects into an array
  $subject_array = array();

  // copied logic from SubjectBrowse plugin: SubjectBrowse/controllers/IndexController.php
  
  $dcSubjectId = (integer) get_option('subject_browse_DC_Subject_id');
  $db = get_db();
  $sql = "
  SELECT DISTINCT `text`
  FROM `$db->ElementTexts`
  WHERE `element_id` = $dcSubjectId
  ORDER BY `text`
  COLLATE 'utf8_unicode_ci'
  ";
  $subject_array = $db->fetchCol($sql);
  
  //  Create a block for use by javascript subjects
	if ($subject_array) {
		echo "<script type=\"text/javascript\">\n";
		echo "  var filterclasses = [];\n";

		foreach($subject_array as $subject) {
			$class = "subject_" . strtolower($subject);
			$class = str_replace("--", "__", $class);
			$class = str_replace(" ", "_", $class);
				
			echo "    filterclasses.push('" . $class . "');\n";
		}

		echo "</script>\n";

	} //end if
?>



<!-- Exhibit title: -->
<h1><?php echo nl_getExhibitField('title'); ?></h1>


<div id="wsbody">

<div id="wsleft">
<?php echo nl_getNarrativeMarkup(); ?>

<!-- Zoom buttons, or rather Filter buttons -->
<div id="zoom">
      <div class="collection_street_names ws_subject">Street</div>


<?php 
if ($subject_array) {
	foreach($subject_array as $subject) {
		//For the class= value, normalize to lowercase, change -- to __, change space to _
		$class = "subject_" . strtolower($subject);
		$class = str_replace("--", "__", $class);
		$class = str_replace(" ", "_", $class);

		//For display, fix dashes (--) to an actual em-dash
		$subject = str_replace("--", "&#8212;", $subject);

		echo "<div class='$class ws_subject'>$subject</div>\n";
	}
}
?>
	<div class="reset">Show All Items</div>
</div>

</div> <!-- end wsleft -->



<div id="wsright">
<!-- "View Fullscreen" link: -->
<?php echo nl_getExhibitLink(
  null, 'fullscreen', __('View Fullscreen'), array('class' => 'nl-fullscreen')
); ?>
<!-- Exhibit and description : -->
<?php echo nl_getExhibitMarkup(); ?>
</div>


</div> <!--  end wsbody -->

<?php echo foot(); ?>
