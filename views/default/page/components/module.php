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

    $type = elgg_extract('type', $vars, false);
    $title = elgg_extract('title', $vars, '');
    $body = elgg_extract('body', $vars, '');
    $footer = elgg_extract('footer', $vars, '');
    $show_inner = elgg_extract('show_inner', $vars, false);

    $attrs = [
        'id' => elgg_extract('id', $vars),
        'class' => elgg_extract_class($vars, "card mbl"),
    ];

    if ($type) {
        $attrs['class'][] = "elgg-module-$type";
    }

    $header = elgg_extract('header', $vars);
    if ($title) {
        $header = $title;
    }

    $header = "<div class='card-header'>$header</div>";

    $body = "<div class='card-body'>$body</div>";

    if ($footer) {
        $footer = "<div class='card-footer'>$footer</div>";
    }

    $contents = $header . $body . $footer;
    if ($show_inner) {
        $contents = "<div class='card-body'>$contents</div>";
    }

    echo elgg_format_element('div', $attrs, $contents);
} else {
    $type = elgg_extract('type', $vars, false);
    $title = elgg_extract('title', $vars, '');
    $body = elgg_extract('body', $vars, '');
    $footer = elgg_extract('footer', $vars, '');
    $show_inner = elgg_extract('show_inner', $vars, false);

    $attrs = [
        'id' => elgg_extract('id', $vars),
        'class' => elgg_extract_class($vars, 'elgg-module'),
    ];

    if ($type) {
        $attrs['class'][] = "elgg-module-$type";
    }

    $header = elgg_extract('header', $vars);
    if ($title) {
        $header = elgg_format_element('h3', [], $title);
    }

    if ($header !== null) {
        $header = elgg_format_element('div', ['class' => 'elgg-head'], $header);
    }
    $body = elgg_format_element('div', ['class' => 'elgg-body'], $body);
    if ($footer) {
        $footer = elgg_format_element('div', ['class' => 'elgg-foot'], $footer);
    }

    $contents = $header . $body . $footer;
    if ($show_inner) {
        $contents = elgg_format_element('div', ['class' => 'elgg-inner'], $contents);
    }

    echo elgg_format_element('div', $attrs, $contents);
}