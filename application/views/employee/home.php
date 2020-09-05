<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Laundry Employee App</title>
	</head>
	
	<body>
		<div class="container" style="max-width: 1280px;">
			<h3>Operational Application</h3>
			<?php if(empty($order)){
				echo "<h4>There is no order, for now</h4>";
			}else{ ?>
				
			<table class="stripped highlight centered">
				<thead>
				  <tr>
					  <th>Order ID</th>
					  <th>Service Type</th>
					  <th>Service Time</th>
					  <th>Status</th>
					  <th>Action</th>
				  </tr>
				</thead>

				<tbody>
					<?php foreach($order as $row){ ?>
				  <tr>
					<td><?= $row->orderID ?></td>
					<td><?= $row->stype ?></td>
					<td><?= $row->stime ?></td>
					<td>
					<form action="<?= site_url('MainEmployee/update') ?>" method="post">
						<input type="hidden" name="orderID" value="<?= $row->orderID ?>">
						<div class="input-field select-table">
							<select name="status" required>
								<?php if($row->status == 'Picked Up'){ ?>
									<option value="" disabled selected>Picked Up</option>
									<option value="Washing">Washing</option>
								<?php }else if($row->status == 'Washing'){ ?>
									<option value="" disabled selected>Washing</option>
									<option value="Drying">Drying</option>
								<?php }else if($row->status == 'Drying'){ ?>
									<option value="" disabled selected>Drying</option>
									<option value="Ironing">Ironing</option>
								<?php }else if($row->status == 'Ironing'){ ?>
									<option value="" disabled selected>Ironing</option>
									<option value="Ready To Deliver">Ready To Deliver</option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<button type="submit" class="waves-effect waves-light btn">Change Status</button>
					</td>
					</form>
				  </tr>
				  <?php }
			} ?>
				</tbody>
			</table>
			
		</div>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		<script>
			$(document).ready(function(){
				$('select').material_select();
			  });
		</script>
	</body>
</html>