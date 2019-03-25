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
$label = elgg_extract('label', $vars, '');
$id = elgg_extract('id', $vars);
$required = elgg_extract('required', $vars);

if (!$label) {
    return;
}

if ($required) {
    $indicator = elgg_extract('required_indicator', $vars);
    if (!isset($indicator)) {
        $indicator = elgg_format_element([
            '#tag_name' => 'span',
            'title' => elgg_echo('field:required'),
            'class' => 'elgg-required-indicator',
            '#text' => "&ast;",
        ]);
    }
    if ($indicator) {
        $label .= $indicator;
    }
}

echo elgg_format_element('label', [
    'for' => $id,
    'class' => ''
        ], $label);
