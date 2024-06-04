<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar Categorías</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Gestor de Categorías
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-categoria" data-dismiss="modal">
                <i class="fas fa-plus-square"></i> Agregar Categoria</button>
        </div>
        <table id="tablaCategorias" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-dark">
                <tr>
                    <td style="width:5%;">ID</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td style="width:10%;">Estado</td>
                    <td style="width:10%;">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
</section>
<!-- Modal -->
<div class="modal fade" id="modal-gestionar-categoria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Categoria</h5>
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
                                <input type="text" name="categoria" id="txtNombre" class="form-control"
                                    placeholder="Ingrese el nombre" aria-describedby="helpId">
                                <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="txtDesc">Descripción</label>
                            <textarea name="desc" id="txtDesc" class="form-control"
                                placeholder="Ingrese una breve descripción..." aria-describedby="helpId"
                                style="resize: none;"></textarea>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="cbxEstado">Estado</label>
                            <select name="estado" id="cbxEstado" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
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

<script src="vistas/modulos/js/categorias.js?v=<?php echo rand(); ?>"></script>