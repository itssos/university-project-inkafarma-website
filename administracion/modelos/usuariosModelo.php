<?php
require_once "conexionBD.php";

class ModeloUsuarios
{
    static public function mdlMostrarUsuarios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT ID_Usuario, Nombre, Apellido, DNI, Direccion, Telefono, CorreoElectronico, acciones FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlAgregarUsuario($Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo)
    {
        if (empty($Nombre) || empty($Apellido) || empty($DNI) || empty($Direccion) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            return "Error, no se pudo registrar el usuario";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(Nombre, Apellido, DNI, Direccion, Telefono, CorreoElectronico) VALUES (:Nombre, :Apellido, :DNI, :Direccion, :Telefono, :CorreoElectronico)");
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Apellido", $Apellido, PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $DNI, PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $Direccion, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":CorreoElectronico", $Correo, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El usuario se registró correctamente";
        } else {
            return "Error, no se pudo registrar el usuario";
        }
    }

    static public function mdlActualizarUsuario($ID_Usuario, $Nombre, $Apellido, $DNI, $Direccion, $Telefono, $Correo)
    {
        if (empty($ID_Usuario) || empty($Nombre) || empty($Apellido) || empty($DNI) || empty($Direccion) || empty($Telefono) || empty($Correo) || !filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            return "Error, no se pudo actualizar el usuario";
        }

        $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET Nombre=:Nombre, Apellido=:Apellido, DNI=:DNI, Direccion=:Direccion, Telefono=:Telefono, CorreoElectronico=:CorreoElectronico WHERE ID_Usuario=:ID_Usuario");
        $stmt->bindParam(":ID_Usuario", $ID_Usuario, PDO::PARAM_INT);
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Apellido", $Apellido, PDO::PARAM_STR);
        $stmt->bindParam(":DNI", $DNI, PDO::PARAM_STR);
        $stmt->bindParam(":Direccion", $Direccion, PDO::PARAM_STR);
        $stmt->bindParam(":Telefono", $Telefono, PDO::PARAM_STR);
        $stmt->bindParam(":CorreoElectronico", $Correo, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El usuario se actualizó correctamente";
        } else {
            return "Error, no se pudo actualizar el usuario";
        }
    }

    static public function mdlEliminarUsuario($ID_Usuario)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE ID_Usuario = :ID_Usuario");
        $stmt->bindParam(":ID_Usuario", $ID_Usuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "El usuario se eliminó correctamente";
        } else {
            return "Error, no se pudo eliminar el usuario";
        }
    }

    static public function mdlObtenerNombreUsuario($ID_Usuario)
    {
        $stmt = Conexion::conectar()->prepare("SELECT Nombre,Apellido FROM usuarios WHERE ID_Usuario = :ID_Usuario");
        $stmt->bindParam(":ID_Usuario", $ID_Usuario, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado['Nombre'].' '.$resultado['Apellido'];
        } else {
            return "";
        }
    }
}
