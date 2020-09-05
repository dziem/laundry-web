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
							<form action="<?= site_url('MainCourier/pickup_done') ?>" method="post">
							<div class="row valign-wrapper">
								<div class="col s10">
									<p class="bold">Weight (kg)</p>
								</div>
								<div class="input-field col s2">
									<?php if($detail[0]->rstatus != 'Done'){ ?>
									<input id="weight" type="number" min="1" name="weight" class="validate" placeholder="weight" required>
									<input type="hidden" id="total" name="total" required>
									<input type="hidden" name="requestID" value="<?= $detail[0]->requestID ?>" required>
									<input type="hidden" name="orderID" value="<?= $detail[0]->orderID ?>" required>
									<?php }else{ ?>
									<span class="right right-align"><?= $detail[0]->weight ?> kg</span>
									<?php } ?>
								</div>
							</div>
							<?php
								if($detail[0]->stype == 'Wash'){
									$type = 4000;
								}else if($detail[0]->stype == 'Wash and Iron'){
									$type = 5000;
								}
								if($detail[0]->stime == 'Regular'){
									$time = 0;
								}else if($detail[0]->stime == 'Fast'){
									$time = 1500;
								}else if($detail[0]->stime == 'Super Fast'){
									$time = 3000;
								}
							?>
							<p>
								<span class="bold left"><?= $detail[0]->stype ?></span>
								<?php if($detail[0]->rstatus != 'Done'){ ?>
								<span class="right" id="ptype">-</span>
								<?php }else{ ?>
								<span class="right" id="ptype">
									<?= $detail[0]->weight * $type ?>
									<small>(<?= $type ?>/kg)</small>
								</span>
								<?php } ?>
							</p>
							<p>
								<span class="bold left"><?= $detail[0]->stime ?></span>
								<?php if($detail[0]->rstatus != 'Done'){ ?>
								<span class="right" id="ptime">-</span>
								<?php }else{ ?>
								<span class="right" id="ptime">
									<?= $detail[0]->weight * $time ?>
									<small>(<?= $time ?>/kg)</small>
								</span>
								<?php } ?>
							</p>
							<div class="total-line right"></div>
							<p class="big">
								<span class="bold left">Grand Total</span>
								<?php if($detail[0]->rstatus != 'Done'){ ?>
								<span class="right" id="ptotal">-</span>
								<?php }else{ ?>
								<span class="right" id="ptotal">
									<?= $detail[0]->weight * ($time + $type) ?>
								</span>
								<?php } ?>
							</p>
							<span class="paid">
								<?php if($detail[0]->rstatus != 'Done'){ ?>
								<input type="checkbox" id="paid" name="paid" value="1" />
								<label for="paid">Paid</label>
								<?php }else{ ?>
									<?php if($detail[0]->payment != 'Paid'){ ?>
									<input type="checkbox" id="paid" name="paid" value="1" disabled="disabled" />
									<label for="paid">Paid</label>
									<?php }else{ ?>
									<input type="checkbox" id="paid" name="paid" value="1" checked="checked" disabled="disabled" />
									<label for="paid">Paid</label>
									<?php } 
								}?>
							</span>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php 
				if($detail[0]->rstatus != 'Done'){
					if($detail[0]->courierID == 0){ ?>
					<a href="<?= site_url('MainCourier/pickup_detail_take/'.$userID.'/'.$detail[0]->requestID) ?>" class="waves-effect waves-light btn-large btn-order">Pick</a>
					<?php }else{ ?>
					<button type="submit" class="waves-effect waves-light btn-large btn-submit">Done</button>
					</form>
					<?php }
				}?>
			</main>
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		<script>
			$( "#weight" ).change(function(){
				var type = <?= $type ?>;
				var time = <?= $time ?>;
				var weight = $( "#weight" ).val();
				var typeTotal = type * weight;
				var timeTotal = time * weight;
				var grandTotal = typeTotal + timeTotal;
				$('#total').val(grandTotal);
				var typeText = "Rp" + typeTotal + " <small>(" + type +"/kg)</small>";
				var timeText = "Rp" + timeTotal + " <small>(" + time +"/kg)</small>";
				var total = "Rp" + grandTotal;
				$('#ptype').html(typeText);
				$('#ptime').html(timeText);
				$('#ptotal').html(total);
			});
		</script>
	</body>
</html>