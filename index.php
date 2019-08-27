<?php
  include_once 'VentasAPI.php';
  header('Content-Type: application/json');

  $API = new VentasAPI();

  if(isset($_GET['id'])){
      $id = $_GET['id'];

      if(is_numeric($id)){
        $API->getById($id);
      }else{
        $API->error('Los parametros son inconrrectos');
      }
  }else{
      $API->getAll();
  }



?>
