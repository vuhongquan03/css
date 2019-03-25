<?php
/**
 * Twitter&reg; Bootstrap 4.1 Theme for Elgg
 *
 * Converts all Elgg css elements to Twitter&reg; Bootstrap elements.  Helps 
 * Designers create beautiful Bootstrap themes for Elgg.
 *
 * @category   Elgg Themes
 * @author     Shane Barron <admin@socia.us>
 * @copyright  2018 SocialApparatus / ElggDesign
 * @version    1.0
 * @link       http://socia.us
 */

$options = array(
	'type' => 'object',
	'subtype' => 'comment',
	'limit' => elgg_extract('limit', $vars, 4),
	'wheres' => array(),
	'preload_owners' => true,
	'distinct' => false,
);

$owner_guid = elgg_extract('owner_guid', $vars);
$container_guid = elgg_extract('container_guid', $vars);
$subtypes = elgg_extract('subtypes', $vars);

if ($owner_guid || $container_guid || $subtypes) {
	$db_prefix = elgg_get_config('dbprefix');

	// Join on the entities table to check container subtype and/or owner
	$options['joins'] = array("JOIN {$db_prefix}entities ce ON e.container_guid = ce.guid");
}

// If owner is defined, view only the comments that have
// been posted on objects owned by that user
if ($owner_guid) {
	$options['wheres'][] = "ce.owner_guid = $owner_guid";
}

// If container is defined, view only the comments that have
// been posted on objects placed inside that container
if ($container_guid) {
	$options['wheres'][] = "ce.container_guid = $container_guid";
}

// If subtypes are defined, view only the comments that have been
// posted on objects that belong to any of those subtypes
if ($subtypes) {
	if (is_array($subtypes)) {
		$subtype_ids = array();
		foreach ($subtypes as $subtype) {
			$id = (int)get_subtype_id('object', $subtype);
			if ($id) {
				$subtype_ids[] = $id;
			}
		}
		if ($subtype_ids) {
			$subtype_string = implode(',', $subtype_ids);
			$options['wheres'][] = "ce.subtype IN ($subtype_string)";
		} else {
			// subtype ids do not exist so cannot display comments
			$options['wheres'][] = "1 = -1";
		}
	} else {
		$subtype_id = (int)get_subtype_id('object', $subtypes);
		$options['wheres'][] = "ce.subtype = $subtype_id";
	}
}

$title = elgg_echo('generic_comments:latest');
$comments = elgg_get_entities($options);
if ($comments) {
	$body = elgg_view('page/components/list', array(
		'items' => $comments,
		'pagination' => false,
		'list_class' => 'elgg-latest-comments',
		'full_view' => false,
	));
} else {
	$body = '<p>' . elgg_echo('generic_comment:none') . '</p>';
}

echo elgg_view_module('aside', $title, $body);
