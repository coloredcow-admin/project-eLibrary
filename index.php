<!DOCTYPE html>
<html class="h-100 w-100 m-0 p-0" style="scroll-behavior: smooth;">
<head>
	<title>eLibrary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="https://coloredcow.com/wp-content/uploads/2017/03/favicon.png" sizes="32x32">
	<link rel="stylesheet" href="resources/css/custom_css_properties.css">
	<?php 
	require __dir__.'/resources/bootstrap/bootstrap4_css.php';
	?> 
</head>
<body class="h-100 w-100 m-0 p-0 bg-cust-light" style="overflow-x:hidden;">
	<button onclick="topFunction()" class='btn btn-outline-dark position-fixed' style="display:none;bottom:100px; right:22px; z-index: 9999999;" id="top" title="Go to top"><i class="fa fa-arrow-alt-circle-up h5 pt-1 m-0"></i></button>
	<?php  
	require 'core/bootstrap.php';
	require __dir__.'/Controllers/auth/checkAuthentication.php';
	require __dir__.'/Views/common/header.view.php';
	$loginURL = $gClient->createAuthUrl();
	require Router::load('routes.php')->direct(Request::uri());
	if((Request::uri()!='') && (Request::uri()!='index') && (Request::uri()!='index.php') && !(isset($_GET['register']))):	
		require __dir__.'/Views/common/footer.view.php';
endif;
require __dir__.'/'.'Views/common/modals.view.php';
?>
<script src="resources/js/tilt.jquery.min.js"></script>
<script type="text/javascript" src='resources/js/custom_js_functions.js'></script>
</body>
</html>

