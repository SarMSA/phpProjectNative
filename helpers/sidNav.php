<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="<?php echo url('/index.php');?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                    <?php 


                    
                    $moduleAdmin = ['category','product','role','user'];
                    $moduleUser = [];
                    if(isset($_SESSION['admin'])){
                        $modules = $moduleAdmin;
                    }elseif(isset($_SESSION['user'])){
                        $modules = $moduleUser;
                    }

                    foreach ($modules as $key => $value) {


                    ?>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo $key;?>" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    <?php echo $value;?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts<?php echo $key;?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php if (isset($_SESSION['user'])) {echo urlUser($value.'/create.php');}else{echo url($value.'/create.php');}?>">+ Add</a>
                        <a class="nav-link" href="<?php if (isset($_SESSION['user'])) {echo urlUser($value.'/');}else{echo url($value.'/');}?>">Display</a>
                    </nav>
                </div>
                <?php }?>
                <?php  if (isset($_SESSION['user'])) {?>
                    <a class="nav-link" href="<?php echo urlUser('orders/index.php');?>">Orders</a>
                    <a class="nav-link" href="<?php echo urlUser('profile/index.php');?>">Profile</a>
                <?php } elseif (isset($_SESSION['admin'])) {?>
                    <a class="nav-link" href="<?php echo url('orders/index.php');?>">orders</a>
                <?php }?>
            </div>
        </div>
    </nav>
</div>