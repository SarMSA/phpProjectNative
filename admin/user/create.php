<?php require_once '../init.php';

// fetch roles ....
$sql = "SELECT * FROM role";
$select_op  = mysqli_query($conn,$sql);
// check request method......
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $fusername     = CleanInputs($_POST['fusername']);
    $lusername     = CleanInputs($_POST['lusername']);
    $userEmail     = CleanInputs($_POST['userEmail']);
    $userPassword  = CleanInputs($_POST['userPassword']);
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
    $sql = "select id from users where email='$userEmail'";    
    $op = mysqli_query($conn,$sql);

    if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
        $errors['userEmail'] = "Email :  Email already used";
    }


    // validate password.....
    if(!validate($userPassword, 'emptyVal')){
        $errors['userPassword'] = "Password : Requierd Field";
    }elseif(!validate($userPassword, 'passVal')){
        $errors['userPassword'] = "Password : Invalid Length , Length must Be >= 6 CH";
    }   

    // validate role.....
    if(!validate($userRole_id, 'emptyVal')){
        $errors['userRole_id'] = "Role : Requierd Field";
    }elseif(!validate($userRole_id, 'intVal')){
        $errors['userRole_id'] = "Role : Invalid Int";
    }   
  

    if(count($errors) > 0){
        $_SESSION['message'] = $errors;
    }else{

        $userPassword = md5($userPassword);
        
        $sql = "INSERT INTO users (firstname, lastname, email, password, role_id) values ('$fusername', '$lusername', '$userEmail', '$userPassword', $userRole_id)";
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
                PrintMessages('Add user');
                ?>
                </li>
            </ol>
            <!-- create form  -->
            <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                enctype="multipart/form-data">
            <!-- enter firstname -->
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="fusername" class="form-control" id="exampleInputName" aria-describedby="" placeholder="first Name">
                </div>
                <!-- enter lastname -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="lusername" class="form-control" id="exampleInputName" aria-describedby="" placeholder="last Name">
                </div>
            <!-- enter email -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="userEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                </div>
            <!-- enter password -->
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="userPassword" class="form-control" id="exampleInputPassword1"placeholder="Password">
                </div>
            <!-- enter role -->
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="role_id" class="form-control">
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
