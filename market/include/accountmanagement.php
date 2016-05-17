<?php
	// ignore performance and race conditions for now
	$accountsfile = "/tmp/accounts";

	function accountexists($username)
	{
		global $accountsfile;

		$size = filesize($accountsfile);
		if (FALSE == $size || 0 == $size)
			return false;

		$accounts = unserialize(file_get_contents($accountsfile));
		return array_key_exists($username, $accounts);
	}

	function getaccount($username)
	{
		global $accountsfile;

		$size = filesize($accountsfile);
		if (FALSE == $size || 0 == $size)
			return false;

		$accounts = unserialize(file_get_contents($accountsfile));
		if (array_key_exists($username, $accounts))
			return $accounts[$username];
		else
			return false;
	}

	function getallaccounts()
	{
		global $accountsfile;

		$size = filesize($accountsfile);
		if (FALSE == $size || 0 == $size)
			return false;

		return unserialize(file_get_contents($accountsfile));
	}

	// precondition: accountexists returns false
	function storeaccount($newaccount)
	{
		global $accountsfile;

		$accounts = array();
		if (filesize($accountsfile) > 0)
			$accounts = unserialize(file_get_contents($accountsfile));

		$accounts = array_merge($accounts, $newaccount);
		file_put_contents($accountsfile, serialize($accounts));
	}

	function distance($lat1, $lon1, $lat2, $lon2)
	{
		return  60 * 1.1515 * 1.609344 * rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1-$lon2))));
	}
?>
