<?php

require_once "conexionBD.php";

class ModeloProductos
{
    static public function mdlMostrarProductos(){
        $stmt = Conexion::conectar()->prepare("SELECT ID_Producto, Nombre, Descripcion, Precio, Stock, Estado, ID_Categoria, ID_Proveedor, img FROM productos");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlAgregarProducto($Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img){
        if (empty($Nombre) || empty($Descripcion) || empty($Precio) || !is_numeric($Stock)) {
            return "Error, no se pudo registrar el producto";
        } else if ($Stock < 0) {
            return "Error, no se pudo registrar el producto";
        }

        $stmt = Conexion::conectar()->prepare("INSERT INTO productos(Nombre, Descripcion, Precio, Stock, Estado, ID_Categoria, ID_Proveedor, img) 
                                               VALUES (:Nombre, :Descripcion, :Precio, :Stock, :Estado, :ID_Categoria, :ID_Proveedor, :img)");
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":Precio", $Precio, PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $Stock, PDO::PARAM_INT);
        $stmt->bindParam(":Estado", $Estado, PDO::PARAM_INT);
        $stmt->bindParam(":ID_Categoria", $ID_Categoria, PDO::PARAM_INT);
        $stmt->bindParam(":ID_Proveedor", $ID_Proveedor, PDO::PARAM_INT);
        $stmt->bindParam(":img", $img, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El producto se registró correctamente";
        } else {
            return "Error, no se pudo registrar el producto";
        }
    }

    static public function mdlActualizarProducto($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $Estado, $ID_Categoria, $ID_Proveedor, $img){
        if (empty($Nombre) || empty($Descripcion) || !is_numeric($Stock)) {
            return "Error, no se pudo actualizar el producto";
        } else if ($Stock < 0) {
            return "Error, no se pudo actualizar el producto";
        }else if ($Precio<=0){
            return "Error, no se pudo actualizar el producto";
        }

        $stmt = Conexion::conectar()->prepare("UPDATE productos SET 
                                                Nombre=:Nombre,
                                                Descripcion=:Descripcion,
                                                Precio=:Precio,
                                                Stock=:Stock,
                                                Estado=:Estado,
                                                ID_Categoria=:ID_Categoria,
                                                ID_Proveedor=:ID_Proveedor,
                                                img =:img
                                                WHERE ID_Producto = :ID_Producto");
        $stmt->bindParam(":ID_Producto", $ID_Producto, PDO::PARAM_INT);
        $stmt->bindParam(":Nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":Precio", $Precio, PDO::PARAM_STR);
        $stmt->bindParam(":Stock", $Stock, PDO::PARAM_INT);
        $stmt->bindParam(":Estado", $Estado, PDO::PARAM_INT);
        $stmt->bindParam(":ID_Categoria", $ID_Categoria, PDO::PARAM_INT);
        $stmt->bindParam(":ID_Proveedor", $ID_Proveedor, PDO::PARAM_INT);
        $stmt->bindParam(":img", $img, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "El producto se actualizó correctamente";
        } else {
            return "Error, no se pudo actualizar el producto";
        }
    }

    static public function mdlEliminarProducto($ID_Producto){
        $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE ID_Producto = :ID_Producto");
        $stmt->bindParam(":ID_Producto", $ID_Producto, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                return "El producto se eliminó correctamente";
            } else {
                return "Error, no se pudo eliminar el producto";
            }
        } catch (\Throwable $th) {
            return "Error, no se pudo eliminar el producto";
        }
    }
}
