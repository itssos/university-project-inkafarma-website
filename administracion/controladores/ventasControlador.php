<?php

class VentasControlador
{
    /*=============================================
    MOSTRAR VENTAS
    =============================================*/
    static public function ctrMostrarVentas()
    {
        $respuesta = VentasModelo::mdlMostrarVentas();
        return $respuesta;
    }

    /*=============================================
    ELIMINAR VENTA
    =============================================*/
    static public function ctrEliminarVenta($id)
    {
        $respuesta = VentasModelo::mdlEliminarVenta($id);

        if ($respuesta == "ok") {
            return "La venta ha sido eliminada correctamente";
        } else {
            return "Error, no se pudo eliminar la venta";
        }
    }
}
