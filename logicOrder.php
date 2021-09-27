<?php 
$style = "shopping";
$user = "loading";
require_once './helpers/init.php';
if (isset($_SESSION['user']) or isset($_SESSION['admin'])){
        $orderID = returnPositiveInt(sanitize($_GET['id'], 1)) ?? null;

        $error = [];
        // validate id ....
        if (!validate($orderID, 'intVal')) {
            $error['id'] = 'Invalid integer';
        }

        if (count($error) == 0) {

            $sqlorder = "SELECT * FROM orders WHERE id = $orderID";
            $oporder = mysqli_query($conn, $sqlorder);
            $dataorder = mysqli_fetch_assoc($oporder);
            $orderDate = $dataorder['date'];
            $orderstatus = $dataorder['status'];

            $sql = "SELECT order_item.product_id , order_item.quantity, products.name, products.img, products.price, products.discount
                    FROM order_item 
                    JOIN products
                    ON order_item.product_id = products.id
                    WHERE order_item.order_id = $orderID";
            $op = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
            // select the total price 
            $sqlprice = "SELECT order_item.product_id , order_item.quantity, products.name, products.img, SUM(products.price - (products.price *(products.discount/100))) as totalprice
                        FROM order_item 
                        JOIN products
                        ON order_item.product_id = products.id
                        WHERE order_item.order_id = $orderID ";
            $oprice = mysqli_query($conn, $sqlprice);
            $dataprice = mysqli_fetch_assoc($oprice);
        }else{
            echo "error";
        }

    }?> 
<div class="container shopping">
        <!-- category -->
        <form action="paypal/charge.php" method="post">
         <div class="category py-4">
            <!-- category heading -->
            <div class="cat-heading mb-3">
                <table width="100%" height="150">
                    <tr>
                        <td><h3>Order number:</h3></td>
                        <td><h3><?php echo $orderID?></h3></td>

                    </tr>
                    <tr>
                        <td><h3>order Date:</h3></td>
                        <td><h3><?php echo $dataorder['date']?></h3></td>
                    </tr>
                    <tr>
                        <td><h3>order status:</h3></td>
                        <td><h3 class="text-success"><?php echo $dataorder['status']?></h3></td>
                    </tr>
                    <tr>
                        <td><h3>Order Total Price:</h3></td>
                        <td><h3 class="text-info"><?php echo round( $dataprice['totalprice'], 2)?> EGP</h3></td>
                        <input type="hidden" name="amount" value="<?php echo round( $dataprice['totalprice'], 2)?>" />
                    </tr>
                </table>
            </div>
            <!-- category box... -->
            <div class="cat-box">
                <div class="row flex-wrap">
                    
            <?php while($data = mysqli_fetch_assoc($op)){

                $discountPrice = $data['price'] * ($data['discount'] / 100);
                $totalPrice = $data['price'] - $discountPrice;
            ?>
                    <!-- category products... -->
                    <div class="col-6 col-lg-4 col-xl-3 mb-4">
                        <figure class="card border-0">
                            <div class="image">
                                <img src="<?php echo url('product/uploads/').$data['img']?>" alt="image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['name']?></h5>
                                <?php if ($data['discount'] != 0) {?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $totalPrice ?></span></h4>
                                <p class="card-text"><span class="text-uppercase">egp <?php echo $data['price']?> </span><span class="green font-weight-bold"> <?php echo $data['discount']?>% off</span></p>

                                <?php }else{?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $data['price'] ?></span></h4>
                                <?php }?>
                            </div>
                        </figure>
                    </div>
             <?php }

             ?>
                </div>
                <div>
                    <?if ($dataorder['status'] == 'inaction') {?>
                    <a href="submitOrder.php?id= <?php echo $orderID ?>" class="btn btn-jewely btn-lg btn-block">Submit your Orders</a>

                    <?php }elseif ($dataorder['status'] == 'action') {?>
                        <div class="alert alert-primary">
                            waiting for acception 
                            <div class="loader">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    <?php }elseif ($dataorder['status'] == 'accepted') {?>
                        
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Pay Now">
                    <?php }?>
                </div>
            </div>
        </div>
        </form>
    </div>
<?php require_once 'helpers/footer.php';?>
