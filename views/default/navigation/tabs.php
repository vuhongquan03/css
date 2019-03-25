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
$options = $vars;

$type = elgg_extract('type', $vars, 'horizontal');

$options['class'] = "nav nav-tabs";
if (isset($vars['class'])) {
    $options['class'] = "{$options['class']} {$vars['class']}";
}

unset($options['tabs']);
unset($options['type']);

$attributes = elgg_format_attributes($options);

if (isset($vars['tabs']) && is_array($vars['tabs']) && !empty($vars['tabs'])) {
    ?>
    <ul <?php echo $attributes; ?>>
        <?php
        foreach ($vars['tabs'] as $info) {
            $aclass = null;
            $class = elgg_extract('class', $info, '');
            $id = elgg_extract('id', $info, '');

            $selected = elgg_extract('selected', $info, FALSE);
            if ($selected) {
                $aclass .= ' active';
            }

            $class_str = ($class) ? "class='$class nav-item'" : '';
            $id_str = ($id) ? "id=\"$id\"" : '';

            $options = $info;
            unset($options['class']);
            unset($options['id']);
            unset($options['selected']);

            if (!isset($info['href']) && isset($info['url'])) {
                $options['href'] = $info['url'];
                unset($options['url']);
            }
            if (!isset($info['text']) && isset($info['title'])) {
                $options['text'] = $options['title'];
                unset($options['title']);
            }
            if (isset($info['link_class'])) {
                $options['class'] = $options['link_class'] ;
                unset($options['link_class']);
            }

            if (isset($info['link_id'])) {
                $options['id'] = $options['link_id'];
                unset($options['link_id']);
            }

            $options['class'] .= $aclass . " nav-link";
            $link = elgg_view('output/url', $options);

            echo "<li $id_str $class_str>$link</li>";
        }
        ?>
    </ul>
    <?php
}