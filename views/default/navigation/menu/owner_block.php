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
$menu = $vars['menu']['default'];
if (is_array($menu)) {
    echo <<<HTML
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
HTML;
    foreach ($menu as $m) {
        $text = $m->getText();
        $href = $m->getHref();
        $selected = $m->getSelected() ? "active" : "";
        echo "<a class='$selected nav-link' href='$href' role='tab'>$text</a>";
    }
    echo <<<HTML
</div>
HTML;
}