<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkafarma | Iniciar sesión</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/831507abf0.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        session_start();
        if (isset($_SESSION["id"])) {
            header("Location: tienda.php");
            exit;
        }
        include "assets/template/navbar.php";
    ?>


    <div class="d-flex justify-content-center align-items-center mt-5">
        <form action="" method="post" id="login-form">
            <?php include "controller/LoginController.php"; ?>
            <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
                <div class="text-center fs-1 fw-bold">Iniciar Sesión</div>
                <div class="input-group mt-5">
                    <div class="input-group-text bg-light">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <input class="form-control bg-light" type="email" name="email" id="email"
                        placeholder="ejemplo@dominio.com">
                    <div id="email-error" class="w-100"></div>
                </div>
                <div class="input-group mt-4">
                    <div class="input-group-text bg-light">
                        <i class="fa-solid fa-lock" style="color: #000000;"></i>
                    </div>
                    <input class="form-control bg-light" type="password" name="password" id="password"
                        placeholder="Contraseña">
                    <div id="password-error" class="w-100"></div>
                </div>
                <div class="d-flex justify-content-around mt-3">
                    <div class="d-flex align-items-center gap-1">
                        <input class="form-check-input" type="checkbox">
                        <div class="pt-1" style="font-size: 0.9rem">Recuérdame</div>
                    </div>
                    <div class="pt-1">
                        <a href="#" class="text-decoration-none text-info fw-semibold fst-italic"
                            style="font-size: 0.9rem">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
                <input class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" value="Enviar"
                    name="btnSubmit">

                <div class="d-flex gap-1 justify-content-center mt-3">
                    <div>¿No tienes una cuenta?</div>
                    <a href="#" class="text-decoration-none text-info fw-semibold">Regístrate</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/login.js"></script>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Inicio</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Preguntas frecuentes</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Terminos y Condiciones</a></li>
            </ul>
            <p class="text-center text-muted">© 2023 Inkafarma</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>