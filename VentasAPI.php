<?php
    //error_reporting(-1);
    include_once 'ventas.php';
    header('Content-Type: application/json');

    class VentasAPI{

        function getAll(){
            $venta = new Venta();
            $ventas = array();
            $ventas['ventas'] = array();

            $res = $venta->obtenerVentas();

            if($res){

              while ($row = $res->fetch(\PDO::FETCH_ASSOC)) {
                    $item = array(
                      'id' => $row['ID'],
                      'name' => $row['NAME'],
                      'descrip' => $row['DESCRIP']
                    );

                    array_push($ventas['ventas'], $item);

              }
              $this->printJSON($ventas);
            }else{
              $this->error('No hay elementos registrados');
            }
        }

        function getById($id){
            $venta = new Venta();
            $ventas = array();
            $ventas['conVenta'] = array();

            $res = $venta->obtenerVenta($id);
            $rows = $res->fetch(\PDO::FETCH_ASSOC);
            $me = $res->rowCount();

            if($me == 1){

                    $item = array(
                      'id' => $rows['ID'],
                      'name' => $rows['NAME'],
                      'descrip' => $rows['DESCRIP']
                    );

                    array_push($ventas['conVenta'], $item);

              $this->printJSON($ventas);
            }else{
              $item = array(
                'id' => "",
                'name' => "",
                'descrip' => ""
              );

              array_push($ventas['conVenta'], $item);
              $this->printJSON($ventas);
            }
        }

        function printJSON($array){
          echo json_encode($array);
        }

        function error($ventas){
           array_push($ventas['conVenta'], "No hay elementos registrados");
           echo json_encode($ventas);
        }


    }
?>
