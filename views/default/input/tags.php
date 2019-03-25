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
$vars['class'] = elgg_extract_class($vars, 'elgg-input-tags form-control');

$defaults = array(
    'value' => '',
    'disabled' => false,
    'autocapitalize' => 'off',
    'type' => 'text'
);

if (isset($vars['entity'])) {
    $defaults['value'] = $vars['entity']->tags;
    unset($vars['entity']);
}

$vars = array_merge($defaults, $vars);

if (is_array($vars['value'])) {
    $tags = array();

    foreach ($vars['value'] as $tag) {
        if (is_string($tag)) {
            $tags[] = $tag;
        } else {
            $tags[] = $tag->value;
        }
    }

    $vars['value'] = implode(", ", $tags);
}
echo "<div class='form-group'>";
echo elgg_format_element('input', $vars);
echo "</div>";
