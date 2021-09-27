<?php require_once '../init.php';
// fetch roles ....
$sql = "SELECT * FROM category";
$op = mysqli_query($conn, $sql);
?>
    <div id="layoutSidenav_content">     
        <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                                            
            <?php 
                printMessages('Display categories');
            ?>
        </ol>
            <a href="create.php" class="btn btn-jewely mb-4 font-weight-bold text-capitalize">create new category</a>
            <div class="card mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>id</th>
                                    <th>title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>id</th>
                                    <th>title</th>
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
