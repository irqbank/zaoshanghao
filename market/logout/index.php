<?php
        include("../include/header.php");
	include("../include/logout_header.php");

	session_start();
	$_SESSION = array();
	if (ini_get("session.use_cookies"))
	{
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}
	session_destroy();

	echo "<div class=\"alert alert-success\" role=\"alert\">Logout successful, redirecting in 3 seconds...</div>";

	include("../include/logout_footer.php");

	header("Refresh: 3; url=/market/home/");
	exit();
?>
