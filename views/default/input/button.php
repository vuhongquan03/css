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
$vars['class'] = elgg_extract_class($vars, 'btn');

// Replace all elgg button classes with bootstrap classes
if (!elgg_in_context("admin")) {
    if (is_array($vars['class'])) {
        $new_class = array();
        foreach ($vars['class'] as $class) {
            $class = str_replace("elgg-button-action", "btn-warning", $class);
            $class = str_replace("elgg-button-submit", "btn-success", $class);
            $class = str_replace("elgg-button-delete", "btn-danger", $class);
            $new_class[] = $class;
        }
        $vars['class'] = $new_class;
    } else {
        $vars['class'] = str_replace("elgg-button-action", "btn-warning", $vars['class']);
        $vars['class'] = str_replace("elgg-button-submit", "btn-success", $vars['class']);
        $vars['class'] = str_replace("elgg-button-delete", "btn-danger", $vars['class']);
    }
}

$defaults = ['type' => 'button'];

$vars = array_merge($defaults, $vars);

switch ($vars['type']) {
    case 'button':
    case 'reset':
    case 'submit':
    case 'image':
        break;
    default:
        $vars['type'] = 'button';
        break;
}

// blank src if trying to access an offsite image. @todo why?
if (isset($vars['src']) && strpos($vars['src'], elgg_get_site_url()) === false) {
    $vars['src'] = "";
}

echo elgg_format_element('input', $vars);
