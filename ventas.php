<?php
  include_once 'fire.php';
      header('Content-Type: application/json');

  class Venta extends DB{



      function obtenerVentas(){
        $sql = 'SELECT ID,NAME,DESCRIP FROM VENTAS';
        $query = $this->connect()->query($sql);

        return $query;
      }

      function obtenerVenta($id){
        $query = $this->connect()->prepare('SELECT * FROM VENTAS WHERE ID = :id');
        $query->execute(['id' => $id]);

        return $query;
      }

      function nuevaVenta($venta){
        $query = $this->connect()->prepare('INSERT INTO VENTAS VALUES(:ID, :NAME, :DESCRIP)');
        $query->execute(['id' => $venta['id'], 'name' => $venta['name'], 'descrip' => $venta['descrip']]);

        return $query;
      }

  }
?>
