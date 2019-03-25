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
$items = elgg_extract('items', $vars, array());
$headers = elgg_extract('show_section_headers', $vars, false);
$attrs['class'] = elgg_extract_class($vars);
$item_class = elgg_extract('item_class', $vars, '');

if ($headers) {
    $name = elgg_extract('name', $vars);
    $section = elgg_extract('section', $vars);
    echo '<h2>' . elgg_echo("menu:$name:header:$section") . '</h2>';
}

$lis = '';

if (is_array($items)) {
    foreach ($items as $menu_item) {
        $lis .= elgg_view('navigation/menu/elements/item', array(
            'item' => $menu_item,
            'item_class' => $item_class,
            'dropdown_item'=>$vars['dropdown_item']
        ));
    }
}
echo elgg_format_element('ul', $attrs, $lis);
