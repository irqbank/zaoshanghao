
<div class="container">
<div class="panel panel-success">
<div class="panel-heading">
<?php
	if (isset($_SESSION["range"]))
		echo "<h1>View sellers within your search range <small>" . htmlentities($_SESSION["range"], ENT_QUOTES | ENT_HTML5) . " kilometers</small></h1>\n";
	else
		echo "<h1>View all sellers</h1>\n";
?>
</div>
<div class="panel-body">

