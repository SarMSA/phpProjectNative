<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://localhost/phpProjectNative/css/all.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProjectNative/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProjectNative/webfonts/font/stylesheet.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProjectNative/css/<?php echo $style?>.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProjectNative/css/<?php echo $user?>.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProjectNative/css/navbar.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/phpProjectNative/css/main.css">
	<link rel="stylesheet" href="http://localhost/phpProjectNative/css/animate.min.css"/>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



	<title>PHP PROJECT</title>
</head>
<body class="sb-nav-fixed">
	<?php if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {
				include_once './signIn.php';
	 			include_once './signUp.php';
	}?>
		
