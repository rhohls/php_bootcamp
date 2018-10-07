<?php
// pass category to function
function getProducts()
{
	$var = ['Bedroom', 'Lounge','Kitchen', 	'Dinning Room'];
	// all product id
	foreach($var as $item)
	{ 
		// id for category?
		echo "<li><a href='index.php?cat=$item'>$item</a></li>\n";
	}
}

?>