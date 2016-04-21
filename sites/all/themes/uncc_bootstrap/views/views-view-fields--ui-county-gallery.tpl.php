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

<?php

$county_name = $fields['term_node_tid']->content;


//echo $fields['term_node_tid']->content;


$counties_array = array(
'anson' => '/data/county/anson',
'cabarrus' => '/data/county/cabarrus',
'catawba' => '/data/county/catawba',
'chester' => '/data/county/chester',
'cleveland' => '/data/county/cleveland',
'gaston' => '/data/county/gaston',
'iredell' => '/data/county/iredell',
'lancaster' => '/data/county/lancaster',
'lincoln' => '/data/county/lincoln',
'mecklenburg' => '/data/county/mecklenburg',
'rowan' => '/data/county/rowan',
'stanly' => '/data/county/stanly',
'union' => '/data/county/union',
'york' => '/data/county/york'
 );

if (array_key_exists(strtolower($county_name), $counties_array)) {
    //echo "Found in array";
    $url = $counties_array[strtolower($county_name)];
}


?>

<div class="text-image-container"><?php print $fields['field_photo']->content; ?>
<h4><a href="http://ui.uncc.edu/gallery/<?php print $county_name; ?>">Gallery of photos from <?php print $county_name ?> County</a></h4>
</div>


<div class="padtopSmall"><a href="<?php print $url; ?>"><strong>Explore <?php print $county_name ?> County data</strong></a><br>
Use our Charlotte Regional Indicator project to learn more about <?php print $county_name ?> County.<br><br>
<strong><a href="/my_search/google?my_gcs=<?php print $county_name ?> County">Browse institute archives about  <?php print $county_name ?> County</a></strong></div>
