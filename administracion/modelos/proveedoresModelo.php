<?php

require_once "conexionBD.php";

class ModeloProveedores
{
    static public function mdlMostrarProveedores()
    {
        $stmt = Conexion::conectar()->prepare("SELECT ID_Proveedor,Nombre,Direccion,Telefono,CorreoElectronico,acciones FROM proveedores");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function mdlAgregarProveedor($Nombre, $Direccion, $Telefono, $Correo)
    {
        if (empty($Nombre) || empty($Direccion) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            return "Error, no se pudo registrar el proveedor";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO proveedores(Nombre, Direccion, Telefono, CorreoElectronico) VALUES (:Nombre, :Direccion, :Telefono, :CorreoElectronico)");
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $Direccion, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":CorreoElectronico", $Correo, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El proveedor se registró correctamente";
        } else {
            return "Error, no se pudo registrar el proveedor";
        }
    }
    static public function mdlActualizarProveedor($Id, $Nombre, $Direccion, $Telefono, $Correo){
        if (empty($Id) || empty($Nombre) || empty($Direccion) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            return "Error, no se pudo actualizar el proveedor";
        }

        $stmt = Conexion::conectar()->prepare("UPDATE proveedores SET Nombre=:Nombre, Direccion=:Direccion, Telefono=:Telefono, CorreoElectronico=:CorreoElectronico WHERE ID_Proveedor=:id");
        $stmt->bindParam(":id", $Id, PDO::PARAM_INT);
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $Direccion, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":CorreoElectronico", $Correo, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El proveedor se actualizó correctamente";
        } else {
            return "Error, no se pudo actualizar el proveedor";
        }
    }
    static public function mdlEliminarProveedor($Id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM proveedores WHERE ID_Proveedor = :id;");
        $stmt->bindParam(":id", $Id, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                return "El proveedor se elimino correctamente";
            } else {
                return "Error, no se pudo eliminar el proveedor";
            }
        } catch (\Throwable $th) {
            return "Error, no se pudo eliminar el proveedor";
        }
    }
    static public function mdlObtenerNombreProveedor($Id){
        $stmt = Conexion::conectar()->prepare("SELECT Nombre FROM proveedores WHERE ID_Proveedor = :id;");
        $stmt->bindParam(":id", $Id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado['Nombre'];
        } else {
            return "";
        }
    }
}