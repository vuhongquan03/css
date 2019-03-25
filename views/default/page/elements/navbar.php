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

$url = elgg_get_site_url();
$sitename = elgg_get_site_entity()->name;

$theme = elgg_get_plugin_setting("secondary_theme","socia_bootstrap_theme");

$attributes = array(
        "default" => "navbar-dark bg-primary",
        "cerulean" => "navbar-dark bg-primary",
        "cosmo" => "navbar-dark bg-primary",
        "cyborg" => "navbar-dark bg-dark",
        "darkly" => "navbar-dark bg-primary",
        "flatly" => "navbar-dark bg-primary",
        "journal" => "navbar-light bg-light",
        "lux" => "navbar-light bg-light",
        "litera" => "navbar-light bg-light",
        "lumen" => "navbar-light bg-light",
        "materia" => "navbar-dark bg-primary",
        "minty" => "navbar-dark bg-primary",
        "pulse" => "navbar-dark bg-primary",
        "sandstone" => "navbar-dark bg-primary",
        "simplex" => "navbar-light bg-light",
        "sketchy" => "navbar-light bg-light",
        "slate" => "navbar-dark bg-primary",
        "solar" => "navbar-dark bg-dark",
        "spacelab" => "navbar-light bg-light",
        "superhero" => "navbar-dark bg-dark",
        "united" => "navbar-dark bg-primary",
        "yeti" => "navbar-dark bg-primary"
);

if (isset($attributes[$theme])) {
    $class = $attributes[$theme];
} else {
    $class = "navbar-dark bg-primary";
}
?>

<nav class="navbar navbar-expand-lg <?php echo $class; ?>">
    <div class='container'>
        <a class="navbar-brand" href="<?php echo $url; ?>"><?php echo $sitename; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                echo elgg_view_menu('site', array(
                    "sort_by" => "priority"
                ));
                ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                echo elgg_view_menu('site_right', array(
                    "sort_by" => "priority"
                ));
                ?>
            </ul>
        </div>
    </div>
</nav>