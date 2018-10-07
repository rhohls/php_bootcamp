<?php


// database stuff

//the reason for this is so it can be dynamic on the admin page
// dont technically need it
function getRoomType()
{

	$var = get_database_all_items();
	
	foreach($var as $item):
	{ 
		$link = $item['url'];
		$title = $item['title'];
		
		
		
		echo "<li><a href='$link'>$title</a></li>\n";
	
}



?>
