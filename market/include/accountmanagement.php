<?php
	// to do: fix performance issues and race conditions

	function initialize()
	{
		$accountsfile = "/tmp/accounts";

		$size = filesize($accountsfile);
		if (FALSE == $size || 0 == $size)
			$_SESSION["accounts"] = array();

		$_SESSION["accounts"] = unserialize(file_get_contents($accountsfile));
	}

	function accountexists($username)
	{
		if (! isset($_SESSION["accounts"]))
			initialize();

		$accounts = $_SESSION["accounts"];
		return array_key_exists($username, $accounts);
	}

	function getaccount($username)
	{
		if (! isset($_SESSION["accounts"]))
			initialize();

		$accounts = $_SESSION["accounts"];
		if (array_key_exists($username, $accounts))
			return $accounts[$username];
		else
			return false;
	}

	function getallaccounts()
	{
		if (! isset($_SESSION["accounts"]))
			initialize();

		return $_SESSION["accounts"];
	}

	// to do: enforce precondition that accountexists returns false
	function storeaccount($newaccount)
	{
		if (! isset($_SESSION["accounts"]))
			initialize();

		$_SESSION["accounts"] = array_merge($_SESSION["accounts"], $newaccount);
	}

	function distance($lat1, $lon1, $lat2, $lon2)
	{
		return  60 * 1.1515 * 1.609344 * rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1-$lon2))));
	}
?>
