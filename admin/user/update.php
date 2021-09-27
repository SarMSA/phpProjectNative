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
// fetch data....
$sqluser = "SELECT * FROM users WHERE id = ".$id;
$opuser  = mysqli_query($conn, $sqluser);
$data = mysqli_fetch_assoc($opuser);


// fetch roles ....
$sql = "SELECT * FROM role";
$select_op  = mysqli_query($conn,$sql);

// fetch user_detail....
if ($_SESSION['admin']['id'] == $id) {
    $sqlgov = "SELECT * FROM `user_detail`";
    $opgov  = mysqli_query($conn,$sqlgov);
    $sqlcity = "SELECT * FROM `user_detail`";
    $opcity  = mysqli_query($conn,$sqlcity);

} 
// check request method......
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $fusername     = CleanInputs($_POST['fusername']);
    $lusername     = CleanInputs($_POST['lusername']);
    $userEmail     = CleanInputs($_POST['userEmail']);
    $userRole_id   = CleanInputs($_POST['role_id']);

    $errors = [];

    # Validate fname... 
    if(!validate($fusername, 'emptyVal')){
      $errors['fusername'] = "first name : Requierd Field";
    }elseif(!validate($fusername, 'nameVal')){
        $errors['fusername'] = "first name : Invalid String";
    }
    # Validate lname... 
    if(!validate($lusername, 'emptyVal')){
        $errors['lusername'] = "last name : Requierd Field";
    }elseif(!validate($lusername, 'nameVal')){
        $errors['lusername'] = "last name : Invalid String";
    }
    // validate email...
    if(!validate($userEmail, 'emptyVal')){
        $errors['userEmail'] = " Email : Requierd Field";
    }elseif(!validate($userEmail, 'emailVal')){
        $errors['userEmail'] = "Email : Invalid Email";
    }

    // validate repeated emails....
    $sql = "SELECT id FROM users where email='$userEmail' AND id  != ".$id;    
    $op = mysqli_query($conn,$sql);

    if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
        $errors['userEmail'] = "Email :  Email already used";
    }


    // validate role.....
    if(!validate($userRole_id, 'emptyVal')){
        $errors['userRole_id'] = "Role : Requierd Field";
    }elseif(!validate($userRole_id, 'intVal')){
        $errors['userRole_id'] = "Role : Invalid Int";
    } 
    if ($_SESSION['admin']['id'] == $id) {
        $detailId = $_POST['detail_id'];
        $extraData = CleanInputs($_POST['extraData']) ?? '-';
        
        $sql = "UPDATE users , user_detail
                SET users.detail_id = $detailId,
                    user_detail.extra_data = '$extraData'
                WHERE users.id = $id
                And user_detail.id = $detailId"
            ;
        $op  = mysqli_query($conn,$sql);
        if(!$op){
            $message = ['error in op , try again!'];
            $_SESSION['message'] = $error;
        }

    } 
  

    if(count($errors) > 0){
        $_SESSION['message'] = $errors;
    }else{

        
        $sql = "UPDATE users SET firstname = '$fusername', lastname = '$lusername', email = '$userEmail', role_id = $userRole_id WHERE id =".$id;
        $op  = mysqli_query($conn,$sql);

        if($op){
            $message = ["Data Updated"];
            $_SESSION['message'] = $message;
            $_SESSION['del_flag'] = 1;
            header('location: index.php');
        }else {
            $message = ['error in op , try again!'];
            $_SESSION['message'] = $error;
        }
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
                PrintMessages('Update user',$_SESSION['del_flag']);
                ?>
                </li>
            </ol>
            <!-- create form  -->
            <form method="post" action="update.php?id=<?php echo $data['id']; ?>"
                enctype="multipart/form-data">
            <!-- enter firstname -->
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" value="<?php echo $data['firstname']?>" name="fusername" class="form-control" id="exampleInputName" aria-describedby="" placeholder="first Name">
                </div>
                <!-- enter lastname -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" value="<?php echo $data['lastname']?>" name="lusername" class="form-control" id="exampleInputName" aria-describedby="" placeholder="last Name">
                </div>
            <!-- enter email -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="<?php echo $data['email']?>" name="userEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                </div>
            <!-- enter role -->
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="role_id" class="form-control">
                        <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>" <?php if ($result['id'] == $data['role_id']){echo 'selected';}?>><?php echo $result['title'];?></option>
                        <?php }?>
                    </select>
                </div>
            <?php if ($_SESSION['admin']['id'] == $id) {?>
                <!-- enter governorate -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Covernorate</label>
                    <select name="detail_id" class="form-control">
                        <?php while($detailgov = mysqli_fetch_assoc($opgov)){?>
                            <option value="<?php echo $detailgov['id'];?>" <?php if ($data['detail_id'] == $detailgov['id']){echo 'selected';}?>><?php echo $detailgov['governorate'] ?? '';?></option>
                        <?php }?>
                    </select>                
                </div>
                <!-- enter city -->
                <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <select name="detail_id" class="form-control">
                        <?php while($detail = mysqli_fetch_assoc($opcity)){?>
                                <option value="<?php echo $detail['id'];?>" <?php if ($data['detail_id'] == $detail['id']){echo 'selected';}?>><?php echo $detail['city'] ?? '';?></option>
                        <?php }?>
                    </select>                
                </div>
                <!-- enter extradata -->
                <div class="form-group">
                    <label for="exampleInputEmail1">extra data</label>
                    <input type="text" value="<?php echo $data['extra_data']?? ''?>" name="extraData" class="form-control" id="exampleInputName" aria-describedby="" placeholder="enter you data">
                </div>
                <?php } ?>
            <!-- submit -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
</div>
</div>
<?php require '../../helpers/footer.php'?>
