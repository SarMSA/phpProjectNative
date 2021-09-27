<?php
require_once '../../db/dbConn.php';
require '../../helpers/functions.php';
$id = returnPositiveInt(sanitize($_GET['id'], 1));
$error = [];

// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $message = $error;
}else {
    $sql = "UPDATE  orders SET status = 'accepted' WHERE id = $id ";
    $op = mysqli_query($conn, $sql);
    if ($op) {
        header("location: index.php");
    }else{
        echo 'error';
    }
}

?>