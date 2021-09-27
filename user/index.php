<?php
$style = 'styles';
require_once '../db/dbConn.php';
require '../helpers/functions.php';
require '../helpers/header.php';
require '../helpers/checkSignInUser.php';
require '../helpers/topNavuser.php';
?>
<div id="layoutSidenav">
<?php require '../helpers/sidNav.php';?>
    <div id="layoutSidenav_content">   
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">orders Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./orders/index.php">View Orders</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">profile Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./profile/index.php">View Profile</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
                
    </div>
</div>
<?php require '../helpers/footer.php'?>