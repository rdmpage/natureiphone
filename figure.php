<?php

$path 	= $_GET['path'];
$id 	= $_GET['id'];

$xml_filename = $path . '/figs.xml';

$xml = file_get_contents($xml_filename);

// Get details for one figure...
$dom= new DOMDocument;
$dom->loadXML($xml);
$xpath = new DOMXPath($dom);

$figure = new stdclass;


$nodeCollection = $xpath->query ('//fig[@id="' . $id . '"]/image');
foreach($nodeCollection as $node)
{
	$figure->image = $node->firstChild->nodeValue;
}
$nodeCollection = $xpath->query ('//fig[@id="' . $id . '"]/caption');
foreach($nodeCollection as $node)
{
	$figure->caption = $node->firstChild->nodeValue;
}
		
echo json_encode($figure);
?>