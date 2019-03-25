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
$widget = elgg_extract('entity', $vars);
if (!($widget instanceof \ElggWidget)) {
    return;
}

if (!elgg_in_context("admin")) {
    $title = $widget->getTitle();
} else {
    $title = "<h3 class='elgg-widget-title'>{$widget->getTitle()}</h3>";
}
$controls = elgg_view('object/widget/elements/controls', [
    'widget' => $widget,
    'show_edit' => $widget->canEdit(),
        ]);

echo "<div class='elgg-widget-handle clearfix'>{$title}{$controls}</div>";
