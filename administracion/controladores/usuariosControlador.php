<?php

class ControladorUsuarios
{
    static public function ctrMostrarUsuarios()
    {
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios();
        return $respuesta;
    }

    static public function ctrAgregarUsuario($Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo)
    {
        $respuesta = ModeloUsuarios::mdlAgregarUsuario($Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo);
        return $respuesta;
    }

    static public function ctrActualizarUsuario($ID_Usuario, $Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo)
    {
        $respuesta = ModeloUsuarios::mdlActualizarUsuario($ID_Usuario, $Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo);
        return $respuesta;
    }

    static function ctrEliminarUsuario($ID_Usuario)
    {
        $respuesta = ModeloUsuarios::mdlEliminarUsuario($ID_Usuario);
        return $respuesta;
    }

    static function ctrObtenerNombreUsuario($ID_Usuario)
    {
        $respuesta = ModeloUsuarios::mdlObtenerNombreUsuario($ID_Usuario);
        return $respuesta;
    }
}
