<?php 
require_once './db/dbConn.php';
require './helpers/functions.php';
if (isset($_SESSION['user']) or isset($_SESSION['admin'])){
    if(isset($_SESSION['user'])){
        $userid = $_SESSION['user']['id'];
    }elseif(isset($_SESSION['admin'])) {

        $userid = $_SESSION['admin']['id'];
    }
            $orderID = returnPositiveInt(sanitize($_GET['id'], 1)) ?? null;
            $error = [];
            // validate id ....
            if (!validate($orderID, 'intVal')) {
                $error['id'] = 'Invalid integer';
            }

            if (count($error) == 0) {


                    $sql = "UPDATE orders SET status = 'action' WHERE id = $orderID AND user_id = $userid";
                    $op = mysqli_query($conn, $sql);
            }else{
                echo "error";
            }
            header("location: logicOrder.php?id='$orderID'");
}
?> 