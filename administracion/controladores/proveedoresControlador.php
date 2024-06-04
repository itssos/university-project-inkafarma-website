<?php

class ControladorProveedores{
    static public function ctrMostrarProveedores(){
        $respuesta = ModeloProveedores::mdlMostrarProveedores();
        return $respuesta;
    }
    static public function ctrAgregarProveedor($Nombre,$Direccion,$Telefono,$Correo){
        $respuesta = ModeloProveedores::mdlAgregarProveedor($Nombre,$Direccion,$Telefono,$Correo);
        return $respuesta;
    }
    static public function ctrActualizarProveedor($Id, $Nombre, $Direccion, $Telefono, $Correo){
        $respuesta = ModeloProveedores::mdlActualizarProveedor($Id, $Nombre, $Direccion, $Telefono, $Correo);
        return $respuesta;
    }
    static function ctrEliminarProveedor($Id){
        $respuesta = ModeloProveedores::mdlEliminarProveedor($Id);
        return $respuesta;
    }
    static function ctrObtenerNombreProveedor($Id){
        $respuesta = ModeloProveedores::mdlObtenerNombreProveedor($Id);
        return $respuesta;
    }
}