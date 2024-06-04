<?php
require_once "modelos/conexionBD.php";

class LoginEmpleado
{
    static public function mdlLoginEmpleado($Correo,$Password){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM empleados WHERE Correo = '$Correo' AND Password = '$Password';");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}