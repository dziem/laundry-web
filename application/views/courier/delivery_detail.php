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
					<a href="<?= site_url('MainCourier/index') ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
					<a class="brand-logo center">Delivery Order Detail</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Delivery Info</p>
						</div>
						<div class="item-main">
							<p>
								<span class="bold left">Customer Name</span>
								<span class="right"><?= $detail[0]->name ?></span>
							</p>
							<p>
								<span class="bold left">Phone Number</span>
								<span class="right"><?= $detail[0]->phoneNumber ?></span>
							</p>
							<p>
								<span class="bold left">Delivery Date</span>
								<span class="right"><?= $detail[0]->date ?></span>
							</p>
							<p>
								<span class="bold left">Delivery Time</span>
								<span class="right"><?= $detail[0]->time ?></span>
							</p>
							<p>
								<span class="bold left">Service Type</span>
								<span class="right"><?= $detail[0]->stype ?></span>
							</p>
							<p>
								<span class="bold left">Service Time</span>
								<span class="right"><?= $detail[0]->stime ?></span>
							</p>
							<p>
								<span class="bold left">Laundry Weight</span>
								<span class="right"><?= $detail[0]->weight ?> kg</span>
							</p>
						</div>
					</div>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Pickup address</p>
						</div>
						<div class="item-main">
							<p><?= $detail[0]->address ?></p>
						</div>
					</div>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Pickup note</p>
						</div>
						<div class="item-main">
							<p>
							<?php
								if(empty($detail[0]->note)){
									echo "No note from the customer";
								}else{
									echo $detail[0]->note;
								}
							?>
							</p>
						</div>
					</div>
					<?php if($detail[0]->courierID != 0){ ?>
					<div class="col s12 item detail-box">
						<div class="item-header">
							<p>Price</p>
						</div>
						<div class="item-main">
							<p class="big">
								<span class="bold left">Grand Total</span>
								<span class="right"><?= $detail[0]->price ?></span>
							</p>
							<span class="paid">
								<?php if($detail[0]->payment != 'Paid'){ ?>
								<input type="checkbox" id="paid" name="paid" value="1" disabled="disabled" />
								<label for="paid">Paid</label>
								<?php }else{ ?>
								<input type="checkbox" id="paid" name="paid" value="1" checked="checked" disabled="disabled" />
								<label for="paid">Paid</label>
								<?php } ?>
							</span>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php 
				if($detail[0]->rstatus != 'Done'){ 
					if($detail[0]->courierID == 0){ ?>?>
					<a href="<?= site_url('MainCourier/delivery_detail_take/'.$userID.'/'.$detail[0]->requestID) ?>" class="waves-effect waves-light btn-large btn-submit">Deliver</a>
					<?php }else{ ?>
					<a href="<?= site_url('MainCourier/delivery_done/'.$detail[0]->orderID.'/'.$detail[0]->requestID) ?>" class="waves-effect waves-light btn-large btn-submit">Done</a>
				<?php } 
				} ?>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	</body>
</html>