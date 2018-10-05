#!/usr/bin/php
<?php
function ft_split($string)
{
	$arr = preg_split("/ +/",$string);
	sort($arr);
	return($arr);
}
/*
97 -> 122  = char
248 -> 257 = number (48)
500+ ->  = other
(this is order)
*/
function ft_type($char)
{
	$num = ord($char);
	if (ctype_digit($char))
		$num += 200;
	elseif (!ctype_alpha($char))
		$num += 500;
	return ($num);
}

function ft_sort($str1, $str2)
{
	$str1 = strtolower($str1);
	$str2 = strtolower($str2);
	$i = 0;
	while (1)
	{
		$type1 = ft_type($str1[$i]);
		$type2 = ft_type($str2[$i]);
		
		if ($type1 != $type2)
			return ($type1 - $type2);
		elseif (!$str1[$i] && !$str2[$i])
			break;
		$i++;
	}
    return (0);
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
usort($big_arr, ft_sort);
foreach ($big_arr as $str)
{
	echo $str."\n";
}
?>