<?php
//The database will contain feilds such as:
//1. item-name
//2. category
//3. price
//4. image-directory_url
//kinda static but the idea is to have a simple database.
function add_item($cat, $name, $price, $img) {
	$id = 0;
	$database = file_get_contents("my_db.fundb");
	if ($database != "null") {
		$database = json_decode($database, true);
		foreach ($database as $item) {
			if ($item["name"] == $name && $item["price"] == $price)
				return ($database);
			if ($item["id"] == $id)
				$id++;
		}
	}
	else
		$database = Array();
	array_push($database, Array("name" => $name, "price" => $price, "category" => $cat, "img" => $img, "id" => $id));
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
	return ($database);
}

//this removes an item from the database
function remove_item($id) {
	$i = 0;
	$database = file_get_contents("my_db.fundb");
	if ($database == "null")
		return (null);
	$database = json_decode($database, true);
	foreach ($database as $item) {
		if ($item["id"] == $id)
			unset($database[$i]);
		$i++;
	}
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
	return ($database);
}


//this modifies the price of any item in the database
function mod_item_price($price, $id) {
	$i = 0;
	$database = file_get_contents("my_db.fundb");
	if ($database == "null")
		return (null);
	$database = json_decode($database, true);
	foreach ($database as $item) {
		if ($item["id"] == $id)
			$database[$i]["price"] = $price;
		$i++;
	}
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
	return ($database);
}

//this modyfies the categories of any item in the database.
//you only need to know the name.
function mod_item_category($id, $cat) {
	$i = 0;
	$database = file_get_contents("my_db.fundb");
	if ($database == "null")
		return (null);
	$database = json_decode($database, true);
	foreach ($database as $item) {
		if ($item["id"] == $id)
			$database[$i]["category"] = $cat;
		$i++;
	}
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
	return ($database);
}

//this returns an array of items that match the desired category.
function by_cat($database, $cat) {
	$database = file_get_contents("my_db.fundb");
	if ($database == "null")
		return (null);
	$database = json_decode($database, true);
	$sub_base = Array();
	foreach ($database as $item) {
		if (strstr($item["category"], $cat))
			array_push($sub_base, $item);
	}
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
	return ($sub_base);
}

//use this to initialize the database.
function init_items_db() {
	if (file_exists("my_db.fundb"))
		return ;
	$database = Array();
	$json_data = json_encode($database);
	file_put_contents("my_db.fundb", $json_data);
}

// Functions for user Database will be similar to that off the items with minor changes.
function init_user_db() {
	if (file_exists("users.fundb"))
		return ;
	$users = Array();
	$json_data = json_encode($users);
	file_put_contents("users.fundb", $json_data);
}

function add_user($fname, $lname, $email, $uname, $passw) {
	$id = 0;
	$database = file_get_contents("users.fundb");
	if ($database != "null") {
		$database = json_decode($database, true);
		foreach ($database as $user) {
			if ($user["uname"] == $uname || $user["email"] == $email)
				return ($database);
			if ($item["id"] == $id)
				$id++;
		}
	}
	else
		$database = Array();
	array_push($database, Array("fname" => $fname, "lname" => $lname, "email" => $email, "uname" => $uname, "passw" => $passw));
	$json_data = json_encode($database);
	file_put_contents("users.fundb", $json_data);
	return ($database);
}

function remove_user($uname) {
	$user_db = "users.fundb";
	$users = file_get_contents($user_db);
	$users = json_decode($users, true);
	unset($users[1]);
	//print_r($users);
	//$json_data = json_encode($users);
	//file_put_contents($user_db, $users);
	$json_data = json_encode($users);
	file_put_contents("users.fundb", $json_data);
	return ($users);
}

function get_users() {
	return (json_decode(file_get_contents("users.fundb")));
}

function get_items() {
	return (json_decode(file_get_contents("my_db.fundb")));
}

//each item gets a name, id, category and price.
//cat, name, price, img_url
?>
