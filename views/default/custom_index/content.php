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
$mod_params = array('class' => '');
?>

<div class="row">
    <div class="col-md-6">
        <?php
        if (elgg_is_logged_in()) {
            $top_box = "<h2>" . elgg_echo("welcome") . " ";
            $top_box .= elgg_get_logged_in_user_entity()->name;
            $top_box .= "</h2>";
        } else {
            $top_box = $vars['login'];
        }
        echo elgg_view_module('featured', '', $top_box, $mod_params);

        echo elgg_view("index/lefthandside");

        if (elgg_is_active_plugin('file')) {
            echo elgg_view_module('featured', elgg_echo("custom:files"), $vars['files'], $mod_params);
        }

        if (elgg_is_active_plugin('groups')) {
            echo elgg_view_module('featured', elgg_echo("custom:groups"), $vars['groups'], $mod_params);
        }
        ?>
    </div>
    <div class="col-md-6">
        <?php
        echo elgg_view("index/righthandside");

        echo elgg_view_module('featured', elgg_echo("custom:members"), $vars['members'], $mod_params);

        if (elgg_is_active_plugin('blog')) {
            echo elgg_view_module('featured', elgg_echo("custom:blogs"), $vars['blogs'], $mod_params);
        }

        if (elgg_is_active_plugin('bookmarks')) {
            echo elgg_view_module('featured', elgg_echo("custom:bookmarks"), $vars['bookmarks'], $mod_params);
        }
        ?>
    </div>
</div>