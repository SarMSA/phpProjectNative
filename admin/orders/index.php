
<?php 
$user = 'shopping';
require_once '../init.php';


$sqluser = "SELECT users.id , users.firstname, users.lastname, orders.id as orderID, orders.date, orders.status
            from users
            join orders
            on users.id = orders.user_id
            WHERE orders.status != 'cancelled'";
// $sqluser = "SELECT * FROM orders";
$opuser = mysqli_query($conn, $sqluser);
// echo mysqli_error($conn);
$numUser = mysqli_num_rows($opuser);
// fetch user ....
?>
    <div id="layoutSidenav_content">     
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                                                
                <?php 
                    printMessages('Display orders');
                ?>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <?php 
                        $i=1;
                        while($userdata = mysqli_fetch_assoc($opuser)){
                            $userID = $userdata['id'];
                            $orderID = $userdata['orderID'];        
                            $sql = "SELECT order_item.product_id, order_item.quantity, products.name, products.price, products.discount
                                    FROM order_item 
                                    JOIN products
                                    ON order_item.product_id = products.id
                                    JOIN orders 
                                    ON orders.id = order_item.order_id
                                    WHERE orders.user_id  = $userID AND orders.id = $orderID
                                    ";
                            $op = mysqli_query($conn, $sql);
                            echo mysqli_error($conn);
                            ?>
                            <!-- category -->
                            <div class="category py-5 border-bottom border-primary">
                                <!-- category heading -->
                                <div class="cat-heading mb-3 d-flex ">
                                    <!-- category name... -->
                                    <div>
                                        <h3><?php echo $userdata['id']?></h3>
                                        <h3>username: <?php echo $userdata['firstname'].' '.$userdata['lastname']?></h3>
                                        <h3>order number: <?php echo $i?></h3>
                                        <h3>order datetime: <span class="text-primary"><?php echo $userdata['date']?></span></h3>
                                        <h3>order status: <span class="text-success"> <?php echo $userdata['status']?></span></h3>
                                        <h3>order total price: <?php echo $i?></h3>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='cancelorder.php?id=<?php echo $orderID;?>' class='btn btn-danger m-r-1em' onclick="return confirm('are you sure to cancel this order?')">cancel</a>
                                        <a href='acceptorder.php?id=<?php echo $orderID;?>' class='btn btn-success m-r-1em' onclick="return confirm('are you sure to accept this order?')">accept</a>
                                    </div>
                                    <!-- category button... -->
                                </div>
                                <!-- category box... -->
                                <div class="cat-box">
                                    <!-- <div class="row "> -->

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>item number</th>
                                                    <th>item name</th>
                                                    <th>quantity</th>
                                                    <th>price</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>item number</th>
                                                    <th>item name</th>
                                                    <th>quantity</th>
                                                    <th>price</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                    $a = 1;
                                                        while($data = mysqli_fetch_assoc($op)){
                                                    $Price = $data['price'] - ($data['price'] *($data['discount'] / 100));
                                                    ?>     
                                                    <tr>
                                                        <td><?php echo $a;?></td>
                                                        <td><?php echo $data['name'];?></td>
                                                        <td><?php echo $data['quantity'];?></td>
                                                        <td><?php echo $Price;?></td>                                                                               
                                                <?php $a++; } ?>        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php $i++; } ?>
                    </div>
                </div>
            </div>
        </main>         
    </div>
</div>
<?php require '../../helpers/footer.php'?>
