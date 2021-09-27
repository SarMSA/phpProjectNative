<?php require_once '../init.php';

$_SESSION['del_flag'] = 0;

$id = sanitize($_GET['id'], 1);
$error = [];
// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $_SESSION['message'] = $error;
    header('location: index.php');
}
// fetch roles ....
$sql = "SELECT * FROM products";
$select_op  = mysqli_query($conn,$sql);

// fetch products ....
$sqluser = "SELECT * FROM review WHERE id = ".$id;
$opuser  = mysqli_query($conn, $sqluser);
$data = mysqli_fetch_assoc($opuser);

if ($data['user_id'] == $_SESSION['admin']['id']){
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
                $userID = $_SESSION['admin']['id'];
                $sql = "UPDATE review SET product_id = $pro_id, review = '$review' WHERE id = $id AND user_id = $userID";
                $op  = mysqli_query($conn,$sql);
            
                if($op){
                    $message = ["Data Inserted"];
                }else{
                    $message = ["Error in sql OP Try Again"];
                }
                    $_SESSION['message'] = $message;
        }
    } 
}else {
    $message = ['you can only update your review'];
    $_SESSION['message'] = $message;

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
            <form method="post" action="update.php?id=<?php  echo $data['id'] ?>"
                enctype="multipart/form-data">
                <!-- enter category -->
                <div class="form-group">
                    <label for="exampleInputPassword1">product</label>
                    <select name="product_id" class="form-control">
                        <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>" <?php if ($data['product_id'] == $result['id']){echo 'selected';}?>><?php echo $result['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
                <!-- enter content -->
                    <div class="form-group">
                        <label for="description">Review</label>
                        <textarea name="review" class="form-control" id="description" cols="" rows="5"><?php echo $data['review']?></textarea>
                    </div>
                    <!-- submit -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
</div>
</div>
<?php require '../../helpers/footer.php'?>
