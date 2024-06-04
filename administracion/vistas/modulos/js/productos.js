
$(document).ready(function () {
    $('#modal-gestionar-producto').on('hidden.bs.modal', function () {
        $("#txtId").val("");
        $("#txtNombre").val("");
        $("#txtDesc").val("");
        $("#txtPrecio").val("");
        $("#txtStock").val("");
        $("#cbxEstado").val([1]);
        $("#cbxCategoria").val([1]);
        $("#cbxProveedor").val([1]);
    });    
    var accion = "";
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    var table = $("#tablaProductos").DataTable({
        "ajax": {
            "url": "ajax/productos.ajax.php",
            "type": "POST",
            "dataSrc": ""
        },
        scrollX: true,
        "columnDefs": [
            {
                "targets": 3,
                "render": function (data, type, full, meta) {
                    return '<input type="hidden" value="'+data+'">';
                }
            },
            {
                "targets": 4,
                "render": function (data, type, full, meta) {
                    return "s/" + data;
                }
            },
            {
                "targets": 6,
                "sortable": false,
                "render": function (data, type, full, meta) {
                    var id = data;
                    var datos = new FormData();
                    datos.append('accion', "obtener_nombre_categoria");
                    datos.append('ID_Categoria', id);
                    var nombreCategoria = "";
                    $.ajax({
                        url: "ajax/categorias.ajax.php",
                        method: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: datos,
                        async: false,
                        success: function (respuesta) {
                            if (respuesta) {
                                nombreCategoria = respuesta;
                            }
                        }
                    });
                    return nombreCategoria;
                }
            },
            {
                "targets": 7,
                "sortable": false,
                "render": function (data, type, full, meta) {
                    var id = data;
                    var datos = new FormData();
                    datos.append('accion', "obtener_nombre_proveedor");
                    datos.append('ID_Proveedor', id);
                    var nombreProveedor = "";
                    $.ajax({
                        url: "ajax/proveedores.ajax.php",
                        method: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: datos,
                        async: false,
                        success: function (respuesta) {
                            if (respuesta) {
                                nombreProveedor = respuesta;
                            }
                        }
                    });
                    return nombreProveedor;
                }
            },
            {
                "targets": 8,
                "sortable": false,
                "render": function (data, type, full, meta) {
                    if (data == 1) {
                        return '<div class="bg-success text-white"><center>Activo</center></div>';
                    } else {
                        return '<div class="bg-danger text-white"><center>Inactivo</center></div>';
                    }
                }
            },
            {
                "targets": 9,
                "sortable": false,
                "render": function (data, type, full, meta) {
                    return "<center>" +
                        "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-producto' data-dismiss='modal'> " +
                        "<i class='fas fa-pencil-alt'></i> " + "</button>" +
                        " <button type='button' class='btn btn-danger btn-sm btnEliminar m-0 ms-2'> " +
                        "<i class='fas fa-trash'></i> " +
                        "</button>" +
                        "</center>";
                }
            }
        ],
        "columns": [
            { "data": "ID_Producto" },
            { "data": "Nombre" },
            { "data": "Descripcion" },
            { "data": "img" },
            { "data": "Precio" },
            { "data": "Stock" },
            { "data": "ID_Categoria" },
            { "data": "ID_Proveedor" },
            { "data": "Estado" },
            { "data": "acciones" },
        ],
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "1": "Mostrar 1 fila",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
            "decimal": ",",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "conditions": {
                    "date": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "notBetween": "No entre",
                        "notEmpty": "No Vacio",
                        "not": "Diferente de"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacio",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual que",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío",
                        "not": "Diferente de"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina en",
                        "equals": "Igual a",
                        "notEmpty": "No Vacio",
                        "startsWith": "Empieza con",
                        "not": "Diferente de"
                    },
                    "array": {
                        "not": "Diferente de",
                        "equals": "Igual",
                        "empty": "Vacío",
                        "contains": "Contiene",
                        "notEmpty": "No Vacío",
                        "without": "Sin"
                    }
                },
                "data": "Data",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d"
            },
            "select": {
                "1": "%d fila seleccionada",
                "_": "%d filas seleccionadas",
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "$d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                }
            },
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Proximo",
                "hours": "Horas",
                "minutes": "Minutos",
                "seconds": "Segundos",
                "unknown": "-",
                "amPm": [
                    "am",
                    "pm"
                ]
            },
            "editor": {
                "close": "Cerrar",
                "create": {
                    "button": "Nuevo",
                    "title": "Crear Nuevo Registro",
                    "submit": "Crear"
                },
                "edit": {
                    "button": "Editar",
                    "title": "Editar Registro",
                    "submit": "Actualizar"
                },
                "remove": {
                    "button": "Eliminar",
                    "title": "Eliminar Registro",
                    "submit": "Eliminar",
                    "confirm": {
                        "_": "¿Está seguro que desea eliminar %d filas?",
                        "1": "¿Está seguro que desea eliminar 1 fila?"
                    }
                },
                "error": {
                    "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                },
                "multi": {
                    "title": "Múltiples Valores",
                    "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                    "restore": "Deshacer Cambios",
                    "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                }
            },
            "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
        },
        responsive: "true",
        dom: 'Bfrtilp',
        buttons:[
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            }
        ]
    });

    $(".btn-agregar-producto").on('click', function () {
        accion = "agregar";
    })

    $('#tablaProductos tbody').on('click', '.btnEliminar', function () {
        var data = table.row($(this).parents('tr')).data();
        var id = data[0];
        var datos = new FormData();
        datos.append('accion', "eliminar");
        datos.append('ID_Producto', id);

        swal.fire({
            title: "¡CONFIRMAR!",
            text: "¿Estas seguro que desea eliminar el producto?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, deseo eliminar.",
            cancelButtonText: "Cancelar"
        }).then(resultado => {
            if (resultado.value) {
                $.ajax({
                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (respuesta) {
                        table.ajax.reload(null, false);

                        if (respuesta == '"Error, no se pudo eliminar el producto') {
                            var ico = 'error';
                        } else {
                            var ico = 'success';
                        }

                        Toast.fire({
                            icon: ico,
                            title: respuesta
                        })

                    }
                })
            }
        })
    })

    $('#tablaProductos tbody').on('click', '.btnEditar', function () {
        var data = table.row($(this).parents('tr')).data();
        accion = "actualizar";

        $('#txtId').val(data["ID_Producto"]);
        $('#txtNombre').val(data["Nombre"]);
        $('#txtImg').val(data["img"]);
        $('#txtDesc').val(data["Descripcion"]);
        $('#txtPrecio').val(data["Precio"]);
        $('#txtStock').val(data["Stock"]);
        $('#cbxEstado').val(data["Estado"]);
        $('#cbxCategoria').val(data["ID_Categoria"]);
        $('#cbxProveedor').val(data["ID_Proveedor"]);
    })

    // // GUARDAR CATEGORIA DESDE EL MODAL
    $('#btnGuardar').on('click', function () {
        var id = $('#txtId').val();
        var Nombre = $("#txtNombre").val();
        var img =  $('#txtImg').val();
        var Desc = $("#txtDesc").val();
        var Precio = $("#txtPrecio").val();
        var Stock = $("#txtStock").val();
        var Estado = $("#cbxEstado").val();
        var Categoria = $("#cbxCategoria").val();
        var Proveedor = $("#cbxProveedor").val();

        if (Nombre.trim() === "" || Desc.trim() === "" || Precio.trim() === "" || Stock.trim() === "") {
            Toast.fire({
                icon: 'error',
                title: '¡Datos inválidos!'
            });
        } else if (parseInt(Stock) < 0) {
            Toast.fire({
                icon: 'error',
                title: '¡El stock debe ser mayor o igual a 0!'
            });
        }else if (Precio <= 0) {
            Toast.fire({
                icon: 'error',
                title: '¡El precio debe ser mayor a 0!'
            });
        } else {
            var datos = new FormData();
            datos.append('ID_Producto', id);
            datos.append('Nombre', Nombre);
            datos.append('img', img);
            datos.append('Descripcion', Desc);
            datos.append('Precio', Precio);
            datos.append('Stock', Stock);
            datos.append('Estado', Estado);
            datos.append('ID_Categoria', Categoria);
            datos.append('ID_Proveedor', Proveedor);
            datos.append('accion', accion);

            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Estás seguro que deseas registrar el producto?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, deseo registrar.",
                cancelButtonText: "Cancelar"
            }).then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respuesta) {
                            $("#modal-gestionar-producto").modal('hide');
                            table.ajax.reload(null, false);
                            $("#txtId").val("");
                            $("#txtNombre").val("");
                            $('#txtImg').val("");
                            $("#txtDesc").val("");
                            $("#txtPrecio").val("");
                            $("#txtStock").val("");
                            $("#cbxEstado").val([1]);
                            $("#cbxCategoria").val([1]);
                            $("#cbxProveedor").val([1]);
                            var ico = (respuesta === '"Error, no se pudo registrar el producto"' || respuesta === '"Error, no se pudo actualizar el producto"') ? 'error' : 'success';
                            Toast.fire({
                                icon: ico,
                                title: respuesta
                            });
                        }
                    });
                }
            });
        }
    });


    // Obtener los nombres de las categorías
    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                var categorias = JSON.parse(respuesta);
                var options = '';
                categorias.forEach(function (categoria) {
                    options += '<option value="' + categoria.ID_Categoria + '">' + categoria.Nombre + '</option>';
                });
                $('#cbxCategoria').append(options);
            }
        }
    });
    // Obtener los nombres de los proveedores
    $.ajax({
        url: "ajax/proveedores.ajax.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                var categorias = JSON.parse(respuesta);
                var options = '';
                categorias.forEach(function (categoria) {
                    options += '<option value="' + categoria.ID_Proveedor + '">' + categoria.Nombre + '</option>';
                });
                $('#cbxProveedor').append(options);
            }
        }
    });


    function validarCorreoElectronico(correo) {
        // Expresión regular para validar el formato de correo electrónico
        var expresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return expresion.test(correo);
    }
})



// PRECIO ---------------------------

$("input[data-type='currency']").on({
    keyup: function () {
        formatCurrency($(this));
    },
    blur: function () {
        formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
