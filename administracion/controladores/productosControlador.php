<?php

class ControladorProductos{
    static public function ctrMostrarProductos(){
        $respuesta = ModeloProductos::mdlMostrarProductos();
        return $respuesta;
    }

    static public function ctrAgregarProducto($Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img){
        $respuesta = ModeloProductos::mdlAgregarProducto($Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img);
        return $respuesta;
    }

    static public function ctrActualizarProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img){
        $respuesta = ModeloProductos::mdlActualizarProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img);
        return $respuesta;
    }

    static function ctrEliminarProducto($ID_Producto){
        $respuesta = ModeloProductos::mdlEliminarProducto($ID_Producto);
        return $respuesta;
    }
}
