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

<!-- Exhibit title: -->
<h1><?php echo nl_getExhibitField('title'); ?></h1>


<div id="wsbody">

<div id="wsleft">
<?php echo nl_getNarrativeMarkup(); ?>



<?php 
/* copy from SubjectBrowse plugin: SubjectBrowse/controllers/IndexController.php
protected function _list()
{

		// A query allows quick access to all subjects (no need for elements).
	$dcSubjectId = (integer) get_option('subject_browse_DC_Subject_id');
	$db = get_db();
	$sql = "
	SELECT DISTINCT `text`
	FROM `$db->ElementTexts`
	WHERE `element_id` = $dcSubjectId
	ORDER BY `text`
	COLLATE 'utf8_unicode_ci'
	";
	$result = $db->fetchCol($sql);

	$this->view->subjects = $result;
}
*/
?>




<!-- Zoom buttons. -->
<div id="zoom">
      <div class="collection_street_names ws_subject">Street</div>


<?php 
$dcSubjectId = (integer) get_option('subject_browse_DC_Subject_id');
$db = get_db();
$sql = "
SELECT DISTINCT `text`
FROM `$db->ElementTexts`
WHERE `element_id` = $dcSubjectId
ORDER BY `text`
COLLATE 'utf8_unicode_ci'
";
$result = $db->fetchCol($sql);

if ($result) {
	foreach($result as $subject) {
		$class = "subject_" . strtolower($subject);
		$class = str_replace("--", "__", $class);
		$class = str_replace(" ", "_", $class);
		
		echo "<div class='$class ws_subject'>$subject</div>\n";
	}
}

//$this->view->subjects = $result;

/*
<div class="subject_atlantic_basin">Atlantic Basin</div>
<div class="subject_peoples__puerto_ricans">Peoples--Puerto Ricans</div>
*/

?>





	<div class="reset">RESET</div>
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
