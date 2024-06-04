<?php

    class VentasModel{
        
        private $db;
        private $ventas;

        public function __construct(){
            require_once("ConnectDB.php");

            $this->db=Connect::connect();

            $this->ventas=array();

        }


        public function addVenta($cliente,$fecha,$total,$detalle){
            try {
                $re = $this->db->query("INSERT INTO ventas(ID_Cliente, Fecha, Total, Detalle_Venta) VALUES ('$cliente','$fecha','$total','$detalle');");

                if($re){
                    // echo "Producto agregado exitosamente";
                    // header("Location: ../index.php");
                    header('Location: mensaje.html');
                    exit();
                }else{
                    echo "ERROR";
                }

            } catch (\Throwable $th) {
                echo "ERROR AL AGREGAR PRODUCTO: ".$th;
            }
        }

    }
?>