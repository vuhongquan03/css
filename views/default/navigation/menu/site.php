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
$more_items = elgg_extract('more', $vars['menu'], array());

if (!elgg_in_context("admin")) {

    foreach ($default_items as $menu_item) {
        echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item,'menu'=>'site'));
    }

    if ($more_items) {
        echo '<li class="nav-item dropdown">';

        $more = elgg_echo('more');
        echo "<a href=\"#\" class='nav-link dropdown-toggle' data-toggle='dropdown' role='button'>$more <span class='caret'></span></a>";

        echo elgg_view('navigation/menu/elements/section', array(
            'class' => 'dropdown-menu',
            'items' => $more_items,
            'dropdown_item'=>true,
            'menu'=>'site'
        ));

        echo '</li>';
    }
} else {
    $default_items = elgg_extract('default', $vars['menu'], array());
    $more_items = elgg_extract('more', $vars['menu'], array());

    echo '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix">';
    foreach ($default_items as $menu_item) {
        echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
    }

    if ($more_items) {
        echo '<li class="elgg-more">';

        $more = elgg_echo('more');
        echo "<a href=\"#\">$more</a>";

        echo elgg_view('navigation/menu/elements/section', array(
            'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more',
            'items' => $more_items,
        ));

        echo '</li>';
    }
    echo '</ul>';
}