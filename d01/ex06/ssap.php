#!/usr/bin/php
<?php
function ft_split($string)
{
	$arr = preg_split("/ +/",$string);
	sort($arr);
	return($arr);
}

if ($argc < 2)
	exit;

$big_arr = ft_split($argv[1]);
$i = 2;

while($i < $argc)
{
	$new_arr = ft_split($argv[$i]);
	$big_arr = array_merge($big_arr, $new_arr);
	$i++;
}
sort($big_arr);

foreach ($big_arr as $str)
{
	echo $str."\n";
}
?>