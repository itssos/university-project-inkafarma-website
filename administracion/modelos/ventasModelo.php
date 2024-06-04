<?php

require_once "conexionBD.php";

class VentasModelo
{
    /*=============================================
    MOSTRAR VENTAS
    =============================================*/
    static public function mdlMostrarVentas()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM ventas");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/
    static public function mdlEliminarVenta($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM ventas WHERE ID_Venta = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
