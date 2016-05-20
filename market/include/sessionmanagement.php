<?php
	function login($username)
	{
		// to do: implement session idle timeout and maximum session duration
		$_SESSION["username"] = $username;
	}

	function logout()
	{
		unset($_SESSION["username"]);
	}

	function sessionActive()
	{
		return isset($_SESSION["username"]);
	}
?>
