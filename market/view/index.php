<?php
	include("../include/header.php");

	if (isset($_GET["user"]) && "" != $_GET["user"])
	{
		$memberusername = $_GET["user"];
		include("../include/view_header_user.php");
		include("../include/view_body_user.php");
	}
	else
	{
		include("../include/view_header_all.php");
		include("../include/view_body_all.php");
	}

	include("../include/view_footer.php");
	include("../include/footer.php");
?>
