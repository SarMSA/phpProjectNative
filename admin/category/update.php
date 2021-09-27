<?php require_once '../init.php';

$_SESSION['del_flag'] = 0;

$id = sanitize($_GET['id'], 1);
$error = [];
var_dump($id);
// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $_SESSION['message'] = $error;
    header('location: index.php');
}

$sql = "SELECT * FROM category WHERE id = ".$id;
$op  = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($op);
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
        $sql = "UPDATE category SET title = '$title' WHERE id = ".$id;
        $op  = mysqli_query($conn, $sql);
        if ($op){
            $message = ['Data updated'];
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
                        printMessages('update category',$_SESSION['del_flag']);
                    ?>
                    </li>
                </ol>
                <form method="post" action="update.php?id=<?php echo $data['id'];?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName" value = "<?php echo $data['title']?>" aria-describedby="" placeholder="Enter Title">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </div>
</div>
<?php require '../../helpers/footer.php'?>
