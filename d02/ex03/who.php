#!/usr/bin/php
<?php

$fd = fopen("/var/run/utmpx", 'r');

$i = 0;
$users;
while ($info = fread($fd, 628))
{
	$info = unpack("a256user/a4id/a32cons/iid/itype/I2time", $info);
	if ($info['type'] == 7)
	{
		$users[$i] = $info;
		$i++;
	}
}

foreach($users as $user)
{
	$str = trim($user['user']);
	echo str_pad($str, 9);
	echo $user['cons']." ";
	echo date("M  j H:i", $user['time1']);
	echo"\n";
}

?>