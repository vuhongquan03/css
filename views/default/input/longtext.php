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
$vars['class'] = elgg_extract_class($vars, 'elgg-input-longtext form-control');

$defaults = array(
    'value' => '',
    'rows' => '10',
    'cols' => '50',
    'id' => "elgg-input-" . base_convert(mt_rand(), 10, 36),
);

$vars = array_merge($defaults, $vars);

$editor_opts = (array) elgg_extract('editor_options', $vars, []);
$editor_opts['disabled'] = !elgg_extract('editor', $vars, true);
$editor_opts['state'] = elgg_extract('visual', $vars, true) ? 'visual' : 'html';

unset($vars['editor_options']);
unset($vars['editor']);
unset($vars['visual']);

$vars['data-editor-opts'] = json_encode($editor_opts);

$value = htmlspecialchars($vars['value'], ENT_QUOTES, 'UTF-8');
unset($vars['value']);
echo elgg_view_menu('longtext', array(
    'sort_by' => 'priority',
    'class' => 'elgg-menu-hz',
    'id' => $vars['id'],
));
echo "<div class='form-group'>";


echo elgg_format_element('textarea', $vars, $value);
echo "</div>";
