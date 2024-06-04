
$(document).ready(function () {

    $('#modal-gestionar-categoria').on('hidden.bs.modal', function () {
        $("#txtId").val("");
        $("#txtNombre").val("");
        $("#txtDesc").val("");
        $("#cbxEstado").val([1]);
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

    var table = $("#tablaCategorias").DataTable({
        "ajax": {
            "url": "ajax/categorias.ajax.php",
            "type": "POST",
            "dataSrc": ""
        },
        scrollX: true,
        "columnDefs": [
            {
                "targets": 2,
                "sortable": false
            },
            {
                "targets": 3,
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
                "targets": 4,
                "sortable": false,
                "render": function (data, type, full, meta) {
                    return "<center>" +
                        "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-categoria' data-dismiss='modal'> " +
                        "<i class='fas fa-pencil-alt'></i> " + "</button>" +
                        " <button type='button' class='btn btn-danger btn-sm btnEliminar m-0 ms-2'> " +
                        "<i class='fas fa-trash'></i> " +
                        "</button>" +
                        "</center>";
                }
            }
        ],
        "columns": [
            { "data": "ID_Categoria" },
            { "data": "Nombre" },
            { "data": "Descripcion" },
            { "data": "Estado" },
            { "data": "acciones" }
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

    $(".btn-agregar-categoria").on('click', function () {
        accion = "registrar";
    })

    $('#tablaCategorias tbody').on('click', '.btnEliminar', function () {
        var data = table.row($(this).parents('tr')).data();
        var id = data[0];
        var datos = new FormData();
        datos.append('accion', "eliminar");
        datos.append('id', id);

        swal.fire({
            title: "¡CONFIRMAR!",
            text: "¿Estas seguro que desea eliminar la categoría?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, deseo eliminar.",
            cancelButtonText: "Cancelar"
        }).then(resultado => {
            if (resultado.value) {
                $.ajax({
                    url: "ajax/categorias.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (respuesta) {
                        table.ajax.reload(null, false);

                        if (respuesta == '"Error, no se pudo eliminar la categoria"') {
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
            else {
            }
        })

    })

    $('#tablaCategorias tbody').on('click', '.btnEditar', function () {
        var data = table.row($(this).parents('tr')).data();
        accion = "actualizar";

        $('#txtId').val(data["ID_Categoria"])
        $('#txtNombre').val(data["Nombre"]);
        $('#txtDesc').val(data["Descripcion"]);
        $('#cbxEstado').val(data["Estado"]);
    })

    // GUARDAR CATEGORIA DESDE EL MODAL
    $('#btnGuardar').on('click', function () {
        var id = $('#txtId').val(),
            Nombre = $("#txtNombre").val(),
            Descripcion = $("#txtDesc").val(),
            Estado = $("#cbxEstado").val();
        if (Nombre == "" || Descripcion == "") {
            Toast.fire({
                icon: 'error',
                title: '¡Datos invalidos!'
            })
        } else {
            var datos = new FormData();
            datos.append('ID_Categoria', id);
            datos.append('Nombre', Nombre);
            datos.append('Descripcion', Descripcion);
            datos.append('Estado', Estado);
            datos.append('accion', accion)
            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Estas seguro que desea registrar la categoría?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar.",
                cancelButtonText: "Cancelar"
            }).then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: "ajax/categorias.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respuesta) {
                            $("#modal-gestionar-categoria").modal('hide');
                            table.ajax.reload(null, false);
                            $("#txtId").val("");
                            $("#txtNombre").val("");
                            $("#txtDesc").val("");
                            $("#cbxEstado").val([1]);
                            if (respuesta == '"Error, no se pudo registrar la categoria"') {
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
        }
    })
})