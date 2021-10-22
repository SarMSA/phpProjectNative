<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo hurl('css/all.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo hurl('css/bootstrap.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo hurl('webfonts/font/stylesheet.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo hurl('css/').$style.'.css'?>" rel="stylesheet" type="text/css">
	<link href="<?php echo hurl('css/').$user.'.css'?>" rel="stylesheet" type="text/css">
	<link href="<?php echo hurl('css/navbar.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo hurl('css/main.css')?>">
	<link rel="stylesheet" href="<?php echo hurl('css/animate.min.css')?>"/>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



	<title>PHP PROJECT</title>
</head>
<body class="sb-nav-fixed">
	<?php if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {
				include_once './signIn.php';
	 			include_once './signUp.php';
	}?>
		
