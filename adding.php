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
    $sql = "SELECT * FROM products WHERE id = $id";
    $op  = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($op);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $page = $_POST['page'];
        $quantity = returnPositiveInt(sanitize(CleanInputs($_POST['quantity']), 1));
        if (!validate($quantity, 'imptyVal') or $quantity == 0){
            $error = ["you have to enter quantity"];
        }
        elseif(!validate($quantity, 'intVal')){
            $error = ["quantity : Invalid int , enter positive int!"];

        }elseif($quantity > $data['quantity']){
            $error = ["only".$data['quantity'].'available'];
        }
        if(count($error) == 0){
  
            if(isset($_SESSION['user'])){
                $userID = $_SESSION['user']['id'];
            }elseif(isset($_SESSION['admin'])) {
            
                $userID = $_SESSION['admin']['id'];
            }
            $productID = $data['id'];
            $sqlcart = "INSERT INTO cart (user_id, product_id, order_quantity) VALUES ($userID, $id, $quantity)";
            $opcart = mysqli_query($conn, $sqlcart);
            if ($opcart){
                $message = ['success !'];
            
            }else{
                $message = ['failed !'];
       

            }
        }else{
            $message = ['error in your quantity field'];
        }
        $_SESSION['message'] = $message;
        
    }
    
}
// 
header('location: shopping.php');
// header('location: shopping.php');
// exit();
?>