<?php
if ($_SERVER['PHP_AUTH_USER'] == "zaz"
	&& $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
	{
		$img = file_get_contents("../img/42.png");
		echo "<html><body>
		Hello Zaz
		<br />
		<img src='data:image/jpeg;base64,".base64_encode($img)."
		'</body></html>";
	}
else
	{
		header("HTTP/1.0 401 Unautorized");
		header('WWW-Authenticate: Basic realm=\'\'Member Area\'\'');
		echo "<html><body>
		That area is accessible for members only
		</body></html>";
	}
?>