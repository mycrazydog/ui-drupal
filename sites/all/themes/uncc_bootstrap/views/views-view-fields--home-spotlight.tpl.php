<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>



					
					


  <?php print $fields['field_photo']->content ?>
  
  <div class="spotlight-footer">
	  <div class="spotlight-left">
		  <h4 class="spotlight-title"><?php print $fields['title']->content ?></h4>  
		  <div class="byline"><?php print $fields['created']->content ?>, <?php print $fields['meta_contributors']->content ?></div> 
	  </div> 
	  
	  <div class="spotlight-right">
	  	<?php print $fields['field_spotlight_taxonomy']->content ?>
	  </div>
  </div>
  
			
					
					
