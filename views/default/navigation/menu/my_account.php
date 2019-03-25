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
$default_items = elgg_extract('default', $vars['menu'], array());


echo '<li class="dropdown nav-item">';

$more = elgg_echo('my_account');
echo "<a href=\"#\" class='dropdown-toggle nav-link' data-toggle='dropdown' role='button'>$more <span class='caret'></span></a>";

echo elgg_view('navigation/menu/elements/section', array(
    'class' => 'dropdown-menu',
    'items' => $default_items,
    'menu' => 'my_account',
    'dropdown_item' => true
));

echo '</li>';
