<?php
$style = 'styles';
require_once '../db/dbConn.php';
require '../helpers/functions.php';
require '../helpers/header.php';
require '../helpers/checkSignInAdmin.php';
require '../helpers/topNavuser.php';

$sql = "SELECT users.*, user_detail.governorate, user_detail.city, user_detail.extra_data, user_detail.phone, role.title
        FROM users 
        LEFT JOIN user_detail
        ON users.detail_id = user_detail.id
        LEFT JOIN role
        ON users.role_id = role.id 
        ";
$op = mysqli_query($conn, $sql);
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
                            <div class="card-body">category Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./category/index.php">View category</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">orders Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./orders/index.php">View orders</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">role Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./role/index.php">View role</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">product Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="./product/index.php">View Product</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>id</th>
                                    <th>role</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>governorate</th>
                                    <th>city</th>
                                    <th>extra_data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>id</th>
                                    <th>role</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>governorate</th>
                                    <th>city</th>
                                    <th>extra_data</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    $i = 0;
                                    while($data = mysqli_fetch_assoc($op)){
                                ?>       
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo $data['id'];?></td>
                                        <td><?php echo $data['title'];?></td>
                                        <td><?php echo $data['firstname'].' '.$data['lastname'];?></td>
                                        <td><?php echo $data['email'];?></td>
                                        <td><?php if (!empty($data['phone'])){echo $data['phone'];}else{echo '-';}?></td>
                                        <td><?php if (!empty($data['governorate'])){echo $data['governorate'];}else{echo '-';}?></td>
                                        <td><?php if (!empty($data['city'])){echo $data['city'];}else{echo '-';}?></td>
                                        <td><?php if (!empty($data['extra_data'])){echo $data['extra_data'];}else{echo '-';}?></td>
                                        <td>
                                            <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em' onclick="return confirm('Are you sure to delete ?')">Delete</a>
                                            <a href='update.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Update</a>
                                        </td>                                         
                                    </tr>
                                <?php } ?>        
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
                
    </div>
</div>
<?php require '../helpers/footer.php'?>