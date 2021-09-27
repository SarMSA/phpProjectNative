<?php 

$signUp = $_POST['signUp']?? NULL;
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($signUp)) {
        $fname = CleanInputs($_POST['fname']);
        $lname = CleanInputs($_POST['lname']);
        $Uemail = CleanInputs($_POST['email']);
        $Upassword = CleanInputs($_POST['password']);
        $errors = [];
        //validate email ...
        if (!validate($Uemail, 'emptyVal')) {
            $errors['email'] = 'email is required !';
        }
        elseif (!validate($Uemail, 'emailVal')) {
            $errors['email'] = 'Invalid email';
        }
        $sql = "select id from users where email='$Uemail'";    
        $op = mysqli_query($conn,$sql);

        if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
            $errors['email'] = "Email :  Email already used";
        }
        //validate password ...
        if (!validate($Upassword, 'emptyVal')) {
            $errors['password'] = 'password is required !';
        }
        elseif (!validate($Upassword, 'passVal')) {
            $errors['password'] = 'password is at least 6 charaters !';
        }
        $hashpassword = md5($Upassword);
        if (count($errors) == 0) {
            $sqlD = "INSERT INTO user_detail (governorate, city, extra_data) VALUES ('', '', '')";
            $opD = mysqli_query($conn, $sqlD);
            $userDetail = mysqli_insert_id($conn);
            $sql = "INSERT INTO users (firstname, lastname, email, password, role_id, detail_id) VALUES ('$fname','$lname', '$Uemail', '$hashpassword', 2, $userDetail)";
            $op = mysqli_query($conn, $sql);
            if ($op) {
                $user_id =  mysqli_insert_id($conn);
                $_SESSION['user'] = [
                    'id'   => $user_id,
                    'fname'=> $fname,
                    'lname'=> $lname,
                    'email'=> $Uemail,
                    'password'=> $Upassword,
                ];
                header("Location: index.php");
            }else{
                $errors['log'] = 'error in connection';
            }
        }

    }
?>


<section class="signUp" <?php if(isset($errors)) { echo "style='display: flex'";}?>>
    <div class="container text-center">
        <i class="fas fa-times close"></i>
        <h3 class="bold">create an account</h3>
        <p>Already have an account? <span class="text-primary" id="signIn">Sign In</span></p>
        <?php
            if (isset($errors['log'])) {
                echo '<p class="text-danger" role="alert">'.$errors['log'].'</p>';
            }
        ?>
        <form class='text-left' method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype ="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span>First Name</label>
                <input type="text" class="form-control" name="fname" <?php if (isset($errors['fname'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> value='<?php if (!empty($fname)) {echo $fname;}?>' >
                <?php
                    if (isset($errors['fname'])) {
                        echo '<p class="text-danger" role="alert">'.$errors['fname'].'</p>';
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span>Last Name</label>
                <input type="text" class="form-control" name="lname" <?php if (isset($errors['lname'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> value='<?php if (!empty($lname)) {echo $lname;}?>' >
                <?php
                    if (isset($errors['lname'])) {
                        echo '<p class="text-danger" role="alert">'.$errors['lname'].'</p>';
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Email</label>
                <input type="email" class="form-control" name="email" <?php if (isset($errors['email'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> value='<?php if (!empty($Uemail)) {echo $Uemail;}?>' aria-describedby="emailHelp">
                <?php
                    if (isset($errors['email'])) {
                        echo '<p class="text-danger" role="alert">'.$errors['email'].'</p>';
                    }
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> Password</label>
                <input type="password" class="form-control" name="password" <?php if (isset($errors['password'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> value='<?php if (!empty($Upassword)) {echo $Upassword;}?>'>
                <?php
                    if (isset($errors['password'])) {
                        echo '<p class="text-danger" role="alert">'.$errors['password'].'</p>';
                    }
                ?>
            </div>
            <input type="hidden" name="signUp" value="signUp">
            <div class="submit text-center">
                <button type="submit" class="btn btn-outline-primary btn-lg btn-block border-0 text-uppercase font-weight-bold" >creat an account</button>
            </div>
        </form>
    </div>
</section>