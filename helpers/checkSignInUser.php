<?php 

  if(!isset($_SESSION['user'])){
      header("Location: ".hurl('index.php'));
  }

?>