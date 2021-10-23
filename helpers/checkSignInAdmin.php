<?php 

  if(!isset($_SESSION['admin'])){
    header("Location: ".hurl('index.php'));
  }

?>