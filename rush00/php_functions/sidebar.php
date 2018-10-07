<?php


// database stuff

//the reason for this is so it can be dynamic on the admin page
// dont technically need it

session_start();

function getSidebarCat()
{
	$var = ['Bedroom', 'Lounge','Kitchen', 	'Dinning Room'];
	foreach($var as $item)
	{ 
		// id for category?
		echo "<li><a href='index.php?cat=$item'>$item</a></li>\n";
	}
}

function getSidebarCat2()
{
	$var = ['chair', 'bed', 'table'];
	foreach($var as $item)
	{ 
		echo "<li><a href='index.php?page=cat&cat=$item'>$item</a></li>\n";
	}
}

function getBasketInfo()
{
	$basket = $_SESSION['basket'];
	// $num_items = count($basket);
	// $cost = calculate_cost($basket);
	
	$num_items = 0;
	$cost = 0;
	echo"<span>Total items: $num_items</span>
	<br>
	<span>Net cost: R$cost</span>";
}

?>
