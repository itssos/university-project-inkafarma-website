<?php

if (!empty($_POST["btnSubmit"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        require_once("model/LoginModel.php");

        $user = new LoginModel();

        $matrizUser = $user->getUser($email, $password);

        if ($matrizUser) {
            foreach ($matrizUser as $u) {
                $_SESSION["id"] = $u["ID_Usuario"];
                $_SESSION["name"] = $u["Nombre"];
                echo '<script>location.reload();</script>';
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Acceso denegado</div>";
        }

    } else {
        echo "<div class='alert alert-danger text-center'>Complete todos los campos</div>";
    }
}