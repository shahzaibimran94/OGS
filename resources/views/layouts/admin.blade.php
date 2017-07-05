<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>

<link href="{{URL::asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/css/styles.css')}}" rel="stylesheet">
<link href="{{URL::asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
<!--Icons-->
<script type="text/javascript" src="{{URL::asset('public/js/lumino.glyphs.js')}}"></script>


</head>

<body>

@include('headNfoot.adminHeader')

	@yield('content')
	
	</div>	<!--/.main-->
	
	<script type="text/javascript" src="{{URL::asset('public/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/js/bootstrap-datepicker.js')}}"></script>

@yield('scripts')

</body>
</html>
