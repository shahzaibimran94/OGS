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
	@if(Session::has('passUpdated'))
	<center>
	<div class="bg-success" style="width:50%;">
		<h1>{{Session::get('passUpdated')}}</h1>
	</div>
	</center>
	@endif
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
									<a id="reset">Forgot Password</a>
								</label>
							</div>
							<input type="submit" name="Login" value="Login" class="btn btn-primary">
					</fieldset>
				</form>
				<div class="resetBox">
					<br>
					<center><h3>Reset Your Password</h3></center>
					<form method="POST" action="{{ route('paswrd.reset')}}">
						{{ csrf_field() }}
						<input class="form-control" placeholder="Email" name="email" type="email" required>
						<input type="Submit" name="Submit">
					</form>
				</div>
				@if(Session::has('ee'))
					@if(Session::get('ee') == 'Email not Exist')
						<p>Email not Exist</p>	
					@endif
					@if(Session::get('ee') == 'true')
					<div>
					<br>
					<center><h3>Enter new Password</h3></center>
					<form method="POST" action="{{ route('reset')}}">
						{{ csrf_field() }}
						<input type="hidden" name="email" value='{{Session::get("email")}}'>
						<input class="form-control" placeholder="********" name="password" type="password" required>
						<input type="Submit" name="Submit">
					</form>
					</div>
					@endif
				@endif
			</div>
		</center>
	</div>
	
	<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        	$(".resetBox").css("display", "none");
		});
		$('#reset').on("click", function(){
			$(".resetBox").css("display", "block");
		});
	</script>
</body>
</html>	
	
	
