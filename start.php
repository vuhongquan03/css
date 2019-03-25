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
elgg_register_event_handler('init', 'system', 'socia_bootstrap_theme_init');

function socia_bootstrap_theme_init() {

    if (!elgg_in_context("admin")) {
        // Load twitter bootstrap
        elgg_require_js("socia_bootstrap_theme/js/bootstrap.bundle");
        
        elgg_register_css("bootstrap", elgg_get_site_url() . "mod/socia_bootstrap_theme/assets/css/bootstrap.css",1);
        elgg_load_css("bootstrap");
        
        foreach (bootswatch() as $theme) {
            elgg_register_css($theme, elgg_get_site_url() . "mod/socia_bootstrap_theme/assets/css/$theme.css", 2);
        }
        $theme = elgg_get_plugin_setting("secondary_theme", "socia_bootstrap_theme");
        if ($theme && ($theme != "default")) {
            elgg_load_css(bootswatch()[$theme]);
        }
        
        elgg_register_css("socia_bootstrap_theme", elgg_get_site_url() . "mod/socia_bootstrap_theme/assets/css/css.css",3);
        elgg_load_css("socia_bootstrap_theme");
        
        // Load theme javascript (fix for widget panel)
        elgg_register_js("socia_bootstrap_theme", elgg_get_site_url() . "mod/socia_bootstrap_theme/assets/js/socia_bootstrap_theme.js");
        elgg_load_js("socia_bootstrap_theme");

        // Load theme css
        elgg_extend_view('elgg.css', 'socia_bootstrap_theme/css', 700);
    } else {
        elgg_unregister_js("bootstrap");
        elgg_unregister_js("socia_bootstrap_theme");
        elgg_unregister_css("bootstrap");
    }



    elgg_register_event_handler('pagesetup', 'system', 'socia_bootstrap_theme_pagesetup', 1000);

    elgg_register_plugin_hook_handler('head', 'page', 'socia_bootstrap_theme_setup_head');

    if (!elgg_is_logged_in()) {
        elgg_unregister_plugin_hook_handler('output:before', 'layout', 'elgg_views_add_rss_link');
    }

    elgg_register_plugin_hook_handler('register', 'menu:title', 'socia_title_menu');
}

function bootswatch() {
    return array(
        "default" => "Default",
        "cerulean" => "Cerulean",
        "cosmo" => "Cosmo",
        "cyborg" => "Cyborg",
        "darkly" => "Darkly",
        "flatly" => "Flatly",
        "journal" => "Journal",
        "lux" => "LUX",
        "litera" => "Litera",
        "lumen" => "Lumen",
        "materia" => "Materia",
        "minty" => "Minty",
        "pulse" => "Pulse",
        "sandstone" => "Sandstone",
        "simplex" => "Simplex",
        "sketchy" => "Sketchy",
        "slate" => "Slate",
        "solar" => "Solar",
        "spacelab" => "Spacelab",
        "superhero" => "Superhero",
        "united" => "United",
        "yeti" => "Yeti"
    );
}

/**
 * Rearrange menu items
 */
function socia_bootstrap_theme_pagesetup() {

    elgg_extend_view("elgg.css", "socia_bootstrap_theme/css");

    elgg_unregister_plugin_hook_handler('register', 'menu:topbar', 'messages_register_topbar');

    if (elgg_is_logged_in()) {

        if (elgg_is_active_plugin('dashboard')) {
            $item = new ElggMenuItem("dashboard", elgg_echo("dashboard"), "dashboard");
            elgg_register_menu_item('my_account', $item);
        }
        $item = new ElggMenuItem("settings", elgg_echo("settings"), "settings");
        elgg_register_menu_item("my_account", $item);

        $item = new ElggMenuItem("logout", elgg_echo("logout"), "action/logout");
        $item->setPriority(200000);
        elgg_register_menu_item("my_account", $item);

        if (elgg_is_admin_logged_in()) {
            $item = new ElggMenuItem("admin", elgg_echo("admin"), "admin");
            $item->setPriority(190);
            elgg_register_menu_item('my_account', $item);
        }

        $item = elgg_unregister_menu_item('topbar', 'profile');
        if ($item) {
            $item->setSection("default");
            $item->setText(elgg_echo("my_profile"));
            $item->setItemClass("nav-item");
            $item->setPriority(90);
            elgg_register_menu_item("my_account", $item);
        }
        $item = elgg_unregister_menu_item("topbar", "friends");
        if ($item) {
            $item->setSection("default");
            $item->setText(elgg_echo("friends"));
            $item->setPriority(80);
            elgg_register_menu_item("my_account", $item);
        }
        if (elgg_is_active_plugin("messages")) {
            $messages = (int) messages_count_unread();
            $username = elgg_get_logged_in_user_entity()->username;
            $item = new ElggMenuItem("messages", elgg_echo("my_messages", array($messages)), "messages/inbox/$username");
            $item->setSection("default");
            $item->setPriority(70);
            elgg_register_menu_item("site_right", $item);
        }

        if (elgg_is_active_plugin("site_notifications")) {
            $notifications_no = elgg_get_entities_from_metadata(array(
                'type' => 'object',
                'subtype' => 'site_notification',
                'owner_guid' => elgg_get_logged_in_user_entity(),
                'metadata_name' => 'read',
                'metadata_value' => false,
                'count' => true,
            ));

            elgg_register_menu_item('site_right', array(
                'name' => 'site_notifications',
                'href' => 'site_notifications/view/' . elgg_get_logged_in_user_entity()->username,
                'text' => elgg_echo('site_notifications:topbar') . "(" . $notifications_no . ")",
                'priority' => 150,
            ));
        }
    } else {
        $item = new ElggMenuItem("login", elgg_echo("login"), "login");
        elgg_register_menu_item('my_account', $item);

        $item = new ElggMenuItem("register", elgg_echo("register"), "register");
        elgg_register_menu_item('my_account', $item);
    }
}

function socia_replace_menu_classes($menu_items = array(), $css_array = array()) {
    $return = array();
    foreach ($menu_items as $item) {
        $item_class = $item->getLinkClass();
        foreach ($css_array as $old_css => $new_css) {
            if (strpos($item_class, $old_css) !== false) {
                $item_class = str_replace($old_css, $new_css, $item_class);
            }
        }
        $item->setLinkClass($item_class);
        $return[] = $item;
    }
    return $return;
}

function socia_title_menu($hook, $type, $return, $params) {
    if (!elgg_in_context("admin")) {
        return socia_replace_menu_classes($return, array(
            "elgg-button" => "btn",
            "action" => "warning",
            "submit" => "success",
            "delete" => "danger"
        ));
    } else {
        return $return;
    }
}

/**
 * Register items for the html head
 *
 * @param string $hook Hook name ('head')
 * @param string $type Hook type ('page')
 * @param array  $data Array of items for head
 * @return array
 */
function socia_bootstrap_theme_setup_head($hook, $type, $data) {
    $data['metas']['viewport'] = array(
        'name' => 'viewport',
        'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0',
    );

    $data['links']['apple-touch-icon'] = array(
        'rel' => 'apple-touch-icon',
        'href' => elgg_get_simplecache_url('socia_bootstrap_theme/homescreen.png'),
    );

    return $data;
}

if (!function_exists("elgg_extract_class")) {

    function elgg_extract_class(array $array, $existing = []) {
        $existing = empty($existing) ? [] : (array) $existing;

        $merge = (array) elgg_extract('class', $array, []);

        array_splice($existing, count($existing), 0, $merge);

        return array_values(array_unique($existing));
    }

}