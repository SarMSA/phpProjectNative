<?php require_once '../init.php';

// fetch roles ....
$sql = "SELECT * FROM category";
$select_op  = mysqli_query($conn,$sql);
// check request method......
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name      = CleanInputs($_POST['name']);
    $des      = CleanInputs($_POST['des']);
    $price     = CleanInputs($_POST['price']);
    $quantity  = returnPositiveInt(sanitize(CleanInputs($_POST['quantity']), 1));
    $discount  = returnPositiveInt(sanitize(CleanInputs($_POST['discount']), 1));
    $cat_id    = CleanInputs($_POST['cat_id']);

    # FILE INFO ... 
   $imgTmp      = $_FILES['image']['tmp_name'];
   $imgName     = $_FILES['image']['name'];
   $imgSize     = $_FILES['image']['size'];
   $imgType     = $_FILES['image']['type'];

    $errors = [];

    # Validate name... 
    if(!validate($name, 'emptyVal')){
      $errors['name'] = "name : Requierd Field";
    }elseif(!validate($name, 'nameVal')){
        $errors['name'] = "name : Invalid String";
    }
    # Validate name... 
    if(!validate($des, 'emptyVal')){
        $errors['des'] = "description : Requierd Field";
      }elseif(!validate($des, 'nameVal')){
          $errors['des'] = "description : Invalid String";
      }
    # Validate price... 
    if(!validate($price, 'emptyVal')){
        $errors['price'] = "price: Requierd Field";
    }elseif(!convertToValidPrice($price)){
        $errors['price'] = 'invalid price';
    }else {
        $price = convertToValidPrice($price);
    }
    // validate quantity...
    if(!validate($quantity, 'intVal')){
        $errors['quantity'] = "quantity : Invalid int , enter positive int!";
    }

    // validate discount.....
    if(!validate($discount, 'intVal')){
        $errors['discount'] = "discount : Invalid int , enter positive int!";
    }   

    // validate category.....
    if(!validate($cat_id, 'emptyVal')){
        $errors['cat_id'] = "category : Requierd Field";
    }elseif(!validate($cat_id, 'intVal')){
        $errors['cat_id'] = "category : Invalid Int , enter positive int!";
    }
    // validate image....
    if (!validate($imgName, 'emptyVal')) {
        $errors ['file'] = "image: required field";
    }elseif(!validate($imgType, 'fileVal')){
        $errors ['file'] = "image: invaild extension";
    }
  

    if(count($errors) > 0){
        $_SESSION['message'] = $errors;
    }else {
        $extArray = explode('/', $imgType);
        $finalName = rand().time().'.'.$extArray[1];
        
        $imgPath = './uploads/'.$finalName;
        
        if(move_uploaded_file($imgTmp, $imgPath)){

            $sql = "INSERT INTO products (name, img, description, quantity, price, discount, category_id) values ('$name', '$finalName', '$des', $quantity, $price, $discount, $cat_id)";
            $op  = mysqli_query($conn,$sql);
        
            if($op){
                $message = ["Data Inserted"];
            }else{
                $message = ["Error in sql OP Try Again"];
            }
                $_SESSION['message'] = $message;
        }else{
            $_SESSION['message'] = ['error in uploading image, try again!'];
        }
    } 
        
    // }  
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                <?php 
                PrintMessages('Add product');
                ?>
                </li>
            </ol>
            <!-- create form  -->
            <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                enctype="multipart/form-data">
            <!-- enter name -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Name">
                </div>
                <!-- enter image file -->
                <div class="form-group">
                        <label for="exampleInputEmail1">Image</label><br>
                        <input type="file" name="image">                          
                </div>
            <!-- enter description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="des" class="form-control" id="description" cols="" rows="5"></textarea>
                </div>
            <!-- enter quantity -->
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="quantity" aria-describedby="emailHelp" placeholder="quantity">
                </div>
            <!-- enter Price -->
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="text" name="price" class="form-control" id="Price"placeholder="Price">
                </div>
            <!-- enter discount -->
                <div class="form-group">
                    <label for="Discount">Discount</label>
                    <input type="text" name="discount" class="form-control" id="Discount"placeholder="Discount">
                </div>
            <!-- enter category -->
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="cat_id" class="form-control">
                        <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['title'];?></option>
                        <?php }?>
                    </select>
                </div>
            <!-- submit -->
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
</div>
</div>
<?php require '../../helpers/footer.php'?>
