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
$class = 'row';
if (isset($vars['class'])) {
    $class = "$class {$vars['class']}";
}
?>

<div class="<?php echo $class; ?>">
    <div class="col-md-8">
        <?php
        echo elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

        echo elgg_view('page/layouts/elements/header', $vars);

// @todo deprecated so remove in Elgg 2.0
        if (isset($vars['area1'])) {
            echo $vars['area1'];
        }
        if (isset($vars['content'])) {
            echo $vars['content'];
        }

        echo elgg_view('page/layouts/elements/footer', $vars);
        ?>
    </div>
    <div class="col-md-4">
        <?php
// With the mobile experience in mind, the content order is changed in socia theme,
// by moving sidebar below main content.
// On smaller screens, blocks are stacked in left to right order: content, sidebar.
        echo elgg_view('page/elements/sidebar', $vars);
        ?>
    </div>
</div>
