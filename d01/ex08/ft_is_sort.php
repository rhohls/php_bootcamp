<?php
function ft_is_sort($array)
{
	$sorted = $array;
	sort($sorted);

	foreach($sorted as $index=>$value)
		if($value != $array[$index])
			return false;
	return true;
}
?>