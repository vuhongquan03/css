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
if (isset($vars['breadcrumbs'])) {
    $breadcrumbs = $vars['breadcrumbs'];
} else {
    $breadcrumbs = elgg_get_breadcrumbs();
}

if (!is_array($breadcrumbs) || !$breadcrumbs) {
    return;
}

$attrs['class'] = elgg_extract_class($vars, ['breadcrumb']);
$lis = '';

foreach ($breadcrumbs as $breadcrumb) {
    // We have to escape text (without double-encoding). Titles in core plugins are HTML escaped
    // on input, but we can't guarantee that other users of this view and of elgg_push_breadcrumb()
    // will do so.
    if (!empty($breadcrumb['link'])) {
        $crumb = elgg_view('output/url', array(
            'href' => $breadcrumb['link'],
            'text' => $breadcrumb['title'],
            'encode_text' => true,
            'is_trusted' => true,
        ));
    } else {
        $crumb = htmlspecialchars($breadcrumb['title'], ENT_QUOTES, 'UTF-8', false);
    }

    $lis .= "<li>$crumb</li>";
}

echo elgg_format_element('ul', $attrs, $lis);
