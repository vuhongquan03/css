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
$secondary_theme = $vars['entity']->secondary_theme;

echo elgg_view_field(array(
    "#label" => "Secondary Theme",
    "#type" => "dropdown",
    "value" => $secondary_theme,
    "name" => "params[secondary_theme]",
    "options_values" => bootswatch()
));
