<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Register</title>
	</head>
	
	<body>
		<div class="container">
			<main>
				<div class="row">
					<form class="col s12 login" action="<?= site_url('main/register_action') ?>" method="post">
						<h4 class="center-align">Register</h4>
						<div class="row">
							<div class="input-field col s12">
								<input id="username" type="text" name="username" class="validate" required>
								<label for="username">Username</label>
							</div>
							<div class="input-field col s12">
								<input id="password" type="password" name="password" class="validate" required>
								<label for="password">Password</label>
							</div>
							<div class="col s12">
								<p>Already have an account? <a href="<?= site_url('main/index') ?>">login here</a></p>
							</div>
						</div>
						<button type="submit" class="waves-effect waves-light btn-large btn-submit">Register</button>
					</form>
				</div>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		<script>
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15, // Creates a dropdown of 15 years to control year,
				today: 'Today',
				clear: 'Clear',
				close: 'Ok',
				closeOnSelect: false // Close upon selecting a date,
			});			
			$('.timepicker').pickatime({
				default: 'now', // Set default time: 'now', '1:30AM', '16:30'
				fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
				twelvehour: false, // Use AM/PM or 24-hour format
				donetext: 'OK', // text for done-button
				cleartext: 'Clear', // text for clear-button
				canceltext: 'Cancel', // Text for cancel-button
				autoclose: false, // automatic close timepicker
				ampmclickable: true, // make AM PM clickable
				aftershow: function(){} //Function for after opening timepicker
			});
		</script>
	</body>
</html>