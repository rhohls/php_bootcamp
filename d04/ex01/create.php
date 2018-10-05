<?php
session_start();
if ($_GET["submit"] == "OK")
{
	if ($_GET["login"])
		$_SESSION["login"] = $_GET["login"];
	if ($_GET["passwd"])
		$_SESSION["passwd"] = $_GET["passwd"];
}
?>
