
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<?php
	$htmlencodedusername = htmlentities($memberusername, ENT_QUOTES | ENT_HTML5);

	if (sessionActive() && $_SESSION["username"] == $memberusername)
		echo "<h1>View your account ($htmlencodedusername)</h1>\n";
	else
		echo "<h1>View seller $htmlencodedusername</h1>\n";
?>
</div>
<div class="panel-body">

