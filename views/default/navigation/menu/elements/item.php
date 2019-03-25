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
if (!elgg_in_context("admin")) {

    $item = $vars['item'];
    if ($vars['dropdown_item']) {
        $item->addLinkClass("dropdown-item");
    } else {
        if (($vars['menu'] == 'site') || ($vars['menu'] == 'my_account')) {
            $item->addLinkClass("nav-link");
        }
    }
    $link_class = '';
    if ($item->getSelected()) {
        $link_class = 'active';
    }

    $children = $item->getChildren();
    if ($children) {
        $item->addLinkClass($link_class);
        $item->addLinkClass('dropdown');
        $item->addLinkClass("nav-item");
    }

    $item_class = $item->getItemClass();
    if ($item->getSelected()) {
        $item_class = "$item_class active";
    }
    if (isset($vars['item_class']) && $vars['item_class']) {
        $item_class .= ' ' . $vars['item_class'];
    }

    if ($vars['dropdown_item']) {
        echo "<li class='$item_class'>";
    } else {
        echo "<li class='$item_class nav-item'>";
    }
    echo elgg_view_menu_item($item);
    if ($children) {
        echo elgg_view('navigation/menu/elements/section', array(
            'items' => $children,
        ));
    }
    echo '</li>';
} else {
    $item = $vars['item'];

    $link_class = 'elgg-menu-closed';
    if ($item->getSelected()) {
        // @todo switch to addItemClass when that is implemented
        //$item->setItemClass('elgg-state-selected');
        $link_class = 'elgg-menu-opened';
    }

    $children = $item->getChildren();
    if ($children) {
        $item->addLinkClass($link_class);
        $item->addLinkClass('elgg-menu-parent');
    }

    $item_class = $item->getItemClass();
    if ($item->getSelected()) {
        $item_class = "$item_class elgg-state-selected";
    }
    if (isset($vars['item_class']) && $vars['item_class']) {
        $item_class .= ' ' . $vars['item_class'];
    }

    echo "<li class=\"$item_class\">";
    echo elgg_view_menu_item($item);
    if ($children) {
        echo elgg_view('navigation/menu/elements/section', array(
            'items' => $children,
            'class' => 'elgg-menu elgg-child-menu',
        ));
    }
    echo '</li>';
}