<?php

$path = $_GET['id'];

$html_filename = $path . '/index.html';

$path_parts = pathinfo($html_filename);

$dirname = $path_parts['dirname'];
$article_number = '';
if (preg_match('/\d+\/\d+(?<articlenumber>.*)$/', $dirname, $matches))
{
	$article_number = $matches['articlenumber'];
}

$html = file_get_contents($html_filename);

// Process HTML
$title = '&nbsp;';
if (preg_match('/<title>(?<title>.*)<\/title>/Uu', $html, $matches))
{
	$title = $matches['title'];
}

$html = preg_replace('/(.*)<body(\s+class="(.*)")>/Uu', '', $html);
$html = preg_replace('/<\/body>(.*)/Uu', '', $html);

// Figures
$html = preg_replace('/<a href="fig:\/\/(f\d+)">/Uu', "<a href=\"javascript:display_figure('" . $dirname . "','$1');\">", $html);

// Figures at a glance
$html = preg_replace('/<img src="/Uu', "<img src=\"" . $dirname . "/", $html);

// References
$html = preg_replace('/<a href="ref:\/\/(b\d+)">/Uu', "<a href=\"javascript:display_reference('" . $dirname . "','$1');\">", $html);

// Tables
$html = preg_replace('/<a href="table:\/\/(t\d+)">/Uu', "<a href=\"javascript:display_table('" . $dirname . "','$1');\">", $html);

// External links
$html = preg_replace('/<a href="(http:\/\/.*)">/Uu', "<a href=\"javascript:display_external_link('$1');\">", $html);


echo json_encode($html);
?>