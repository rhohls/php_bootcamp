#!/usr/bin/php
<?php
function ft_split($string)
{
	$arr = preg_split("/ +/",$string);
	return($arr);
}


if ($argc < 2)
{
	echo "Incorrect Parameters\n";
	exit;
}
$big_arr = ft_split($argv[1]);
$i = 2;
while($i < $argc)
{
	$new_arr = ft_split($argv[$i]);
	$big_arr = array_merge($big_arr, $new_arr);
	$i++;
}

if (count($big_arr) != 3)
{
	echo "Incorrect Parameters\n";
	exit;
}

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