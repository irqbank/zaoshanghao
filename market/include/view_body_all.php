<?php
	include("accountmanagement.php");

	$allaccounts = getallaccounts();

	if (false != $allaccounts)
	{
		echo "<ul>\n";
		foreach (array_keys($allaccounts) as $key)
		{
			if (sessionActive() && isset($_SESSION["lat"]) && isset($_SESSION["lng"]))
				if (distance($_SESSION["lat"], $_SESSION["lng"], $allaccounts[$key]["lat"], $allaccounts[$key]["lng"]) > floatval($_SESSION["range"]))
					continue;

			$key = htmlentities($key, ENT_QUOTES | ENT_HTML5);
			echo "<li><a href=\"/market/view/?user=$key\">$key</a></li>\n";
		}
		echo "</ul>\n";
	}
	else
	{
		echo "No sellers found";
	}
?>
