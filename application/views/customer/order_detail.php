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
					<a href="<?= site_url('MainCustomer/index') ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
					<a class="brand-logo center">Order #<?= $detail[0]->orderID ?> Detail</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<div class="col s12">
						<div class="detail-top center-align">
							<h4><?= $detail[0]->status ?></h4>
							<div class="order-status active">
								<p class="circle">1</p>
								<p>Picking</p>
							</div>
							<div class="order-status">
								<p class="circle">2</p>
								<p>Washing</p>
							</div>
							<div class="order-status">
								<p class="circle">3</p>
								<p>Drying</p>
							</div>
							<div class="order-status">
								<p class="circle">4</p>
								<p>Ironing</p>
							</div>
							<div class="order-status">
								<p class="circle">5</p>
								<p>Delivering</p>
							</div>
						</div>
					</div>
					<div class="col s12 detail-info">
						<div class="row">
							<div class="col s8">
								<p><?= $detail[0]->stype ?></p>
								<p>
								<?php 
									if($detail[0]->weight == 0){
										echo "Weight haven't set yet";
									}else{
										echo $detail[0]->weight."kg";
									}
								?>
								</p>
							</div>
							<div class="col s4 right-align">
								<p>Total Price</p>
								<h5>
								<?php if($detail[0]->price == 0){
									echo "Price haven't set yet";
								}else{
									echo "Rp".$detail[0]->price;
								}
								?>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</main>
			<?php if($detail[0]->status == 'Ready To Deliver'){ ?>
			<a href="<?= site_url('MainCustomer/schedule_delivery') ?>" class="waves-effect waves-light btn-large btn-order">Schedule Delivery</a>
			<?php }else{ ?>
			<a href="<?= site_url('MainCustomer/schedule_delivery') ?>" class="disabled waves-effect waves-light btn-large btn-order">Schedule Delivery</a>
			<?php } ?>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	</body>
</html>	