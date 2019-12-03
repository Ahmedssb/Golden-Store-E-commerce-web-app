<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <script src="/User/js/jquery.js"></script>
     
     <style>
  /* Style the buttons that are used to open and close the accordion panel */
.accordion10 {
  background-color: #FFF;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active10, .accordion10:hover {
  background-color: #FFF ;
}

/* Style the accordion panel. Note: hidden by default */
.panel10 {
 padding: 0 18px;
  background-color:#FFF;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
    
.accordion10:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active10:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}
</style> 
  
    
    <link href="/User/css/bootstrap.min.css" rel="stylesheet">
    <link href="/User/css/font-awesome.min.css" rel="stylesheet">
    <link href="/User/css/prettyPhoto.css" rel="stylesheet">
    <link href="/User/css/price-range.css" rel="stylesheet">
    <link href="/User/css/animate.css" rel="stylesheet">
	<link href="/User/css/main.css" rel="stylesheet">
	<link href="/User/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="/User/css/easyzoom.css" />
  <link rel="stylesheet" href="/User/css/passtrength.css" />

  

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
	

  
  
	<script src="/User/js/bootstrap.min.js"></script>
	<script src="/User/js/jquery.scrollUp.min.js"></script>
	<script src="/User/js/price-range.js"></script>
  <script src="/User/js/jquery.prettyPhoto.js"></script>
  <script src="/User/js/easyzoom.js"></script>
  <script src="/User/js/main.js"></script>
  <script src="/User/js/jquery.validate.js"></script>
  <script src="/User/js/passtrength.js"></script>


</body>
</html>