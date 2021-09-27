<?php require_once '../init.php';
// fetch user ....
$sql = "SELECT users.*, user_detail.governorate, user_detail.city, user_detail.extra_data, user_detail.phone, role.title
        FROM users 
        LEFT JOIN user_detail
        ON users.detail_id = user_detail.id
        LEFT JOIN role
        ON users.role_id = role.id 
        ";
$op = mysqli_query($conn, $sql);
?>
    <div id="layoutSidenav_content">     
        <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                                            
            <?php 
                printMessages('Display users');
            ?>
        </ol>
            <a href="create.php" class="btn btn-jewely mb-4 font-weight-bold text-capitalize">create new user</a>
            <div class="card mb-4">
                
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
<?php require '../../helpers/footer.php'?>
