<?php
	function login($username, $lat, $lng, $range)
	{
		// to do: implement session idle timeout and maximum session duration
		$_SESSION["username"] = $username;
		$_SESSION["lat"]      = $lat;
		$_SESSION["lng"]      = $lng;
		$_SESSION["range"]    = $range;
	}

	function logout()
	{
		unset($_SESSION["username"]);
		unset($_SESSION["lat"]);
		unset($_SESSION["lng"]);
		unset($_SESSION["range"]);
	}

	function sessionActive()
	{
		return isset($_SESSION["username"]);
	}
?>
