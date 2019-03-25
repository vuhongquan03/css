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
$value = "";
if (array_key_exists('value', $vars)) {
    $value = $vars['value'];
} elseif ($value = get_input('q', get_input('tag', NULL))) {
    $value = $value;
}

$class = "navbar-form navbar-left";
if (isset($vars['class'])) {
    $class = "$class {$vars['class']}";
}

// @todo - create function for sanitization of strings for display in 1.8
// encode <,>,&, quotes and characters above 127
if (function_exists('mb_convert_encoding')) {
    $display_query = mb_convert_encoding($value, 'HTML-ENTITIES', 'UTF-8');
} else {
    // if no mbstring extension, we just strip characters
    $display_query = preg_replace("/[^\x01-\x7F]/", "", $value);
}

// render placeholder separately so it will double-encode if needed
$placeholder = htmlspecialchars(elgg_echo('search'), ENT_QUOTES, 'UTF-8');

$search_attrs = elgg_format_attributes(array(
    'type' => 'text',
    'class' => 'form-control mb-2 mr-sm-2',
    'size' => '21',
    'name' => 'q',
    'autocapitalize' => 'off',
    'autocorrect' => 'off',
    'required' => true,
    'value' => $display_query,
        ));
?>

<form class="form-inline <?php echo $class; ?>"  action="<?php echo elgg_get_site_url(); ?>search" method="get">
  <label class="sr-only"><?php echo elgg_echo("search"); ?></label>
  <input placeholder="<?php echo $placeholder; ?>" <?php echo $search_attrs; ?>>

  <button type="submit" class="btn btn-primary mb-2"><?php echo elgg_echo('search:go'); ?></button>
</form>




