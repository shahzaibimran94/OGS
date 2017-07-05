<!DOCTYPE html>
<html>
<head>
	<title>OGS-Admin Panel</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/ogs.css">
	<style type="text/css">
		.form-control{
			width: 90%;
		}
		.btn{
			background-color: #46c266;
			border: none;
			width: 40%;
			border-radius: 20px; 
		}
		@media(min-width:0px) and (max-width: 991px)
		{
			.panel{
				margin-top: 10% !important;
			}
		}
	</style>
</head>
<body style="background-color: whitesmoke;">
	<div class="panel panel-default" style="width: 30%;background: white;margin: auto;border-radius: 2%;margin-top: 2%;">
		<br>
		<center>
			<a href="{{route('product.index')}}"><img style="width: 100%;" src="{{ url('public/images/logo.png') }}"></a>
		</center>
		<center><hr style="width: 90%;background-color: #46c266;border: none;height: 1px;"></center>
		<center>
			<div class="loginform form-group">
				<form method="POST" action="{{ route('user.login') }}">
					<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
					<h3 style="color: #46c266;">Login</h3>
					<fieldset>
							<div class="form-group">
								{{ Session::has('unError') ? Session::get('unError') : ''}}
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								{{ Session::has('pError') ? Session::get('pError') : ''}}
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="checkbox">
								<label style="color: #46c266;">
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="Login" value="Login" class="btn btn-primary">
					</fieldset>
				</form>
			</div>
		</center>
	</div>
	
	<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</body>
</html>	
	
	
