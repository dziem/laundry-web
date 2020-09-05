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
		<?php $userID = ($this->session->userdata['logged_in']); ?>
		<div class="container">
			<nav class="teal lighten-2">
				<div class="nav-wrapper">
					<a href="<?= site_url('MainCustomer/index'); ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
					<a class="brand-logo center">Place New Order</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<form class="col s12" action="<?= site_url('MainCustomer/order_action') ?>" method="post">
						<input id="userID" type="hidden" value="<?= $userID ?>" name="order[userID]" class="validate" required>
						<div class="row">
							<div class="input-field col s12">
								<input id="name" type="text" name="order[name]" class="validate" required>
								<label for="name">Customer Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="phone" type="text" name="order[phoneNumber]" class="validate" required>
								<label for="phone">Phone Number</label>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<p>Service Type</p>
								<p>
									<input name="order[stype]" type="radio" id="type1" value="Wash"/>
									<label for="type1">Wash (4000/kg)</label>
								</p>
								<p>
									<input name="order[stype]" type="radio" id="type2" value="Wash and Iron"/>
									<label for="type2">Wash & Iron (5000/kg)</label>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<p>Service Time</p>
								<p>
									<input name="order[stime]" type="radio" id="time1" value="Regular"/>
									<label for="time1">Regular (2 - 3 days) (no charge)</label>
								</p>
								<p>
									<input name="order[stime]" type="radio" id="time2" value="Fast"/>
									<label for="time2">Fast (1 - 2 days) (plus 1500/kg)</label>
								</p>
								<p>
									<input name="order[stime]" type="radio" id="time3" value="Super Fast"/>
									<label for="time3">Super Fast (< 1 days) (plus 3000/kg)</label>
								</p>
							</div>
						</div>
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
						<button type="submit" class="waves-effect waves-light btn-large btn-submit">Place Order</button>
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