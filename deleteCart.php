<?php
require_once './db/dbConn.php';
require './helpers/functions.php';
$id = returnPositiveInt(sanitize($_GET['id'], 1));
$error = [];

// validate id ....
if (!validate($id, 'intVal')) {
    $error['id'] = 'Invalid integer';
}

if (count($error) > 0) {
    $message = $error;
}else {
    if(isset($_SESSION['user'])){
        $userID = $_SESSION['user']['id'];
    }elseif(isset($_SESSION['admin'])) {
    
        $userID = $_SESSION['admin']['id'];
    }
    $sql = "DELETE  FROM cart WHERE id = $id and user_id = $userID";
    $op = mysqli_query($conn, $sql);
    if ($op) {
        header("location: cart.php");
    }else{
        echo 'error';
    }
}

?>