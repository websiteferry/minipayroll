<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOGIN</title>

<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php  echo base_url() ?>assets/image/logo-brand.jpg">


</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<h1><center><b><font color=#fcf8e3>MINI PAYROLL</font></b></center></h1>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><center>SILAHKAN LOGIN</div>
				<div class="panel-body">
					<form action="<?php echo base_url();?>login/login_akses" method="post">
						
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							
							<button type="submit" class="btn btn-primary">Login</button>
						
					</form>
				</div>
			</div>

			<?php echo $this->session->flashdata("msg");?>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
</body>

</html>
