<?php require_once '../init.php';
// fetch user ....
$sql = "SELECT products.*, category.title
        FROM products 
        LEFT JOIN category
        ON products.category_id = category.id
        ORDER BY products.id DESC
        ";
$op = mysqli_query($conn, $sql);
?>
    <div id="layoutSidenav_content">     
        <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                                            
            <?php 
                printMessages('Display products');
            ?>
        </ol>
            <a href="create.php" class="btn btn-jewely mb-4 font-weight-bold text-capitalize">create new product</a>
            <div class="card mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>image</th>
                                    <th>description</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>discount</th>
                                    <th>category title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>image</th>
                                    <th>description</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>discount</th>
                                    <th>category title</th>
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
                                        <td><?php echo $data['name'];?></td>
                                        <td>
                                            <img style="width: 200px; height: 150px" src="./uploads/<?php echo $data['img'];?>" alt="product image">
                                        </td>
                                        <td><?php echo $data['description'];?></td>
                                        <td><?php if (!empty($data['quantity'])){echo $data['quantity'];}else{echo '-';}?></td>
                                        <td><?php echo $data['price'];?> EGP</td>
                                        <td><?php if (!empty($data['discount'])){echo $data['discount'];}else{echo '0';}?> %</td>
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
