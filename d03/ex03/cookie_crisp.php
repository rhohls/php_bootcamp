<?php
// echo $_GET['action']."\n";
if ($_GET['action'] == 'set')
{
	if ($_GET['name'] && $_GET['value'])
		setcookie($_GET['name'], $_GET['value']);
}
elseif ($_GET['action'] == 'get')
{
	if ($_GET['name'])
		echo($_COOKIE[$_GET['name']])."\n";
}
elseif ($_GET['action'] == 'del')
{
	if ($_GET['name'])
		setcookie($_GET['name'],"", time() - 1);
}
?>