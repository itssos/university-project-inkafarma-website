<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar Productos</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Gestor de Productos
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-producto btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-producto" data-dismiss="modal">
                <i class="fas fa-plus-square"></i> Agregar Producto</button>
        </div>
        <table id="tablaProductos" class="table table-striped table-bordered nowrap scroll-horizontal"
            style="width:100%;">
            <thead class="bg-dark">
                <tr>
                    <td style="width:3%;">ID</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td style="width:5px;">Ruta de Imagen</td>
                    <td style="width:5%;">Precio</td>
                    <td style="width:5%;">Stock</td>
                    <td>Categoria</td>
                    <td>Proveedor</td>
                    <td style="width:6%;">Estado</td>
                    <td style="width:6%;">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
</section>
<!-- Modal -->
<div class="modal fade" id="modal-gestionar-producto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Producto</h5>
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
                                    placeholder="Ingrese el nombre">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtDesc">Descripción</label>
                                <textarea name="desc" id="txtDesc" class="form-control" maxlength="70"
                                    placeholder="Ingrese una breve descripción..." style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtImg">Ruta de la imagen</label>
                                <input type="text" name="img" id="txtImg" class="form-control"
                                    placeholder="https://pagina.com/imagen.jpg">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtPrecio">Precio</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">S/</div>
                                    <input type="text" name="precio" id="txtPrecio" class="form-control"
                                        pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="txtStock">Stock</label>
                                <input type="number" name="stock" id="txtStock" class="form-control" placeholder="0" min="0" max="9999">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cbxEstado">Estado</label>
                                <select name="estado" id="cbxEstado" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cbxCategoria">Categoria</label>
                                <select name="categoria" id="cbxCategoria" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cbxProveedor">Proveedor</label>
                                <select name="proveedor" id="cbxProveedor" class="form-control"></select>
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

<script src="vistas/modulos/js/productos.js?v=<?php echo rand(); ?>"></script>

<style>
    .scroll-horizontal {
        overflow-x: auto !important;
    }
</style>