<?php
function exit_()
{
	echo "ERROR\n";
	die();
}
session_start();
if ($_POST["submit"] == "OK")
{
	if ($_POST["login"] !== "" && $_POST["passwd"] !== "")
	{
		$login = $_POST["login"];		
		@mkdir("../private");
		
		$i = 0;
		if (file_exists("../private/passwd"))
		{
			$data = unserialize(file_get_contents("../private/passwd"));
			foreach ($data as $acc)
			{
				if ($acc["login"] == $login)
					exit_();
				$i++;
			}
		}
		else
			file_put_contents('../private/passwd', null);
		
		$hashedpwd = hash('Whirlpool', $_POST["passwd"]);
		$new_acc["login"] = $login;
		$new_acc["passwd"] = $hashedpwd;
		
		$data[$i + 1] = $new_acc;
		file_put_contents("../private/passwd", serialize($data));
		echo "OK\n";
	}
	else
		exit_();
}
else
	exit_();
?>
