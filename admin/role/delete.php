<?php require_once '../init.php';

// sql code ....

$id = sanitize($_GET['id'], 1);
$error = [];
// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $message = $error;
}else {
    $sql = "DELETE FROM role WHERE id = $id";
    $op  = mysqli_query($conn, $sql);

    if ($op) {
        $message = ['Role deleted'];
    }else {
        $message = ['Error try again !'];
    }
}

$_SESSION['message'] = $message;
header('location: index.php');

?> 