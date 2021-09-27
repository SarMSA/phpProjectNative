<?php 
require_once './db/dbConn.php';
require './helpers/functions.php';
if (isset($_SESSION['user']) or isset($_SESSION['admin'])){
    if(isset($_SESSION['user'])){
        $userid = $_SESSION['user']['id'];
    }elseif(isset($_SESSION['admin'])) {

        $userid = $_SESSION['admin']['id'];
    }
        $cartid = returnPositiveInt(sanitize($_GET['id'], 1)) ?? null;
        $error = [];
        // validate id ....
        if (!validate($cartid, 'intVal')) {
            $error['id'] = 'Invalid integer';
        }
            // check for open orde....
            $sql = "SELECT * FROM orders WHERE user_id = $userid AND status = 'inaction' ";
            $op = mysqli_query($conn, $sql);
            $dataorder = mysqli_fetch_assoc($op);
            $orderID = $dataorder['id'] ?? NULL;

        if (count($error) == 0) {
            $sqlcart = "SELECT * FROM cart WHERE id = $cartid and user_id = $userid";
            $opcart = mysqli_query($conn, $sqlcart);
            while ($data = mysqli_fetch_assoc($opcart)){
            $cartpro = $data['product_id'];
            $cartquan = $data['order_quantity'];
                if (mysqli_num_rows($op) == 0){

                    $sql = "INSERT INTO orders (user_id, status) VALUES ($userid, 'inaction')";
                    $op = mysqli_query($conn, $sql);
                    $orderID = mysqli_insert_id($conn);
                    $sqlitem = "INSERT INTO order_item (order_id, product_id, quantity) VALUES ($orderID, $cartpro, $cartquan)";
                    $opitem = mysqli_query($conn, $sqlitem);
                    $sqldelete = "DELETE FROM cart WHERE product_id = $cartpro and user_id = $userid";
                    $opdelete = mysqli_query($conn, $sqldelete);
                }else {
                    $sqlitem = "INSERT INTO order_item (order_id, product_id, quantity) VALUES ($orderID, $cartpro, $cartquan)";
                    $opitem = mysqli_query($conn, $sqlitem);
                    $sqldelete = "DELETE FROM cart WHERE product_id = $cartpro and user_id = $userid";
                    $opdelete = mysqli_query($conn, $sqldelete);
                }
            }
        }else{
            echo "error";
        }
        header("location: logicOrder.php?id='$orderID'");
        exit();
    }
?> 

