<?php
/**
 * Elgg custom index page
 * 
 */
 
$title = "Grupos de trabajo";

$content = "<br><h1> $title </h1><br><br>";

$groups = elgg_get_entities(array(
	'type' => 'group',
	));


$content .= "<div class='custom_index_container_groups'>";
//print_r($groups);
foreach ($groups as $group) {
	if ($group->featured_group == "yes") {
		
		$content .= "<div class='container_img_text'>";
		$content .= "<div class='container_img'>";
		$content .= elgg_view_entity_icon($group, 'large');
		$content .= "</div>";
		$content .= "<div class='container_text'>";
		$content .= "<h3>" .  '<a href=' . $group->getURL() .  "> $group->name </a>"  . "</h3>" ;
		$content .= "</div>";
		$content .= "</div>";
	}
}
		
$content .= " </div>";



$body = elgg_view_layout('one_sidebar', array(
	
	'content' => $content,
	'title' => $title,
	//'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);

