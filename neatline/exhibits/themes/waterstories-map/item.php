<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 * 
 * Initial copy 6/16/16 from Neatline/views/shared/exhibits/item.php
 */

?>
<link href="<?php echo css_src('jquery.fancybox'); ?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo css_src('jquery.fancybox-buttons'); ?>" media="all" rel="stylesheet" type="text/css" />

<!-- First image file. -->
<?php if (metadata('item', 'has files')): ?>
  <?php echo item_image('thumbnail'); ?>
  <hr />
<?php endif; ?>

<!-- Texts. -->
<?php echo all_element_texts('item', 
		array('show_element_set_headings' => false) ); ?>

<!-- All Files. -->
<?php if (metadata('item', 'has files')): ?>
  <h3>Images</h3>
  <?php 
			 echo item_image_gallery(
			       		array('link' => array('rel' => 'fancyboxgroup1',
			       							'class' => 'fancybox'),
			       				'linkWrapper' => array('class' => 'item-image')
         				),
			 		'thumbnail'
         			); 

   /* echo files_for_item(
  		array('imageSize' => 'thumbnail')
  		); 
  		*/
  		?>
  <hr />
<?php endif; ?>


<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View the item in Omeka'
); ?>
