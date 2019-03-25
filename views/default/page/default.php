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
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));

$header = elgg_view('page/elements/header', $vars);
$navbar = elgg_view('page/elements/navbar', $vars);
$content = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);

$body = <<<__BODY
<div class="elgg-page elgg-page-default">
	<div class="elgg-page-messages">
		$messages
	</div>
__BODY;

//$body .= elgg_view('page/elements/topbar_wrapper', $vars);

$body .= <<<__BODY
	<div class="elgg-page-header">
            <div class="container">
                <div class="row">
                    $header
                </div>
            </div>
	</div>
        $navbar
        <div class='container body'>
                $content
                <div style='clear:both;'></div>
        </div>
        $footer
</div>
__BODY;

$body .= elgg_view('page/elements/foot');

$head = elgg_view('page/elements/head', $vars['head']);

$params = array(
    'head' => $head,
    'body' => $body,
);

if (isset($vars['body_attrs'])) {
    $params['body_attrs'] = $vars['body_attrs'];
}

echo elgg_view("page/elements/html", $params);
