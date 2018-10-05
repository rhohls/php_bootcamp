#!/usr/bin/php
<?php
if ($argc != 2)
	exit;

$new_arr = preg_split("/ +/",$argv[1]);
$i = 0;
foreach ($new_arr as $str)
{
	if ($i != 0)
		echo " ";
	echo $str;
	$i++;
}
echo "\n";
?>