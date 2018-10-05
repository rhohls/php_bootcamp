#!/usr/bin/php
<?php
function exit_form()
{
	echo "Wrong Format\n";
	exit;	
}

if ($argc != 2)
	exit;
	
$time_arr = preg_split("/ +/",$argv[1]);
if (count($time_arr) != 5)
	exit_form();
$net_time = 0;

// YEAR
if (!(is_numeric($time_arr[3])))
	exit_form();
// DAY of MONTH
if (!(is_numeric($time_arr[1]) && ($time_arr[1] > 0 && $time_arr[1] < 31)))
	exit_form();
//Day of the Week
$time_arr[0] = strtolower($time_arr[0]);
$dayofweek = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
if (!(in_array($time_arr[0], $dayofweek, $strict = TRUE)))
	exit_form();
//convert month
lcfirst($time_arr[2]);
if ($time_arr[2] == "janvier")
	$time_arr[2] = 1;
elseif ($time_arr[2] == "février")
	$time_arr[2] = 2;
elseif ($time_arr[2] == "mars")
	$time_arr[2] = 3;
elseif ($time_arr[2] == "avril")
	$time_arr[2] = 4;
elseif ($time_arr[2] == "mai")
	$time_arr[2] = 5;
elseif ($time_arr[2] == "juin")
	$time_arr[2] = 6;
elseif ($time_arr[2] == "juillet")
	$time_arr[2] = 7;	
elseif ($time_arr[2] == "août")
	$time_arr[2] = 8;
elseif ($time_arr[2] == "septembre")
	$time_arr[2] = 9;
elseif ($time_arr[2] == "octobre")
	$time_arr[2] = 10;
elseif ($time_arr[2] == "novembre")
	$time_arr[2] = 11;
elseif ($time_arr[2] == "décembre")
	$time_arr[2] = 12;
else
	exit_form();
	
$time_str = $time_arr[1] . " " . $time_arr[2] . " ". $time_arr[3];
$net_time = 0;
$net_time += strtotime($time_str);
// TIME (only for validation)
$curr_time = preg_split("/:/", $time_arr[4]);
if (count($curr_time) != 3)
	exit_form();
// hour
if (is_numeric($curr_time[0]) && ($curr_time[0] >= 0 && $curr_time[0] <= 23)) 
	$net_time += $curr_time[0] * 3600;
else
	exit_form();
// min
if (is_numeric($curr_time[1]) && ($curr_time[1] >= 0 && $curr_time[1] <= 59)) 
	$net_time += $curr_time[1] * 60;
else
	exit_form();	
// sec
if (is_numeric($curr_time[2]) && ($curr_time[2] >= 0 && $curr_time[2] <= 59)) 
	$net_time += $curr_time[2];
else
	exit_form();
	
date_default_timezone_set('Europe/Paris');
echo mktime($curr_time[0] ,$curr_time[1], $curr_time[2], $time_arr[2], $time_arr[1], $time_arr[3])."\n";
?>