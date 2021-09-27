<?php 
$style = "shopping";
$shopping ="active";
require_once './helpers/init.php';


// fetch categories and products
$sqlcat = "SELECT * From category";
$opcat = mysqli_query($conn, $sqlcat);

?>
<div class="container shopping">
<div class="d-flex">
        <div class="dropdown my-4 ml-auto">
            <a class="btn btn-jewely dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                categories
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="shopping.php">All</a>
                <?php 
                    $categories = [];
                    while($catdata = mysqli_fetch_assoc($opcat)) {
                        $categories[] = $catdata;    
                    ?>
                    <a class="dropdown-item" href="category.php?id=<?php echo $catdata['id']?>"><?php echo $catdata['title']?></a>
                <?php }?>
            </div>
        </div>
</div>
    <?php foreach($categories as $cat) {

            $id = $cat['id']; 
            $sql = "SELECT * FROM products WHERE category_id = $id";
            $op = mysqli_query($conn, $sql);
            ?>
        <!-- category -->
        <div class="category my-4">
            <!-- category heading -->
            <div class="cat-heading mb-3 d-flex justify-content-between align-items-center">
                <!-- category name... -->
                <h1><?php echo $cat['title']?></h1>
                <!-- category button... -->
                <div class="d-flex flex-column">
                    <a href="category.php?id=<?php echo $cat['id']?>" class="btn btn-jewely text-uppercase font-weight-bold">shop now</a>  
                </div>
            </div>
            <!-- category box... -->
            <div class="cat-box">
                <div class="row ">
                <?php while($data = mysqli_fetch_assoc($op)){
                $discountPrice = $data['price'] * ($data['discount'] / 100);
                $totalPrice = $data['price'] - $discountPrice;
                // submit form for quantity...
                ?>
                    <!-- category products... -->
                    <div class="col-6 col-lg-4 col-xl-3 pb-3">
                        <figure class="card border-0">
                            <div class="image">
                                <img src="<?php echo url('product/uploads/').$data['img']?>" alt="image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['name']?></h5>
                                <h5 class="card-title"><?php echo $data['description']?></h5>
                                <?php if ($data['discount'] != 0) {?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $totalPrice ?></span></h4>
                                <p class="card-text"><span class="text-uppercase">egp <?php echo $data['price']?> </span><span class="green font-weight-bold"> <?php echo $data['discount']?>% off</span></p>
                                <?php }else{?>
                                <h4 class="card-text font-weight-bold">EGP <span class="font-weight-bold text-dark"><?php echo $data['price'] ?></span></h4>

                                <?php }?>
                            </div>
                            <?if (isset($_SESSION['user'])) {?>
                            <form method="post" class="d-flex align-items-center px-3 pb-3" action="adding.php?id=<?php echo $data['id']; ?>" enctype="multipart/form-data">
                            <div class="form-group mb-0" style="width: 30%;">
                                <input type="number" name="quantity" class="form-control" id="exampleInputName" aria-describedby="" value="1">
                            </div>
                            <input type="hidden" name = 'page' value="shopping">
                            <button type="submit" class="btn btn-primary ml-auto">Add to Cart</button>
                            </form>
                        <?}?>
                        </figure>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    <?php }?>
</div>

<?php require_once 'helpers/footer.php';?>