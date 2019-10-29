<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/User/css/bootstrap.min.css" rel="stylesheet">
    <link href="/User/css/font-awesome.min.css" rel="stylesheet">
    <link href="/User/css/prettyPhoto.css" rel="stylesheet">
    <link href="/User/css/price-range.css" rel="stylesheet">
    <link href="/User/css/animate.css" rel="stylesheet">
	<link href="/User/css/main.css" rel="stylesheet">
	<link href="/User/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/User/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/User/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/User/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/User/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/User/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	
		@include('Layouts.User.User_header')
	
	<section>
		<div class="container">
			<div class="row">
            @yield('content')
			</div>
		</div>
	</section>
	
	@include('Layouts.User.User_footer')
	

  
    <script src="/User/js/jquery.js"></script>
	<script src="/User/js/bootstrap.min.js"></script>
	<script src="/User/js/jquery.scrollUp.min.js"></script>
	<script src="/User/js/price-range.js"></script>
    <script src="/User/js/jquery.prettyPhoto.js"></script>
    <script src="/User/js/main.js"></script>
</body>
</html>