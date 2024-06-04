<?php

class ControladorCategorias{
    static public function ctrMostrarCategoria(){
        $respuesta = ModeloCategorias::mdlMostrarCategorias();
        return $respuesta;
    }
    static public function ctrAgregarCategoria($Nombre,$Decripcion,$Estado){
        $respuesta = ModeloCategorias::mdlAgregarCategoria($Nombre,$Decripcion,$Estado);
        return $respuesta;
    }
    static public function ctrActualizarCategoria($Id,$Nombre,$Decripcion,$Estado){
        $respuesta = ModeloCategorias::mdlActualizarCategoria($Id,$Nombre,$Decripcion,$Estado);
        return $respuesta;
    }
    static function ctrEliminarCategoria($Id){
        $respuesta = ModeloCategorias::mdlEliminarCategoria($Id);
        return $respuesta;
    }
    static function ctrObtenerNombreCategoria($Id){
        $respuesta = ModeloCategorias::mdlObtenerNombreCategoria($Id);
        return $respuesta;
    }
}