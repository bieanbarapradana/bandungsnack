
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Order Tracking </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Le styles -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
		<link href="<?=base_url('assets/notif/js/biru.min.css');?>" rel="stylesheet">
		
		
		<style type="text/css">		body {
				padding-top: 20px;
				padding-bottom: 40px;
			
				
			}
			/* Custom container */
			.container-narrow {
				margin: 0 auto;
				max-width: 800px;
			}
			.container-narrow > hr {
				margin: 30px 0;
			}
			/* Main marketing message and sign up button */
			.jumbotron {
				margin: 60px 0;
				text-align: center;
			}
			.jumbotron h1 {
				font-size: 72px;
				line-height: 1;
			}
			.jumbotron .btn {
				font-size: 21px;
				padding: 14px 24px;
			}
			/* Supporting marketing content */
			.marketing {
				margin: 60px 0;
			}
			.marketing p + h4 {
				margin-top: 28px;
			}
			label.error{
				color:red;
			}
</style>

	</head>
	<body>
		<div class="container-narrow">
		<div class="logo">
		<center><img src="<?=base_url('assets/front-end/images/bandungsnack.png');?>" style="width:50%; height:25%"></center>
		</div>
			<div class="masthead">
				<ul class="nav nav-pills pull-right">
					
					
					
				</ul>
				<center><h2 class="muted">Lacak Pesanan Anda</h2></center>
			</div>
			
			<hr>
			<div class="well" style="width: 100%">
				<?php
				 include ('form.php');
				?>
			</div>
			
			<hr>
			
			<div class="footer">
	
				<p style="text-align: center">
					&copy; www.bandungsnack.com <?=date('Y')?>
				</p>
			</div>
		</div>
		
		

	</body>
</html>
