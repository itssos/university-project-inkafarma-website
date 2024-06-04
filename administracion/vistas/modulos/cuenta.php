<?php session_start();?>

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Cuenta</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Cuenta
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<section class="content">


    <div class="container">
        <div class="modal-header">
            <h5 class="modal-title">Datos</h5>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="hidden" id="txtId" name="id" value='<?php echo $_SESSION["ID_Empleado"]; ?>'>
                            <label for="txtNombre">Nombre</label>
                            <input type="text" name="nombre" id="txtNombre" class="form-control"
                                placeholder="Ingrese el nombre" value='<?php echo $_SESSION["Nombre"]; ?>'>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="txtApellido">Apellido</label>
                            <input type="text" name="apellido" id="txtApellido" class="form-control"
                                placeholder="Ingrese el apellido" value='<?php echo $_SESSION["Apellido"]; ?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txtDNI">DNI</label>
                            <input type="text" name="dni" id="txtDNI" class="form-control" placeholder="Ingrese el DNI" value='<?php echo $_SESSION["DNI"]; ?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txtTelefono">Teléfono</label>
                            <input type="text" name="telefono" id="txtTelefono" class="form-control"
                                placeholder="Ingrese el teléfono" value='<?php echo $_SESSION["Telefono"]; ?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txtCorreo">Correo Electrónico</label>
                            <input type="email" name="correo" id="txtCorreo" class="form-control"
                                placeholder="Ingrese el correo electrónico" value='<?php echo $_SESSION["Correo"]; ?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txtPassword">Contraseña</label>
                            <input type="password" name="password" id="txtPassword" class="form-control"
                                placeholder="Ingrese la contraseña" value='<?php echo $_SESSION["Password"]; ?>'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" id="btnGuardarCuenta">Guardar</button>
        </div>
    </div>


</section>

<script src="vistas/modulos/js/empleados.js?v=<?php echo rand(); ?>"></script>