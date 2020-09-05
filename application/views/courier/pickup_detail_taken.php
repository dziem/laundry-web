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
					<a href="<?= site_url('MainCourier/index') ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
					<a class="brand-logo center">Pickup Order Detail</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Pickup Info</p>
						</div>
						<div class="item-main">
							<p>
								<span class="bold left">Customer Name</span>
								<span class="right">Name</span>
							</p>
							<p>
								<span class="bold left">Phone Number</span>
								<span class="right">Phone</span>
							</p>
							<p>
								<span class="bold left">Delivery Date</span>
								<span class="right">Date</span>
							</p>
							<p>
								<span class="bold left">Delivery Time</span>
								<span class="right">Time</span>
							</p>
						</div>
					</div>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Pickup address</p>
						</div>
						<div class="item-main">
							<p>Address</p>
						</div>
					</div>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Pickup note</p>
						</div>
						<div class="item-main">
							<p>Note</p>
						</div>
					</div>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Price</p>
						</div>
						<div class="item-main">
							<form action="<?= site_url('MainCourier/pickup_done') ?>" method="post">
							<div class="row valign-wrapper">
								<div class="col s10">
									<p class="bold">Weight (kg)</p>
								</div>
								<div class="input-field col s2">
									<input id="weight" type="number" name="weight" class="validate" placeholder="weight" required>
								</div>
							</div>
							<p>
								<span class="bold left">Service Type</span>
								<span class="right">Price <small>(price/kg)</small></span>
							</p>
							<p>
								<span class="bold left">Time</span>
								<span class="right">Price <small>(price/kg)</small></span>
							</p>
							<div class="total-line right"></div>
							<p class="big">
								<span class="bold left">Grand Total</span>
								<span class="right">Total Price</span>
							</p>
							<span class="paid">
								<input type="checkbox" id="paid" />
								<label for="paid">Paid</label>
							</span>
						</div>
					</div>
				</div>
				<button type="submit" class="waves-effect waves-light btn-large btn-order">Done</button>
				</form>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	</body>
</html>