var SITEURL = window.location.origin + '/ventas_sis/index.php/';
$(function () {
    $("#example1").DataTable({
    "responsive": true,
    "autoWidth": false,
    "ajax":{
        "method": "POST",
        "url": SITEURL+"Usuarios_controller/datosAjax" 
    },
    "columns":[
        {"data":'id_usuario'},
        {"data":'nombre'},
        {"data":'apaterno'},
        {"data":'amaterno'},
        {"data":'roles'},
        {"data":'correo'},
        {"data":'activo'},
        {"data":'acciones'}
        // {"data": null,
        //                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
        //                         $(nTd).html("<center><button  class='btn btn-success btn-circle remove' id='editarus'><i class='fas fa-file-signature'></i></a></td></center></button>");
        //                     }
        //             },
        // {"data": null,
        //                     "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
        //                         $(nTd).html("<center><button  class='btn btn-danger btn-circle remove' id='eliminarus'><i class='fas fa-trash-alt'></i></a></td></center></button>");
        //                     }
        //                 }
                        ],

                    createdRow: function(row, data, indice) {
                        $(row).find("#eliminarus").attr('data-id', data.id_usuario);
                        $(row).find("#editarus").attr('data-id', data.id_usuario);
                    },
    
    language: {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Pagina _PAGE_ de _PAGES_",
            "search": "Buscar:",
            "infoEmpty": "No se muestran registros",
            "infoFiltered": "(Total filtrados _MAX_ registros)",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }
  });
});

// Scrpt tablas de clientes

$(function () {
    $("#tb_clientes").DataTable({
    "responsive": true,
    "autoWidth": false,
    "ajax":{
        "method": "POST",
        "url": SITEURL+"Clientes_controller/datosAjax" 
    },
    "columns":[
        {"data":'id_cliente'},
        {"data":'nombre'},
        {"data":'apaterno'},
        {"data":'amaterno'},
        {"data":'direccion'},
        {"data":'telefono'},
        {"data":'correo'},
        {"data":'puntos'},
        {"data":'limite_credito'},
        {"data":'activo'},
        {"data":'acciones'}

        ],
            
    language: {
            "lengthMenu": "Mostrar _MENU_ Registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Pagina _PAGE_ de _PAGES_",
            "search": "Buscar:",
            "infoEmpty": "No se muestran registros",
            "infoFiltered": "(Total filtrados _MAX_ registros)",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }
  });
});

