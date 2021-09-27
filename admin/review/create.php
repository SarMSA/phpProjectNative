<?php require_once '../init.php';

// fetch roles ....
$sql = "SELECT * FROM products";
$select_op  = mysqli_query($conn,$sql);
// check request method......
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $pro_id = CleanInputs($_POST['product_id']);
    $review = CleanInputs($_POST['review']);

    $errors = [];

    # Validate name... 
    if(!validate($review, 'emptyVal')){
        $errors['review'] = "review : Requierd Field";
    }elseif(!validate($review, 'nameVal')){
        $errors['review'] = "review : Invalid String";
    } 

    // validate category.....
    if(!validate($pro_id, 'emptyVal')){
        $errors['product_id'] = "product_name : Requierd Field";
    }elseif(!validate($pro_id, 'intVal')){
        $errors['product_id'] = "product_id : Invalid Int , enter positive int!";
    }
  

    if(count($errors) > 0){
        $_SESSION['message'] = $errors;
    }else {
            $id = $_SESSION['admin']['id'];
            $sql = "INSERT INTO review (product_id, user_id, review) values ( $pro_id , $id, '$review')";
            $op  = mysqli_query($conn,$sql);
        
            if($op){
                $message = ["Data Inserted"];
            }else{
                $message = ["Error in sql OP Try Again"];
            }
                $_SESSION['message'] = $message;
    }
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
                <!-- enter category -->
                <div class="form-group">
                    <label for="exampleInputPassword1">product</label>
                    <select name="product_id" class="form-control">
                        <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
                <!-- enter content -->
                    <div class="form-group">
                        <label for="description">Review</label>
                        <textarea name="review" class="form-control" id="description" cols="" rows="5"></textarea>
                    </div>
                    <!-- submit -->
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
</div>
</div>
<?php require '../../helpers/footer.php'?>
