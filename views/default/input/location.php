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

$vars['class'] = elgg_extract_class($vars, 'elgg-input-location form-control');

$defaults = array(
	'disabled' => false,
);

if (isset($vars['entity'])) {
	$defaults['value'] = $vars['entity']->location;
	unset($vars['entity']);
}

$vars = array_merge($defaults, $vars);

echo elgg_view('input/tag', $vars);
