<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://localhost/phpProject/css/all.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProject/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProject/webfonts/font/stylesheet.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProject/css/<?php echo $style?>.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProject/css/<?php echo $user?>.css" rel="stylesheet" type="text/css">
	<link href="http://localhost/phpProject/css/navbar.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/phpProject/css/main.css">
	<link rel="stylesheet" href="http://localhost/phpProject/css/animate.min.css"/>


	<title>PHP PROJECT</title>
</head>
<body class="sb-nav-fixed">
	<?php if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {
				include_once './signIn.php';
	 			include_once './signUp.php';
	}?>
		