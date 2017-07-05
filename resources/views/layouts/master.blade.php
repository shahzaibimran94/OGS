<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link href="public/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="public/css/ogs.css">
	<link href="https://fonts.googleapis.com/css?family=Chewy|Gloria+Hallelujah|Yellowtail">
	<!--link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"-->
	<style type="text/css">
		.animBody{
			height: 100%;
			background-color: #46c266;
		}
		.animation {
		position: relative;
		display: block;
		width: 220px;
		height: 130px;
		padding: 10px;
		background-color: #46c266;
		padding: 30% 0 0 40%;  
		}
		 
		.dot {
		position: absolute;
		display: inline-block;
		height: 50px;
		width: 50px;
		border-radius: 25px;
		background-color: #2c3e50;
		margin: 0 10px 0 10px;
		bottom: 10px;
		}
		 
		.dot-two {
		margin-left: 85px;
		}
		 
		.dot-three {
		margin-left: 160px;
		}

		@keyframes move {
		0% {
		bottom: 10px;
		}
		50% {
		bottom: 90px;
		}
		100% {
		bottom: 10px;
		}
		}
.dot-one {
animation-name: move;
animation-duration: 1s;
animation-iteration-count: infinite;
animation-timing-function: ease-out;
animation-delay: 0;
}
 
.dot-two {
animation-name: move;
animation-duration: 1s;
animation-iteration-count: infinite;
animation-timing-function: ease-out;
animation-delay: 0.2s;
}
 
.dot-three {
animation-name: move;
animation-duration: 1s;
animation-iteration-count: infinite;
animation-timing-function: ease-out;
animation-delay: 0.4s;
}
	.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url("/ogs/public/images/Preloader_10.gif") center no-repeat #fff;
}
	footer {
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
}
</style>
</head>

<body>
<div class="se-pre-con"></div>
<!--div class="animBody">
	<div class="animation"> 
		<span class="dot dot-one"></span>
		<span class="dot dot-two"></span>
		<span class="dot dot-three"></span>
	</div>
</div-->
@include('headNfoot.header')

    @yield('content')

@include('headNfoot.footer')
	
	<script type="text/javascript" src="public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script-->
	<script type="text/javascript">
	$(window).on('load',function () {
    	$(".se-pre-con").fadeOut("slow");
	});
	</script>

@yield('scripts')

</body>
</html>