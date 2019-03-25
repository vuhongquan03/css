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
$tabs = array(
    'newest' => array(
        'text' => elgg_echo('sort:newest'),
        'href' => 'groups/all?filter=newest',
        'priority' => 200,
    ),
    'alpha' => array(
        'text' => elgg_echo('sort:alpha'),
        'href' => 'groups/all?filter=alpha',
        'priority' => 250,
    ),
    'popular' => array(
        'text' => elgg_echo('sort:popular'),
        'href' => 'groups/all?filter=popular',
        'priority' => 300,
    ),
    'featured' => array(
        'text' => elgg_echo('groups:featured'),
        'href' => 'groups/all?filter=featured',
        'priority' => 400,
    ),
);

if (elgg_is_active_plugin('discussions')) {
    $tabs['discussion'] = array(
        'text' => elgg_echo('discussion:latest'),
        'href' => 'groups/all?filter=discussion',
        'priority' => 500,
    );
}

foreach ($tabs as $name => $tab) {
    $tab['name'] = $name;

    if ($vars['selected'] == $name) {
        $tab['selected'] = true;
    }

    elgg_register_menu_item('filter', $tab);
}

echo elgg_view_menu('filter', array('sort_by' => 'priority', 'class' => 'nav nav-tabs'));
