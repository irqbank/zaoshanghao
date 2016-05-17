<!doctype html>
<html>
<head>
	<title>IRQ Bank Marketplace</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
	<h1><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Incoming assignment</h1>
	<p>Agent Z, great job completing <a href="http://nihao-dajia.rhcloud.com/">last</a> <a href="/">two</a> assignments. We are considering nominating you for promotion, but we need your urgent involvement in the following case first.</p>
	<p>IRQ Bank has recently launched a <a href="/market/home/">marketplace</a> service. Since it's an anonymous service, we recently signed up and traded goods on their platform to stay under the radar. One of our trades with a user named anonymous_312 didn't go as planned as we received no payment for goods delivered. Find out in which building user anonymous_312 is located, so we can track him down and teach him a lesson.</p>
</div>
<div class="row">
	<div class="panel panel-success">
	<div class="panel-heading"><h3>Enter the name of the building where user anonymous_312 is located</h3></div>
	<div class="panel-body">
	<form>
		<div class="form-group">
			<div class="input-group input-group-lg">
				<input type="text" class="form-control input-lg" name="location">
				<span class="input-group-btn"><button type="submit" class="btn btn-lg btn-success">Submit</button></span>
			</div>
		</div>
	</form>
	</div>
	</div>
</div>

<?php
	include("include/pbkdf2.php");
	include("include/pbkdf2-config.php");

	// solution checking
	$solution_pbkdf2_hash = "1536cfa09513ba91265b7960469c739e80343fbd227fd59b9f726c7e4f4e8120e09711571b39f939ae8343609ec9cc594551";
	$salt_base64_encoded  = "CRLvC8RxHyY9UQ9XKB0tyA==";

	// flag decryption based on key derived from solution
	$flag_encrypted       = "dKb1RbwxY9DpAx6IvFtUQA==";
	$flag_encryption_alg  = "aes-256-cbc"; // aes-256-gcm is broken in PHP 5.3
	$flag_encrypted_iv    = "ayhwWZ6koflq+mlEl3xQDQ==";
	$flag_key_pbkdf2_salt = "1JDOkyQpTxocSBLEejhwdA==";
	$flag_key_size        = 32;

	if (isset($_GET["location"]))
	{
		$hash = compat_pbkdf2($pbkdf2_hash_function, strtolower(trim($_GET["location"])), base64_decode($salt_base64_encoded), $pbkdf2_rounds, $pbkdf2_hash_length);
		if ($solution_pbkdf2_hash == $hash)
		{
			$key = compat_pbkdf2($pbkdf2_hash_function, strtolower(trim($_GET["location"])), base64_decode($flag_key_pbkdf2_salt), $pbkdf2_rounds, $flag_key_size);
			$flag = openssl_decrypt(base64_decode($flag_encrypted), $flag_encryption_alg, $key, OPENSSL_RAW_DATA, base64_decode($flag_encrypted_iv));
			echo "<div class=\"row\"><div class=\"alert alert-success\" role=\"alert\">Well done! We successfully located the fraudster. The flag is: $flag</div></div>\n";
		}
		else
		{
			echo "<div class=\"row\"><div class=\"alert alert-danger\" role=\"alert\">We found no one there, are you sure you sent us to the right building?</div></div>\n";
		}
	}
?>

</div>
</div>
</div>
</body>
</html>
<!-- Challenge by xn21zh -->
