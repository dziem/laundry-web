<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Laundry Courier App</title>
	</head>
	
	<body>
		<div class="container with-padding">
			<nav class="teal lighten-2">
				<div class="nav-wrapper">
					<i class="fa fa-bars fa-3x"></i>
					<a class="brand-logo center">My Delivery</a>
				</div>
			</nav>
			<main>
				<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
					<li class="tab"><a class="active" href="#request">Request</a></li>
					<li class="tab"><a href="#my-request">My Delivery</a></li>
				</ul>
				<div class="row" id="request">
					<?php if(empty($request)){
						echo "<h4 class='center-align'>Currently there is no new request</h4>";
					}else{
						foreach($request as $row){?>
						<div class="col s12 item delive">
							<?php if($row->type == 'pickup'){ ?>
							<a href="<?= site_url('MainCourier/pickup_detail/'.$row->requestID) ?>" class="box-link"></a>
							<h5>Laundry Pickup</h5>
							<h6><?= $row->date ?>, <?= $row->time ?></h6>
							<h6><?= $row->address ?></h6>
							<a href="<?= site_url('MainCourier/pickup_detail/'.$row->requestID) ?>" class="waves-effect waves-light btn btn-take">See Detail</a>
							<?php }else{ ?>
							<a href="<?= site_url('MainCourier/delivery_detail/'.$row->requestID) ?>" class="box-link"></a>
							<h5>Laundry Delivery</h5>
							<h6><?= $row->date ?>, <?= $row->time ?></h6>
							<h6><?= $row->address ?></h6>
							<a href="<?= site_url('MainCourier/delivery_detail/'.$row->requestID) ?>" class="waves-effect waves-light btn btn-take">See Detail</a>
							<?php } ?>
						</div>
					<?php }
					}?>
				</div>
				<div class="row" id="my-request">
					<?php if(empty($myRequest)){
						echo "<h4 class='center-align'>You haven't do any pickup/delivery yet</h4>";
					}else{
						foreach($myRequest as $row){?>
						<div class="col s12 item delive">
							<?php if($row->type == 'pickup'){ ?>
							<a href="<?= site_url('MainCourier/pickup_detail/'.$row->requestID) ?>" class="box-link"></a>
							<h5>Laundry Pickup</h5>
							<h6><?= $row->date ?>, <?= $row->time ?></h6>
							<h6><?= $row->address ?></h6>
							<a href="<?= site_url('MainCourier/pickup_detail/'.$row->requestID) ?>" class="waves-effect waves-light btn btn-take">See Detail</a>
							<?php }else{ ?>
							<a href="<?= site_url('MainCourier/delivery_detail/'.$row->requestID) ?>" class="box-link"></a>
							<h5>Laundry Delivery</h5>
							<h6><?= $row->date ?>, <?= $row->time ?></h6>
							<h6><?= $row->address ?></h6>
							<a href="<?= site_url('MainCourier/delivery_detail/'.$row->requestID) ?>" class="waves-effect waves-light btn btn-take">See Detail</a>
							<?php } ?>
						</div>
					<?php }
					}?>
				</div>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	</body>
</html>