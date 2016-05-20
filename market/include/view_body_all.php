<?php
	$allaccounts = getallaccounts();

	if (false != $allaccounts)
	{
		echo "<ul>\n";
		foreach (array_keys($allaccounts) as $key)
		{
			if (sessionActive())
			{
				$activeaccount = getaccount($_SESSION["username"]);
				if (distance($activeaccount["lat"], $activeaccount["lng"], $allaccounts[$key]["lat"], $allaccounts[$key]["lng"]) > floatval($activeaccount["range"]))
					continue;
			}

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
