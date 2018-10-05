#!/usr/bin/php
<?php
function ft_split($string)
{
	$arr = preg_split("/ +/",$string);
	return($arr);
}
if ($argc < 2)
	exit ;

$arr = ft_split($argv[1]);

$popped = array_shift($arr);
array_push($arr, $popped);

$i = 0;
foreach ($arr as $str)
{
	if ($i != 0)
		echo " ";
	echo $str;
	$i++;
}
echo "\n";
?>