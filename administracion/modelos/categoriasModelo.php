<?php

require_once "conexionBD.php";

class ModeloCategorias
{
    static public function mdlMostrarCategorias()
    {
        $stmt = Conexion::conectar()->prepare("SELECT ID_Categoria,Nombre,Descripcion,Estado,acciones FROM categoria");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function mdlAgregarCategoria($Nombre, $Decripcion, $Estado)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO categoria(Nombre,Descripcion,Estado) VALUES (:Nombre,:Descripcion,:Estado)");
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $Decripcion, PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $Estado, PDO::PARAM_STR);

        if ($Nombre != "" && $Decripcion != "") {
            if ($stmt->execute()) {
                return "La categoria se registro correctamente";
            } else {
                return "Error, no se pudo registrar la categoria";
            }
        } else {
            return "Error, no se pudo registrar la categoria";
        }
    }
    static public function mdlActualizarCategoria($Id, $Nombre, $Decripcion, $Estado)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE categoria SET
                                                Nombre=:Nombre,
                                                Descripcion=:Descripcion,
                                                Estado=:Estado
                                                WHERE ID_Categoria = :id");
        $stmt->bindParam(":id", $Id, PDO::PARAM_INT);
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $Decripcion, PDO::PARAM_STR);
        $stmt->bindParam(":Estado", $Estado, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "La categoria se actualizó correctamente";
        } else {
            return "Error, no se pudo actualizar la categoria";
        }
    }
    static public function mdlEliminarCategoria($Id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM categoria WHERE ID_Categoria = :id;");
        $stmt->bindParam(":id", $Id, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                return "La categoria se elimino correctamente";
            } else {
                return "Error, no se pudo eliminar la categoria";
            }
        } catch (\Throwable $th) {
            return "Error, no se pudo eliminar la categoria";
        }
    }

    static public function mdlObtenerNombreCategoria($Id){
        $stmt = Conexion::conectar()->prepare("SELECT Nombre FROM categoria WHERE ID_Categoria = :id;");
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