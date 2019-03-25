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
$user = elgg_get_page_owner_entity();

if (!$user) {
    // no user so we quit view
    echo elgg_echo('viewfailure', array(__FILE__));
    return TRUE;
}

$icon = elgg_view_entity_icon($user, 'large', array(
    'use_hover' => false,
    'use_link' => false,
    'img_class' => 'photo u-photo',
        ));

// grab the actions and admin menu items from user hover
$menu = elgg()->menus->getMenu('user_hover', [
    'entity' => $user,
    'username' => $user->username,
        ]);

$actions = $menu->getSection('action', []);
$admin = $menu->getSection('admin', []);

$profile_actions = '';
if (elgg_is_logged_in() && $actions) {
    foreach ($actions as $action) {
        $class = $action->getItemClass();
        $item = $action->getText();
        $href = $action->getHref();
        $profile_actions .= "<a class='$class btn btn-info btn-block' href='$href'>$item</a>";
    }
}
// if admin, display admin links
$admin_links = '';
if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != elgg_get_page_owner_guid()) {
    $text = elgg_echo('admin:options');

    $admin_links = '<ul class="profile-admin-menu-wrapper">';
    $admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\">$text&hellip;</a>";
    $admin_links .= '<ul class="elgg-menu profile-admin-menu" id="profile-menu-admin">';
    foreach ($admin as $menu_item) {
        $admin_links .= elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
    }
    $admin_links .= '</ul>';
    $admin_links .= '</li>';
    $admin_links .= '</ul>';
}

// content links
$content_menu = elgg_view_menu('owner_block', array(
    'entity' => elgg_get_page_owner_entity(),
    'class' => 'profile-content-menu',
        ));

echo <<<HTML

<div id="profile-owner-block">
	$icon 
	$profile_actions
	$content_menu
	$admin_links
</div>

HTML;
