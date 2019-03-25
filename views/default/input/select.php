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
$vars['class'] = elgg_extract_class($vars, 'selectpicker form-control');

$defaults = array(
    'disabled' => false,
    'value' => '',
    'options_values' => array(),
    'options' => array(),
);

$vars = array_merge($defaults, $vars);

$options_values = $vars['options_values'];
unset($vars['options_values']);

$options = $vars['options'];
unset($vars['options']);

$value = is_array($vars['value']) ? $vars['value'] : array($vars['value']);
$value = array_map('strval', $value);
unset($vars['value']);

$vars['multiple'] = !empty($vars['multiple']);

// Add trailing [] to name if multiple is enabled to allow the form to send multiple values
if ($vars['multiple'] && !empty($vars['name']) && is_string($vars['name'])) {
    if (substr($vars['name'], -2) != '[]') {
        $vars['name'] = $vars['name'] . '[]';
    }
}

$options_list = '';

if ($options_values) {
    foreach ($options_values as $opt_value => $option) {

        $option_attrs = array(
            'value' => $opt_value,
            'selected' => in_array((string) $opt_value, $value),
        );

        if (is_array($option)) {
            $text = elgg_extract('text', $option, '');
            unset($option['text']);
            if (!$text) {
                elgg_log('No text defined for input/select option with value "' . $opt_value . '"', 'ERROR');
            }

            $option_attrs = array_merge($option_attrs, $option);
        } else {
            $text = $option;
        }

        $options_list .= elgg_format_element('option', $option_attrs, $text);
    }
} else {
    if (is_array($options)) {
        foreach ($options as $option) {

            if (is_array($option)) {
                $text = elgg_extract('text', $option, '');
                unset($option['text']);

                if (!$text) {
                    elgg_log('No text defined for input/select option', 'ERROR');
                }

                $option_attrs = [
                    'selected' => in_array((string) $text, $value),
                ];
                $option_attrs = array_merge($option_attrs, $option);
            } else {
                $option_attrs = [
                    'selected' => in_array((string) $option, $value),
                ];

                $text = $option;
            }

            $options_list .= elgg_format_element('option', $option_attrs, $text);
        }
    }
}

echo "<div class='form-group'>";
echo elgg_format_element('select', $vars, $options_list);
echo "</div>";
