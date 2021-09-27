<?php
require_once '../../db/dbConn.php';
require '../../helpers/functions.php';

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
    $sql = "DELETE FROM review WHERE id = $id";
    $op  = mysqli_query($conn, $sql);

    if ($op) {
        $message = ['review deleted'];
    }else {
        $message = ['Error try again !'];
    }
}

$_SESSION['message'] = $message;
header('location: index.php');

?> 