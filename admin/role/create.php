<?php require_once '../init.php';
// insert roles ....
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['title'];
    $error = [];
// validate title ....
    if (!validate($title, 'emptyVal')) {
        $error['title'] = 'Title : required';
    }elseif(!validate($title, 'nameVal')) {
        $error['title'] = 'invalid title';
    }

    if (count($error) == 0) {
        $sql = "INSERT INTO role (title) VALUES ('$title')";
        $op  = mysqli_query($conn, $sql);
        if ($op){
            $message = ['Data inserted'];
        }else {
            $message = ['error in op , try again!'];
        }
        $_SESSION['message'] = $message;
    }else{
        $_SESSION['message'] = $error;
    }
}?>
    <div id="layoutSidenav_content">  
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard </h1> 
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">             
                    <?php 
                        printMessages('Add Role');
                    ?>
                    </li>
                </ol>
                <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </main>
    </div>
</div>
<?php require '../../helpers/footer.php'?>
