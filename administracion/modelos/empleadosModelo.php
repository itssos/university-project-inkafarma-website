<?php
require_once "conexionBD.php";

class ModeloEmpleados
{
    static public function mdlMostrarEmpleados()
    {
        $stmt = Conexion::conectar()->prepare("SELECT ID_Empleado,Nombre,Apellido,DNI,Telefono,Correo,Password,acciones FROM empleados");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlAgregarEmpleado($Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password)
    {
        if (empty($Nombre) || empty($Apellido) || empty($DNI) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL) || empty($Password)) {
            return "Error, no se pudo registrar el empleado";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO empleados(Nombre, Apellido, DNI, Telefono, Correo, Password) VALUES (:Nombre, :Apellido, :DNI, :Telefono, :Correo, :Password)");
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Apellido", $Apellido, PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $DNI, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $Correo, PDO::PARAM_STR);
        $stmt->bindParam(":Password", $Password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El empleado se registró correctamente";
        } else {
            return "Error, no se pudo registrar el empleado";
        }
    }

    static public function mdlActualizarEmpleado($ID_Empleado, $Nombre, $Apellido, $DNI, $Telefono, $Correo, $Password)
    {
        if (empty($ID_Empleado) || empty($Nombre) || empty($Apellido) || empty($DNI) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL) || empty($Password)) {
            return "Error, no se pudo actualizar el empleado";
        }

        $stmt = Conexion::conectar()->prepare("UPDATE empleados SET Nombre=:Nombre, Apellido=:Apellido, DNI=:DNI, Telefono=:Telefono, Correo=:Correo, Password=:Password WHERE ID_Empleado=:ID_Empleado");
        $stmt->bindParam(":ID_Empleado", $ID_Empleado, PDO::PARAM_INT);
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Apellido", $Apellido, PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $DNI, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":Correo", $Correo, PDO::PARAM_STR);
        $stmt->bindParam(":Password", $Password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "El empleado se actualizó correctamente";
        } else {
            return "Error, no se pudo actualizar el empleado";
        }
    }

    static public function mdlEliminarEmpleado($ID_Empleado)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM empleados WHERE ID_Empleado = :ID_Empleado;");
        $stmt->bindParam(":ID_Empleado", $ID_Empleado, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                return "El empleado se eliminó correctamente";
            } else {
                return "Error, no se pudo eliminar el empleado";
            }
        } catch (\Throwable $th) {
            return "Error, no se pudo eliminar el empleado";
        }
    }
}