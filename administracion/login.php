
<?php
    session_start();
    if (isset($_SESSION["ID_Empleado"])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inkafarma | Administracion</title>

    <link rel="shortcut icon" href="vistas/assets/dist/img/logo_sistema_favicon.png" type="image/x-icon">

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.css">

    <!-- SCRIPT -->
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

    <!-- jQuery -->
    <!-- <script src="vistas/assets/plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/831507abf0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->


</head>

<body>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="https://uma.edu.pe/wp-content/uploads/2023/05/logo-inkafarma.jpg" class="brand_logo"
                            alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">

                    <form method="post">
                        <div class="col-12 title">
                            <h2><b>Intranet</b></h2>
                        </div>
                        <?php include "controladores/loginControlador.php"; ?>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control input_user" value=""
                                placeholder="ejemplo@dominio.com" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Recuerdame</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="btnSubmit" class="btn login_btn">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Coded with love by Mutiullah Samim */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #60a3bc !important;
        }

        .container {
            /* margin-top: 200px; */
        }

        .title {
            text-align: center;
            color: white;
            margin-top: -20px;
            margin-bottom: 20px;
        }

        .user_card {
            height: 400px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #f39c12;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .form_container {
            margin-top: 100px;
        }

        .login_btn {
            width: 100%;
            background: #c0392b !important;
            color: white !important;
        }

        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .login_container {
            padding: 0 2rem;
        }

        .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }

        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
    </style>

</body>

</html>