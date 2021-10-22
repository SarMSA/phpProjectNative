<!-- start navbar -->
<section class="nav-bar">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand font-italic font-weight-bold text-uppercase" href="#"><img src="<?php echo hurl('images/Pearl_Shell_Pink_logo-removebg-preview.png')?>" alt="logo"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="brand-span"><i class="fas fa-ellipsis-v"></i></span>
					</button>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?php echo $home??NULL;?>">
						<a class="nav-link" href="<?php echo hurl('index.php')?>">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item <?php echo $shopping??NULL;?>">
						<a class="nav-link" href="<?php echo hurl('shopping.php')?>">Shopping</a>
						</li>
						<li class="nav-item <?php echo $signIn??NULL;?>">
							<?php if (!isset($_SESSION['user']) and !isset($_SESSION['admin'])) {?>
								<span class="nav-link" id="button-signIn">Sign In <i class="fas fa-user"></i></span>
							<?php }elseif (isset($_SESSION['user']) and !isset($_SESSION['admin'])) {?>
								<a class="nav-link" href="<?php echo hurl('user/index.php')?>">My account <i class="fas fa-user-circle" style="font-size: 1.3rem;"></i></a>
							<?php }elseif (!isset($_SESSION['user']) and isset($_SESSION['admin'])) { ?>
								<a class="nav-link" href="<?php echo hurl('admin/index.php')?>">ADMIN <i class="fas fa-user-cog"></i></a>
							<?php }?>
						</li>
						<li class="nav-item <?php echo $cert??NULL;?>" style=" <?php if (isset($_SESSION['admin'])){echo 'display: none;';} ?>">
							<a class="nav-link" href="cart.php">Cert <i class="fas fa-shopping-cart"></i></a>
						</li>
					</div>
				</nav>
			</div>
		</section>
	<!-- end navbar -->