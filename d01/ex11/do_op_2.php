#!/usr/bin/php
<?php
function ft_split($string)
{
	$arr = preg_split("/ +/",$string);
	return($arr);
}
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit;
}
$str = $argv[1];
if (strpos("+", $str))




if ($big_arr[1] == '+')
	$ret = $big_arr[0] + $big_arr[2];
else if ($big_arr[1] == '-')
	$ret = $big_arr[0] - $big_arr[2];
else if ($big_arr[1] == '*')
	$ret = $big_arr[0] * $big_arr[2];
else if ($big_arr[1] == '/')
	$ret = $big_arr[0] / $big_arr[2];
else if ($big_arr[1] == '%')
	$ret = $big_arr[0] % $big_arr[2];	
	
echo $ret."\n";
?>