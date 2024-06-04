<?php

    require_once("../model/VentasModel.php");

    $venta = new VentasModel();
    $venta->addVenta($_POST["id"],$_POST["f"],$_POST["t"],$_POST["v"],);

?>