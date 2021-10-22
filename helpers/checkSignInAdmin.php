<?php 
require_once './helpers/functions.php';


  if(!isset($_SESSION['admin'])){
    header("Location: ".hurl('index.php'));
  }

?>