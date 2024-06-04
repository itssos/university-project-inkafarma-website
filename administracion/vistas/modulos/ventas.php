<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrar Ventas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Gestor de Ventas
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-venta btnAgregar">
            <!-- <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-venta" data-dismiss="modal">
                <i class="fas fa-plus-square"></i> Agregar Venta</button> -->
        </div>
        <table id="tablaVentas" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-dark">
                <tr>
                    <td style="width:5%;">ID</td>
                    <td style="width:10%;">Cliente</td>
                    <td>Fecha</td>
                    <td style="width:5%;">Total</td>
                    <td>Detalle de Venta</td>
                    <td style="width:5%;">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</section>

<script src="vistas/modulos/js/ventas.js?v=<?php echo rand(); ?>"></script>
