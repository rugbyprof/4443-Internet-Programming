<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Simple Sidebar - Start Bootstrap Template</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/simple-sidebar.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		.navbar-nav > li > a { padding-top: 5px !important; padding-bottom: 5px !important; }
		.navbar { min-height: 28px !important; }
		.navbar-brand { padding-top: 5px; padding-bottom: 10px; padding-left: 10px; }
		.navbar.navbar-default{
			border-right-width: 0px;
			border-top-width: 0px;
			border-left-width: 0px;
			border-bottom-width: 1px;
			margin-bottom: 2px;
			height: 30px;
		}

		.navbar-inner {
			min-height: 0px;
		}

		.navbar-brand,
		.navbar-nav li a {
			line-height: 34px;
			height: 34px;
			padding-top: 0;
		}

		.navbar-default .container-fluid {
			background: #000!important;
		}

		.fa-bars{
			font-size:20px;
		}

		#sidebar-nav{
			margin-top: 32px;
		}
	</style>

</head>

<body>

<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<a href="?content=portal">Assignment Portal </a>
			</li>
			<li>
				<a href="?content=dashboard">Dashboard</a>
			</li>
			<li>
				<a href="?content=shortcuts">Shortcuts</a>
			</li>
			<li>
				<a href="?content=testing">Testing</a>
			</li>
			<li>
				<a href="?content=events">Events</a>
			</li>
			<li>
				<a href="?content=about">About</a>
			</li>
			<li>
				<a href="?content=register">Register</a>
			</li>
			<li>
				<a href="?content=contact">Contact</a>
			</li>
		</ul>
	</div>
	<!-- /#sidebar-wrapper -->

	<!-- Static navbar -->
	<div class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>`
				<a class="navbar-brand" href="#"><i class="fa fa-bars fa-2x" id="menu-toggle" style="font-size: 24px;"></i></a>
			</div>
			<div class="navbar-collapse collapse">

				<ul class="nav navbar-nav navbar-right">
					<li><a href="./">Login</a></li>
					<li><a href="#"><i class="fa fa-home fa-2x" style="font-size: 24px"></i> </a></li>
					<li><a href="#"><i class="fa fa-github fa-2x" style="font-size: 24px"></i></a></li>
					<li><a href="#"><i class="fa fa-cog fa-2x" style="font-size: 24px"></i></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</div>

	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<?php
					switch($_GET['content']){
						case 'register': include("partials/register.php");
							break;
						case 'dashboard': echo"your momma";
							break;
//							    case 'testing': include("partials/forms.php");
//							        break;
						default : include("partials/default.php");
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>

</body>

</html>
