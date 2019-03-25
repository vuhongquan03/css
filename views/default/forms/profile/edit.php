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
$entity = elgg_extract('entity', $vars);

echo elgg_view_field(array(
    '#type' => 'text',
    'name' => 'name',
    'value' => $entity->name,
    '#label' => elgg_echo('user:name:label'),
    'maxlength' => 50, // hard coded in /actions/profile/edit
));

$sticky_values = elgg_get_sticky_values('profile:edit');

$profile_fields = elgg_get_config('profile_fields');
if (is_array($profile_fields) && count($profile_fields) > 0) {
    foreach ($profile_fields as $shortname => $valtype) {
        $metadata = elgg_get_metadata(array(
            'guid' => $entity->guid,
            'metadata_name' => $shortname,
            'limit' => false
        ));
        if ($metadata) {
            if (is_array($metadata)) {
                $value = '';
                foreach ($metadata as $md) {
                    if (!empty($value)) {
                        $value .= ', ';
                    }
                    $value .= $md->value;
                    $access_id = $md->access_id;
                }
            } else {
                $value = $metadata->value;
                $access_id = $metadata->access_id;
            }
        } else {
            $value = '';
            $access_id = ACCESS_DEFAULT;
        }

        // sticky form values take precedence over saved ones
        if (isset($sticky_values[$shortname])) {
            $value = $sticky_values[$shortname];
        }
        if (isset($sticky_values['accesslevel'][$shortname])) {
            $access_id = $sticky_values['accesslevel'][$shortname];
        }

        $id = "profile-$shortname";
        $input = elgg_view("input/$valtype", [
            'name' => $shortname,
            'value' => $value,
            'id' => $id,
        ]);
        $access_input = elgg_view('input/access', [
            'name' => "accesslevel[$shortname]",
            'value' => $access_id,
        ]);

        if ($shortname != "description") {
            echo "<div class='row'>";
            echo "<div class='col-md-9'>";
            echo elgg_view('elements/forms/field', [
                'input' => $input,
                'label' => elgg_view('elements/forms/label', [
                    'label' => elgg_echo("profile:$shortname"),
                    'id' => $id,
                ])
            ]);
            echo "</div>";
            echo "<div class='col-md-3'>";
            echo elgg_view('elements/forms/field', [
                'input' => $access_input,
                'label' => elgg_view('elements/forms/label', [
                    'label' => "&nbsp;",
                    'id' => $id,
                ])
            ]);
            echo "</div>";
            echo "</div>";
        } else {
            echo elgg_view('elements/forms/field', [
                'input' => $input . $access_input,
                'label' => elgg_view('elements/forms/label', [
                    'label' => elgg_echo("profile:$shortname"),
                    'id' => $id,
                ])
            ]);
        }
    }
}

elgg_clear_sticky_form('profile:edit');

echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $entity->guid));
echo elgg_view_field([
    '#type' => 'submit',
    'value' => elgg_echo('save'),
    '#class' => 'elgg-foot',
]);
