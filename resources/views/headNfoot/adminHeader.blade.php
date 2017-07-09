<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Online<span>Grocery</span>Store</a>
				<ul class="user-menu" style="display: -webkit-box !important;">
					<li class="dropdown" onclick="markNotificationAsRead()">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<span class="glyphicon glyphicon-globe"></span>Notifications<span class="badge">{{Session::has('user') ? count(Session::get('user')->unreadNotifications) : '0'}}</span></a>
						<ul class="dropdown-menu" role="menu">
							@forelse (Session::get('user')->unreadNotifications as $notification)
							    <li>{{ $notification->type }}</li>
							@empty
							    <li>No Unread Notifications</li>
							@endforelse
						</ul>
					</li> 
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin:5%; ">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Jason_Momoa_Supercon_2014.jpg/170px-Jason_Momoa_Supercon_2014.jpg" class="img-rounded" alt="Cinque Terre" width="30" height="30"> {{ Session::has('user') ? Session::get('user')->name : 'Error' }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="{{ route('logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<a href="{{ route('product.index') }}"><img style="width:90%;margin-bottom: 10%;" src="{{URL::asset('public/images/logo.png')}}"></a>
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{ route('home') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="parent ">
				<a href="{{ route('prod.view') }}">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Products 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="{{ route('prod.add') }}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Product
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
		<div class="attribution"><a href="#">OGS</a></div>
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
