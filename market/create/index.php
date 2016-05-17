<?php
	include("../include/pbkdf2.php");
	include("../include/pbkdf2-config.php");
	include("../include/accountmanagement.php");

	function failure ($message)
	{
		$message = htmlentities($message, ENT_QUOTES | ENT_HTML5);
		echo "<div class=\"alert alert-danger\" role=\"alert\">$message, redirecting in 3 seconds...</div>";
		include("../include/create_post_footer.php");
		include("../include/footer.php");
		header("Refresh: 3; url=/market/home/");
		exit();
	}

	include("../include/header.php");

	if ('POST' === $_SERVER['REQUEST_METHOD'])
	{
		include("../include/create_post_header.php");

		if (! isset($_POST["username"]) || ! isset($_POST["password"]) || ! isset($_POST["location"]) || ! isset($_POST["lat"]) || ! isset($_POST["lng"]))
			failure("Error: missing inputs");

		$username      = $_POST["username"];
		$password      = $_POST["password"];
		$dob           = $_POST["dob"];
		$hidedob       = $_POST["hidedob"];
		$interests     = $_POST["interests"];
		$hideinterests = $_POST["hideinterests"];
		$location      = $_POST["location"];
		$range         = $_POST["range"];
		$lat           = $_POST["lat"];
		$lng           = $_POST["lng"];

		if ("" == $location || "" == $password || "" == location || "" == lat || "" == lng)
			failure("Error: missing inputs");

		if (accountexists($username))
			failure("Account already exists: $username");

		// to do: generate secure random salts
		$account = array($username => array(
			'password'      => compat_pbkdf2($pbkdf2_hash_function, $password, 'salt', $pbkdf2_rounds, $pbkdf2_hash_length),
			'dob'           => $dob,
			'hidedob'       => $hidedob,
			'interests'     => $interests,
			'hideinterests' => $hideinterests,
			'location'      => $location,
			'range'         => $range,
			'lat'           => $lat,
			'lng'           => $lng
		));

		storeaccount($account);

		$username = htmlentities($username, ENT_QUOTES | ENT_HTML5);
		echo "<div class=\"alert alert-success\" role=\"alert\">Account successfully created: $username, redirecting in 3 seconds...</div>";
		include("../include/create_post_footer.php");
		header("Refresh: 3; url=/market/home/");
		exit();
	}
	else
	{
		include("../include/create_get_header.php");
		include("../include/create_get_body.php");
		include("../include/create_get_footer.php");
	}

	include("../include/footer.php");
?>
