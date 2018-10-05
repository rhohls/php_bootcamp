#!/usr/bin/php
<?php
$folder = "";

function saveimg($matches)
{
	global $folder;
	$url = $matches[1];
	$img = end(explode("/",$url));
	
	$file_loc = $folder."/".$img;
	if ($img)
		file_put_contents($file_loc, file_get_contents($url));
	return ("aa");
}

if ($argc == 2)
{
	$url = $argv[1];
	if (!filter_var($url, FILTER_VALIDATE_URL))
		exit;
	$folder = preg_replace("/http[s]{0,1}:\/\//", "", $url);
	$folder = (explode("/", $folder))[0];
		
	@mkdir($folder);	
	$html = file_get_contents($url);
	$matches = preg_replace_callback('/<img [^>]*src="(.*)["|?]/siU', 'saveimg',$html);
}
?>