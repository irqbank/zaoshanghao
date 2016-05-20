<?php
	function failure ($message)
	{
		$message = htmlentities($message, ENT_QUOTES | ENT_HTML5);
		echo "<div class=\"alert alert-danger\" role=\"alert\">$message</div>";
		exit();
	}

	if (! accountexists($memberusername))
		failure("Account does not exist: $memberusername");

	$account = getaccount($memberusername);

	$dob           = $account["dob"];
	$interests     = $account["interests"];
	$hidedob       = $account["hidedob"];
	$hideinterests = $account["hideinterests"];
	$lat           = $account["lat"];
	$lng           = $account["lng"];

	$viewingyourself = ( sessionActive() && $_SESSION["username"] == $memberusername );
?>
<div class="row col-xs-12">
	<div>
		<label>Photo</label>
		<div>
			<p><img src="../images/anonymous-icon.jpg" alt="icon"></p>
		</div>
	</div>
	<div>
		<label>Date of birth (yyyy-mm-dd)</label>
		<div>
			<p>
<?php
	if ("on" != $hidedob ||	$viewingyourself)
		echo ($dob == "" ? "<i>Not set</i>" : htmlentities($dob, ENT_QUOTES | ENT_HTML5));
	else
			echo "<i>(Hidden by user)</i>\n";
?>
			</p>
		</div>
	</div>
	<div>
		<label>Interests</label>
		<div>
			<p>
<?php
	if ("on" != $hideinterests || $viewingyourself)
		echo ("" == $interests ? "<i>Not set</i>" : htmlentities($interests, ENT_QUOTES | ENT_HTML5));
	else
		echo "<i>(Hidden by user)</i>\n";
?>
			</p>
		</div>
	</div>
<?php
	if (! $viewingyourself)
	{
?>
	<div>
		<label>Approximate distance</label>
		<div>
			<p>
<?php
		if (sessionActive())
		{
			$activeaccount = getaccount($_SESSION["username"]);
			$yourlat = $activeaccount["lat"];
			$yourlng = $activeaccount["lng"];
?>
			<script type="text/javascript">
				var distance = <?php echo distance($yourlat, $yourlng, $lat, $lng); ?>;
				if (distance < 5)
					document.write("less than 5 kilometers away from you");
				else if (distance < 50)
					document.write("between 5 and 50 kilometers away from you");
				else if (distance < 500)
					document.write("between 50 and 500 kilometers away from you");
				else
					document.write("more than 500 kilometers away from you");
			</script>
<?php
		}
		else
		{
			echo "<i>Unknown (you are not logged in)</i>\n";
		}
?>
			</p>
		</div>
	</div>
<?php
	}
?>
</div>
