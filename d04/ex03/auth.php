<?php
session_start();
function auth($login, $passwd)
{
	$login = $_GET["login"];
	if ($login !== "" && $_GET["passwd"] !== "")
	{
		if (file_exists("../private/passwd"))
		{
			$data = unserialize(file_get_contents("../private/passwd"));
			foreach ($data as $acc)
			{
				if ($acc["login"] == $login)
					break ;
			}
			
			if ($acc["login"] !== $login)
			exit_();	
			$oldhashedpwd = hash('Whirlpool', $_POST["oldpw"]);
			if ($oldhashedpwd != $acc["passwd"])
				exit_();			
		}
		else
			exit("ERROR\n");
	}	
}

?>