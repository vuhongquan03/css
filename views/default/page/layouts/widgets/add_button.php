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
?>
<div class="elgg-widget-add-control">
    <?php
    echo elgg_view('output/url', array(
        'href' => '#',
        'text' => elgg_echo('widgets:add'),
        'class' => 'btn btn-warning',
        'rel' => 'toggle',
        'is_trusted' => true,
        'data-toggle-selector' => '#widgets-add-panel, .elgg-widget-add-control > a',
        'data-toggle-slide' => 0,
    ));
    echo elgg_view('output/url', array(
        'href' => '#',
        'text' => elgg_echo('widgets:panel:close'),
        'class' => 'btn btn-warning hidden',
        'rel' => 'toggle',
        'is_trusted' => true,
        'data-toggle-selector' => '#widgets-add-panel, .elgg-widget-add-control > a',
        'data-toggle-slide' => 0,
    ));
    ?>
</div>
