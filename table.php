<?php

$path 	= $_GET['path'];
$id 	= $_GET['id'];

$xml_filename = $path . '/tables.xml';

$xml = file_get_contents($xml_filename);

// Get details for one table...
$dom= new DOMDocument;
$dom->loadXML($xml);
$xpath = new DOMXPath($dom);

$table = new stdclass;

$nodeCollection = $xpath->query ('//table[@id="' . $id . '"]');
foreach($nodeCollection as $node)
{
	$table->html = $dom->saveXML($node);
}
		
echo json_encode($table);
?>