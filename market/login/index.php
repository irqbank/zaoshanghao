<?php
        include("../include/pbkdf2.php");
	include("../include/pbkdf2-config.php");
        include("../include/accountmanagement.php");

        function failure ($message)
        {
		$message = htmlentities($message, ENT_QUOTES | ENT_HTML5);
                echo "<div class=\"alert alert-danger\" role=\"alert\">$message, redirecting in 3 seconds...</div>";
                include("../include/login_footer.php");
                include("../include/footer.php");
		header("Refresh: 3; url=/market/home/");
                exit();
        }

        include("../include/header.php");

        if ('POST' === $_SERVER['REQUEST_METHOD'])
        {
		include("../include/login_header.php");

		if (! isset($_POST["loginusername"]) || ! isset($_POST["loginpassword"]))
                        failure("Error: missing inputs");

		$username = $_POST["loginusername"];
		$password = $_POST["loginpassword"];

		// constant time implementation to avoid timing attacks: compute pbkdf2 first
		// to do: generate secure random salts
		$pwdhash = compat_pbkdf2($pbkdf2_hash_function, $password, 'salt', $pbkdf2_rounds, $pbkdf2_hash_length);

		if (! accountexists($username))
			failure("Logon failed");

		$account = getaccount($username);
		if ($pwdhash != $account["password"])
			failure("Logon failed");

                echo "<div class=\"alert alert-success\" role=\"alert\">Login successful, redirecting in 3 seconds...</div>";

		include("../include/login_footer.php");
                include("../include/footer.php");

		login($username, $account["lat"], $account["lng"], $account["range"]);
		header("Refresh: 3; url=/market/home/");
		exit();
	}
	else
	{
		header("Location: /market/home/");
		exit();
	}
?>
