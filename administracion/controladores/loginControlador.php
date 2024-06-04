<?php

    if (isset($_POST["btnSubmit"])){
        if(!empty($_POST["email"]) and !empty($_POST["password"])){
            $Correo = $_POST["email"];
            $Password = $_POST["password"];
            
            require_once("modelos/loginModelo.php");

            $user = new LoginEmpleado();

            $matrizUser = $user->mdlLoginEmpleado($Correo,$Password);

            if($matrizUser){
                foreach($matrizUser as $u){
                    $_SESSION["ID_Empleado"] = $u["ID_Empleado"];
                    $_SESSION["Nombre"] = $u["Nombre"];
                    $_SESSION["Apellido"] = $u["Apellido"];
                    $_SESSION["DNI"] = $u["DNI"];
                    $_SESSION["Telefono"] = $u["Telefono"];
                    $_SESSION["Correo"] = $u["Correo"];
                    $_SESSION["Password"] = $u["Password"];
                }
                header("location: index.php");
            }else{
                echo "<div class='alert alert-danger text-center'>Acceso denegado</div>";
            }
        }
    }
?>