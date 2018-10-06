<?php
function exit_()
{
	echo "ERROR\n";
	die();
}

session_start();
if ($_POST["submit"] == "OK")
{
	if ($_POST["login"] !== "" && $_POST["olpw"] !== "" && $_POST["newpw"] !== "")
	{
		$login = $_POST["login"];	
		$i = 0;
		if (file_exists("../private/passwd"))
		{
			
			$data = unserialize(file_get_contents("../private/passwd"));
			foreach ($data as $acc)
			{
				if ($acc["login"] == $login)
					break ;
				$i++;
			}
		}
		else
			exit_();
		
		if ($acc["login"] !== $login)
			exit_();	
		$oldhashedpwd = hash('Whirlpool', $_POST["oldpw"]);
		if ($oldhashedpwd != $acc["passwd"])
			exit_();

		$newhashedpwd = hash('Whirlpool', $_POST["newpw"]);
		$acc["passwd"] = $newhashedpwd;
		
		file_put_contents("../private/passwd", serialize($data));
		echo "OK\n";		
	}
	else
		exit_();
}
else
	exit_();
?>
