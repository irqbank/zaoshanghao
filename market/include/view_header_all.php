
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<?php
	if (sessionActive())
	{
		$activeaccount = getaccount($_SESSION["username"]);
		$range = htmlentities($activeaccount["range"], ENT_QUOTES | ENT_HTML5);
		echo "<h1>View sellers within your search range <small>$range kilometers</small></h1>\n";
	}
	else
	{
		echo "<h1>View all sellers</h1>\n";
	}
?>
</div>
<div class="panel-body">

