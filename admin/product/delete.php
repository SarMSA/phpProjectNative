<?php require_once '../init.php';;

// sql code ....

$id = returnPositiveInt(sanitize($_GET['id'], 1));
$error = [];
// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $message = $error;
}else {
    // select the image to delete from uploads file before deleting the row from product table...
    $sql = "SELECT img FROM products WHERE id =".$id;
    $op = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($op);
    $image = $data['img'];

    $sql = "DELETE FROM products WHERE id = $id";
    $op  = mysqli_query($conn, $sql);

    if ($op) {
        $path = './uploads/'.$image;
        if (file_exists($path)) {
            unlink($path);
        }
        $message = ['product deleted'];
    }else {
        $message = ['Error try again !'];
    }
}

$_SESSION['message'] = $message;
header('location: index.php');

?> 