<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar Proveedores</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Gestor de Proveedores
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-proveedor btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-proveedor" data-dismiss="modal">
                <i class="fas fa-plus-square"></i> Agregar Proveedor</button>
        </div>
        <table id="tablaProveedores" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-dark">
                <tr>
                    <td style="width:5%;">ID</td>
                    <td>Nombre</td>
                    <td>Dirección</td>
                    <td style="width:15%;">Telefono</td>
                    <td>Correo Electrónico</td>
                    <td style="width:10%;">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
</section>
<!-- Modal -->
<div class="modal fade" id="modal-gestionar-proveedor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" id="txtId" name="id" value="">
                                <label for="txtNombre">Nombre</label>
                                <input type="text" name="nombre" id="txtNombre" class="form-control"
                                    placeholder="Ingrese el nombre">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtDirec">Direccion</label>
                                <input type="text" name="direc" id="txtDirec" class="form-control"
                                    placeholder="Ingrese una dirección">
                            </div>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <div class="form-group">
                                <label for="txtTelefono">Telefono</label>
                                <input type="text" name="telefono" id="txtTelefono" class="form-control"
                                        placeholder="Ingrese un telefono">
                            </div>
                        </div>
                        <div class="col-sm-7 mt-3">
                            <div class="form-group">
                                <label for="txtCorreo">Correo</label>
                                <input type="email" name="correo" id="txtCorreo" class="form-control"
                                        placeholder="ejemplo@dominio.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="vistas/modulos/js/proveedores.js?v=<?php echo rand(); ?>"></script>