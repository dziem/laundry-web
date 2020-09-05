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
		<div class="container with-padding">
			<nav class="teal lighten-2">
				<div class="nav-wrapper">
					<i class="fa fa-bars fa-3x"></i>
					<a class="brand-logo center">My Order</a>
				</div>
			</nav>
			<main>
				<div class="row">
					<?php if(empty($myorder)){ echo "<h4 class='center-align'>You haven't order anything yet</h4>";}
					else{
						foreach($myorder as $row){ ?>
					<div class="col s12 item">
						<a href="<?= site_url('MainCustomer/order_detail/'.$row->orderID) ?>" class="box-link"></a>
						<div class="item-header">
							<p>Order #<?= $row->orderID ?></p>
						</div>
						<div class="item-main">
							<h5><?= $row->stype ?></h5>
							<h6>
								<?php if($row->price == 0){
									echo "Price haven't set yet";
								}else{
									echo "Rp".$row->price;
								}
								?>
							</h6>
						</div>
						<div class="item-footer">
							<span><?= $row->status ?></span>
							<?php if($row->status == 'Ready To Deliver'){ ?>
							<a href="<?= site_url('MainCustomer/schedule_delivery/'.$row->orderID) ?>" class="waves-effect waves-light btn btn-link right">Schedule Deilivery</a>
							<?php }else{ ?>
							<a href="<?= site_url('MainCustomer/schedule_delivery/'.$row->orderID) ?>" class="disabled waves-effect waves-light btn btn-link right">Schedule Deilivery</a>
							<?php } ?>
						</div>
					</div>
					<?php }
					} ?>
				</div>
				<a href="<?= site_url('MainCustomer/order') ?>" class="waves-effect waves-light btn-large btn-order">Place New Order</a>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
	</body>
</html>