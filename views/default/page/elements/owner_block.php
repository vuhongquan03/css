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
elgg_push_context('owner_block');

// groups and other users get owner block
$owner = elgg_get_page_owner_entity();
if ($owner instanceof ElggGroup || $owner instanceof ElggUser) {

    $header = elgg_view_entity($owner, array('full_view' => false));

    $body = elgg_view_menu('owner_block', array('entity' => $owner, 'class' => 'list-group'));

    $body .= elgg_view('page/elements/owner_block/extend', $vars);

    echo elgg_view('page/components/module', array(
        'header' => $header,
        'body' => $body,
        'class' => '',
    ));
}

elgg_pop_context();
