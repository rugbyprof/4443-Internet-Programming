<h1>Register for Portal</h1>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
			<legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
			<form action="#" method="post" class="form" role="form">
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input class="form-control" name="firstname" placeholder="First Name" type="text"
						       required autofocus />
					</div>
					<div class="col-xs-6 col-md-6">
						<input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
					</div>
				</div>
				<input class="form-control" name="youremail" placeholder="Your Email" type="email" />
				<input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
				<input class="form-control" name="password" placeholder="New Password" type="password" />
				<label for="">
					Birth Date</label>
				<div class="row">
					<div class="col-xs-4 col-md-4">
						<select class="form-control">
							<option value="Month">Month</option>
						</select>
					</div>
					<div class="col-xs-4 col-md-4">
						<select class="form-control">
							<option value="Day">Day</option>
						</select>
					</div>
					<div class="col-xs-4 col-md-4">
						<select class="form-control">
							<option value="Year">Year</option>
						</select>
					</div>
				</div>
				<label class="radio-inline">
					<input type="radio" name="sex" id="inlineCheckbox1" value="male" />
					Male
				</label>
				<label class="radio-inline">
					<input type="radio" name="sex" id="inlineCheckbox2" value="female" />
					Female
				</label>
				<br />
				<br />
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign up</button>
			</form>
		</div>
	</div>
</div>