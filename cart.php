<?php 
$style = "cart";
$cert ="active";
require_once './helpers/init.php';

// fetch cart 
if (isset($_SESSION['user']) or isset($_SESSION['admin'])){
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }elseif(isset($_SESSION['admin'])) {

        $id = $_SESSION['admin']['id'];
    }
        $sql = "SELECT * FROM cart WHERE user_id = $id";
        $op  = mysqli_query($conn, $sql);
        $cartNum = mysqli_num_rows($op);



}?>
<section class="cart">
    <div class="text-center" style="<?php if (isset($_SESSION['user']) and $cartNum > 0){ echo 'height: 100%;padding-top: 20px;text-align: left !important;';}?>">
        <?php if (!isset($_SESSION['user'])){?>
           <img src="./images/empty-state-cart.svg" alt="image">
            <!-- code -->
            <h1>login to see your cart</h1>
            <button class="btn btn-jewely" id="cartlogin">login</button>

        <?php }elseif (isset($_SESSION['user']) and $cartNum == 0) {?>
            <img src="./images/empty-state-cart.svg" alt="image">
            <h1>Your shopping cart looks emty</h1>
            <h6>what are you waiting for?</h6>
            <a href="shopping.php" class="text-uppercase btn btn-primary">start shopping</a>
        <?php }elseif (isset($_SESSION['user']) and $cartNum > 0){
                while ($data = mysqli_fetch_assoc($op)) {
                $productID = $data['product_id'];
                $sqlpro = "SELECT products.*, category.title 
                        FROM products 
                        Join category
                        ON products.category_id = category.id
                        WHERE products.id = $productID";
                $oppro = mysqli_query($conn, $sqlpro); 
                    while($datapro = mysqli_fetch_assoc($oppro)){  
                    ?>
                    
                    <figure class="card border-0 d-flex flex-row" >
                        <div class="image" style="height: 230px; ">
                            <img src="<?php echo url('product/uploads/').$datapro['img']?>" style="height: 230px;width:200px" alt="image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $datapro['name']?></h5>
                            <h5 class="card-title"><?php echo $datapro['description']?></h5>
                            <?php if ($datapro['discount'] != 0) {
                                $discountPrice = $datapro['price'] * ($datapro['discount'] / 100);
                                $price =  $datapro['price'] - $discountPrice;
                            }else{
                                $price = $datapro['price'];
                            }
                            
                            ?>
                            <h4 class="card-text font-weight-bold">Quantity <span class="font-weight-bold text-dark"><?php echo $data['order_quantity'] ?></span></h4>
                            <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $price ?></span></h4>
                            <div class="d-flex">
                                <a href='createOrder.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>order</a>
                                <a href='deleteCart.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em ml-auto' onclick="return confirm('Are you sure to delete ?')">Delete</a>

                            </div>
                        </div>
                    </figure>

                <?php }
            }?>
            <!-- code -->
    <?php }?>
    </div>    
</section>
<?php require_once 'helpers/footer.php';?> 