<?php

    class ProductsModel{
        
        private $db;
        private $products;

        public function __construct(){
            require_once("ConnectDB.php");

            $this->db=Connect::connect();

            $this->products=array();

        }

        public function getProducts() {
            
            $consulta = $this->db->query("SELECT * FROM productos");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->products[]=$filas;
            }

            return $this->products;

        }

        public function addProduct($name,$desc,$price,$stock,$status,$cat,$sup){
            try {
                $re = $this->db->query("INSERT INTO `productos`(`Nombre`, `Descripcion`, `Precio`, `Stock`, `Estado`, `ID_Categoria`, `ID_Proveedor`) VALUES ('$name','$desc','$price','$stock','$status','$cat','$sup');");

                if($re){
                    echo "Producto agregado exitosamente".$name;
                    $_SESSION["pag"] = "productos.php";
                }else{
                    echo "!!!!! no se pudo agregar";
                }

            } catch (\Throwable $th) {
                echo "ERROR AL AGREGAR PRODUCTO: ".$th;
            }
        }

        public function updateProduct($id,$name,$desc,$price,$stock,$status,$cat,$sup){
            try {
                $re = $this->db->query("UPDATE `productos` SET `ID_Producto`='$id',`Nombre`='$name',`Descripcion`='$desc',`Precio`='$price',`Stock`='$stock',`Estado`='$status',`ID_Categoria`='$cat',`ID_Proveedor`='$sup' WHERE '$id';");

                if($re){
                    echo "Producto ACTUALIZADO exitosamente".$name;
                    $_SESSION["pag"] = "productos.php";
                }else{
                    echo "!!!!! no se pudo ACTUALIZAR";
                }

            } catch (\Throwable $th) {
                echo "ERROR AL ACTUALIZAR PRODUCTO: ".$th;
            }
        }

        public function deleteProduct($id){
            try {
                $re = $this->db->query("DELETE FROM `productos` WHERE ID_Producto = '$id';");

                if($re){
                    echo "Producto eliminado exitosamente".$id;
                    $_SESSION["pag"] = "productos.php";
                }else{
                    echo "!!!!! no se pudo eliminar";
                }

                
            } catch (\Throwable $th) {
                echo "ERROR AL ELIMINAR PRODUCTO";
            }
        }

    }
?>