<?php
        include("../include/header.php");
	include("../include/logout_header.php");

	echo "<div class=\"alert alert-success\" role=\"alert\">Logout successful, redirecting in 3 seconds...</div>";

	include("../include/logout_footer.php");

	logout();
	header("Refresh: 3; url=/market/home/");
	exit();
?>
