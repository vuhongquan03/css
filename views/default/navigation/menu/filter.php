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
?>
<ul class="nav nav-tabs" role="tablist">
    <?php
    foreach ($menu as $m) {
        $text = $m->getText();
        $href = $m->getHref();
        $selected = $m->getSelected() ? "active" : "";
        echo "<li role='presentation' class='nav-item'><a href='$href' class='nav-link $selected'>$text</a>";
    }
    ?>
</ul>