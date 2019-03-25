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
echo elgg_view_field([
    '#type' => 'text',
    'name' => 'username',
    'autofocus' => true,
    'required' => true,
    '#label' => elgg_echo('loginusername'),
]);

echo elgg_view_field([
    '#type' => 'password',
    'name' => 'password',
    'required' => true,
    '#label' => elgg_echo('password'),
]);

echo elgg_view('login/extend', $vars);

if (isset($vars['returntoreferer'])) {
    echo elgg_view_field([
        '#type' => 'hidden',
        'name' => 'returntoreferer',
        'value' => 'true'
    ]);
}

ob_start();
?>
<div class="elgg-foot">
    <label class="mtm float-alt">
        <input type="checkbox" name="persistent" value="true" />
        <?php echo elgg_echo('user:persistent'); ?>
    </label>

    <?php
    echo elgg_view('input/submit', array('value' => elgg_echo('login')));

    echo elgg_view_menu('login', array(
        'sort_by' => 'priority',
        'class' => 'elgg-menu-general elgg-menu-hz mtm',
    ));
    ?>
</div>
<?php
$footer = ob_get_clean();
elgg_set_form_footer($footer);
