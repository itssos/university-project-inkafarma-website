<?php

require_once "../controladores/ventasControlador.php";
require_once "../modelos/ventasModelo.php";

class AjaxVentas
{
    /*=============================================
    MOSTRAR VENTAS
    =============================================*/
    public function ajaxMostrarVentas()
    {
        $respuesta = VentasControlador::ctrMostrarVentas();
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/
    public $id;

    public function ajaxEliminarVenta()
    {
        $respuesta = VentasControlador::ctrEliminarVenta($this->id);
        echo json_encode($respuesta);
    }
}

if (!isset($_POST["accion"])) {
    $mostrarVentas = new AjaxVentas();
    $mostrarVentas->ajaxMostrarVentas();
} else {
    if ($_POST["accion"] == "eliminar") {
        $eliminarVenta = new AjaxVentas();
        $eliminarVenta->id = $_POST["id"];
        $eliminarVenta->ajaxEliminarVenta();
    }
}
