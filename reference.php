<?php

$path 	= $_GET['path'];
$id 	= $_GET['id'];

$xml_filename = $path . '/refs.xml';

$xml = file_get_contents($xml_filename);

// Get details for one reference...
$dom= new DOMDocument;
$dom->loadXML($xml);
$xpath = new DOMXPath($dom);

$reference = new stdclass;

$nodeCollection = $xpath->query ('//ref[@id="' . $id . '"]/text');
foreach($nodeCollection as $node)
{
//	$reference->text = $node->textContent;
	$reference->text = $dom->saveXML($node);
}
$nodeCollection = $xpath->query ('//ref[@id="' . $id . '"]/link');
foreach($nodeCollection as $node)
{
	$reference->link = $node->firstChild->nodeValue;
}
		
echo json_encode($reference);
?>