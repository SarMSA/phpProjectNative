<?php 
    $signin = $_POST['signIn']?? NULL;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($signin)) {
        $email = CleanInputs($_POST['email']);
        $password = CleanInputs($_POST['password']);
        $inErrors = [];
        //validate email ...
        if (!validate($email, 'emptyVal')) {
            $inErrors['email'] = 'email is required !';
        }
        elseif (!validate($email, 'emailVal')) {
            $inErrors['email'] = 'Invalid email';
        }
        //validate password ...
        if (!validate($password, 'emptyVal')) {
            $inErrors['password'] = 'password is required !';
        }
        elseif (!validate($password, 'passVal')) {
            $inErrors['password'] = 'password is at least 6 charaters !';
        }
        $hashpassword = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$hashpassword'";
        $op = mysqli_query($conn, $sql);
        $sqlAdmin = "SELECT * FROM users WHERE email = '$email' and password = '$hashpassword'";
        $opAdmin = mysqli_query($conn, $sqlAdmin);
        $data = mysqli_fetch_assoc($opAdmin);
        if (count($inErrors) == 0) {
            if (mysqli_num_rows($op) == 1) {
                if ($data['role_id'] == 1) {
                    $_SESSION['admin'] = [
                        'id'   => $data['id'],
                        'email'=> $email,
                        'password'=> $password,    
                    ];
                }elseif ($data['role_id'] == 2){
                    $_SESSION['user'] = [
                        'id'   => $data['id'],
                        'email'=> $email,
                        'password'=> $password,
                    ];
                }
                header("Location: index.php");
            }else{
                $inErrors['log'] = 'your account is not exist, try again!';
            }
        }
    }
?>


<section class="signIn" <?php if(isset($inErrors)) { echo "style='display: flex'";}?>>
    <div class="container text-center">
        <i class="fas fa-times close"></i>
        <h3>Welcome back!</h3>
        <h3 class="bold">Sign in to your account</h3>
        <p>Don't have an account? <span class="text-primary" id="signUp">Sign Up</span></p>
        <?php
            if (isset($inErrors['log'])) {
                echo '<div class=" alert alert-danger" role="alert">'.$inErrors['log'].'</div>';
            }
        ?>
        <form class='text-left' method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype ="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><span class="text-danger">*</span> Email</label>
                <input type="email" class="form-control" <?php if (isset($inErrors['email'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> name="email" value='<?php if (!empty($email)) {echo $email;}?>' id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php
                    if (isset($inErrors['email'])) {
                        echo '<p class="text-danger" role="alert">'.$inErrors['email'].'</p>';
                    }
                ?>
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label"><span class="text-danger">*</span> Password</label>
                <input type="password" class="form-control" <?php if (isset($inErrors['password'])) {echo "style='border-bottom-color: #DC3545 !important'";}?> name="password" value='<?php if (!empty($password)) {echo $password;}?>' id="exampleInputPassword1">
                <?php
                    if (isset($inErrors['password'])) {
                        echo '<p class="text-danger" role="alert">'.$inErrors['password'].'</p>';
                    }
                ?>
            </div>
            <div class="mb-1 pt-2 text-center">
                <p><a class="text-primary" href="#">Forget your password?</a></p>
            </div>
            <input type="hidden" name="signIn" value="signIn">
            <div class="submit text-center">
                <button type="submit" class="btn btn-outline-primary btn-lg btn-block border-0 text-uppercase font-weight-bold" >Sign in</button>
            </div>
        </form>
    </div>
</section>