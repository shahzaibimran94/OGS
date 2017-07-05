<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="{{ route('product.index') }}">OnlineGroceryStore</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">How It Works</a></li>  
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="fa fa-plus"></span> Sign Up</a></li>
				<li><a href="#"><span class="fa fa-sign-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>