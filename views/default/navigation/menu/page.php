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
    $headers = elgg_extract('show_section_headers', $vars, false);

    if (empty($vars['name'])) {
        $msg = elgg_echo('view:missing_param', array('name', 'navigation/menu/page'));
        elgg_log($msg, 'WARNING');
        $vars['name'] = '';
    }

    $class = 'nav flex-column nav-pills';
    if (isset($vars['class'])) {
        $class = "$class {$vars['class']}";
    }

    if (isset($vars['selected_item'])) {
        $parent = $vars['selected_item']->getParent();

        while ($parent) {
            $parent->setSelected();
            $parent = $parent->getParent();
        }
    }

    foreach ($vars['menu'] as $section => $menu_items) {
        echo elgg_view('navigation/menu/elements/section', array(
            'items' => $menu_items,
            'class' => "$class elgg-menu-page-$section",
            'section' => $section,
            'name' => $vars['name'],
            'show_section_headers' => $headers
        ));
    }
} else {
    $headers = elgg_extract('show_section_headers', $vars, false);

    if (empty($vars['name'])) {
        $msg = elgg_echo('view:missing_param', array('name', 'navigation/menu/page'));
        elgg_log($msg, 'WARNING');
        $vars['name'] = '';
    }

    $class = 'elgg-menu elgg-menu-page';
    if (isset($vars['class'])) {
        $class = "$class {$vars['class']}";
    }

    if (isset($vars['selected_item'])) {
        $parent = $vars['selected_item']->getParent();

        while ($parent) {
            $parent->setSelected();
            $parent = $parent->getParent();
        }
    }

    foreach ($vars['menu'] as $section => $menu_items) {
        echo elgg_view('navigation/menu/elements/section', array(
            'items' => $menu_items,
            'class' => "$class elgg-menu-page-$section",
            'section' => $section,
            'name' => $vars['name'],
            'show_section_headers' => $headers
        ));
    }
}