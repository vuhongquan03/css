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
$vars['class'] = elgg_extract_class($vars, 'form-control');

$defaults = array(
    'disabled' => false,
    'value' => '',
    'autocapitalize' => 'off',
    'autocorrect' => 'off',
    'type' => 'password'
);

$vars = array_merge($defaults, $vars);

echo "<div class='form-group'>";
echo elgg_format_element('input', $vars);
echo "</div>";
