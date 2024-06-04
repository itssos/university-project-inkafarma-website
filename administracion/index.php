<?php
session_start();
if (!isset($_SESSION["ID_Empleado"])) {
    header("Location: login.php");
}

require_once "controladores/plantillaControlador.php";

$plantilla = new PlantillaControlador();

$plantilla->Plantilla();
