<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Laundry Customer App</title>
	</head>
	
	<body>
		<div class="container">
			<nav class="teal lighten-2">
				<div class="nav-wrapper">
					<a href="<?= site_url('MainCustomer/index'); ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
					<a class="brand-logo center">Schedule Delivery</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<form class="col s12" action="<?= site_url('MainCustomer/schedule_action') ?>" method="post">
						<input type="hidden" name="orderID" value="<?= $orderID ?>">
						<div class="row">
							<div class="input-field col s12">
								<input id="date" type="text" name="date" class="datepicker" required>
								<label for="date">Order Pickup Date</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="time" type="text" name="time" class="timepicker" required>
								<label for="time">Order Pickup Date</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="address" name="address" class="materialize-textarea" required></textarea>
								<label for="address">Address</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="note" name="note" class="materialize-textarea"></textarea>
								<label for="note">Note (optional)</label>
							</div>
						</div>
						<button type="submit" class="waves-effect waves-light btn-large btn-submit">Schedule Delivery</button>
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