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
elgg_set_http_header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();

$attrs = "";
if (isset($vars['body_attrs'])) {
    $attrs = elgg_format_attributes($vars['body_attrs']);
    if ($attrs) {
        $attrs = " $attrs";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
    <head>
        <?php echo $vars["head"]; ?>
    </head>
    <body<?php echo $attrs ?>>
        <div id="spinner"></div>
        <div id="page_wrapper">
            <?php echo $vars["body"]; ?>
        </div>
    </body>
</html>
