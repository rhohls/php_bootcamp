#!/usr/bin/php
<?php

if ($argc != 2 | !(is_readable($argv[1])))
	exit;
	
$file = file_get_contents($argv[1]);

function to_upper($matches) {
	$matches[2] = strtoupper($matches[2]);
	return ($matches[1].$matches[2].$matches[3]);
}
function to_upper_multi($matches) {
	$str = $matches[2];
	$tocap = TRUE;
	$i = 0;
	
	while ($str[$i])
	{
		if ($str[$i] == '>')
			$tocap = TRUE;
		elseif ($str[$i] == '<')
			$tocap = FALSE;
		
		if ($tocap)
			$ret .= ucfirst($str[$i]);
		else
			$ret .= $str[$i];
		$i++;
	}	
	return ($matches[1].$ret.$matches[3]);
}

$result = preg_replace_callback('/(title=")(.*?)(\")/si', "to_upper", $file);
$result_final = preg_replace_callback('/(<a.*?>)(.*?)(<\/a>)/si', "to_upper_multi", $result);
echo $result_final;
?>