<form method="POST" onsubmit="return checkLatLng();" action="#">
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group required">
				<label class="control-label" for="username">Username</label>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input required type="text" class="form-control input-lg" id="username" name="username" autocomplete="off">
				</div>
			</div>
			<div class="form-group required">
				<label class="control-label" for="password">Password</label>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
					<input required type="password" class="form-control input-lg" id="password" name="password" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="dob">Date of birth (yyyy-mm-dd)</label>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					<input type="text" class="form-control input-lg" id="dob" placeholder="1970-01-01" name="dob" autocomplete="off">
				</div>
			</div>
			<div class="form-group">
				<label for="interests">Interests</label>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-thumbs-up"></span></span>
					<input type="text" class="form-control input-lg" id="interests" name="interests" placeholder="vintage books, gadgets, festival tickets" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label>Photo</label>
				<div id="image"><img src="../images/anonymous-icon.jpg" alt="icon"></div>
				<button class="btn btn-xs btn-success" type="button" onclick="alert('Not implemented');">Change image</button>
			</div>
			<div class="form-group">
				<label>Privacy settings</label>
				<div id="privacy">
					<input type="checkbox" id="hideinterests" name="hideinterests"> Hide interests
					<input type="checkbox" id="hidedob" name="hidedob"> Hide date of birth
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group required">
				<label class="control-label">Location and search range</label>
				<div id="map"></div>
				<p></p>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
					<input required type="text" class="form-control input-lg" id="location" name="location" placeholder="Rathausstraße 1, 12105 Berlin, Germany" autocomplete="off">
					<span class="input-group-addon" style="border-left: 0; border-right: 0;"><span class="glyphicon glyphicon-dashboard"></span></span>
					<input required type="text" class="form-control input-lg" id="range" name="range" size="3" value="50" autocomplete="off">
					<span class="input-group-addon" style="border-left: 0; border-right: 0;">kilometers</span>
					<span class="input-group-btn"><button class="btn btn-lg btn-success" type="button" onclick="find()">Set</button></span>
				</div>
				<p class="help-block">To protect your privacy, we do not disclose your exact location to other members.</p>
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="lat" name="lat">
				<input type="hidden" class="form-control" id="lng" name="lng">
			</div>
			<button type="submit" class="btn btn-lg btn-success">Create account</button>
		</div>
	</div>
</form>
