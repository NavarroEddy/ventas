var SITEURL = window.location.origin + '/ventas_sis/index.php/';

$("#formClientes").validate({
    rules: {
        nombre: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        apaterno: {
            required: true,
            minlength: 3
        },
        amaterno: {
            required: true,
            minlength: 3
        },
        telefono: {
            required: true,
            minlength: 1
        },
        correo: {
            required: true,
            minlength: 3
        },
        direccion: {
            required: true,
            minlength: 3,
            maxlength: 255
        }
    },
    messages: {
        nombre: {
            required: "Campo requerido",
            // email: "Ingresa correo valido",
            minlength: "Minimo 3 caracteres",
            maxlength: "Maximo 255 caracteres"
        },
        apaterno: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        amaterno: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        telefono: {
            required: "Campo requerido",
            minlength: "Minimo 1 caracteres"
        },
        correo: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        direccion: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        }
    }
});

    $('#formClientes').submit(function(event){
        if ($("#formClientes").valid()) {

        event.preventDefault();

        var datos = $("#formClientes").serialize();

        $.ajax({
            type: 'POST',
            url: SITEURL + "Clientes_controller/insertar",
            data: datos,
            dataType: "json",
            success: function(data){
                console.log(data);
                if (data.success == true) {
                //Cuando la interacción sea exitosa, se ejecutará esto.
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Guardado correctamente',
                showConfirmButton: true,
                // timer: 1500
            });
                $('#modalClientes').modal('hide')
                $("#modalClientes").find("input,select").val("");
                $('#tb_clientes').DataTable().ajax.reload();
                    // location.reload();
              }else{
                Swal.fire({
                          icon: 'error',
                          title: 'Ocurrio algo',
                          text: 'Contacte al Admin!'
                        })
              }                                  
            },
        })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Algo esta mal!',
                text: 'Verifica tu información!'
            })
        }
    });


$('body').on('click', '#eliminarcl', function() {
        var datos = $(this).data("id");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Está seguro?',
            text: "Eliminaras al usuario del sistema",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + "Clientes_controller/eliminarCliente",
                    data: {
                        id: datos
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.success == true) {
                            $('#tb_clientes').DataTable().ajax.reload();
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire('Cancelado', 'El usuario se conservo :)', 'error')
            }
        });
    });



$('body').on('click', '#editarcl', function() {
        var datos = $(this).data("id");
        $.ajax({
            type: "POST",
            url: SITEURL + "Clientes_controller/recuperar",
            data: {
                id_cliente: datos
            },
            dataType: "json",
            success: function(res) {
                if (res.success == true) {
                    console.log(res);
                    $('#modalClientesEditar').modal('show');
                    $('#id_cliente').val(res.data.id_cliente);
                    $('#nombreEd').val(res.data.nombre);
                    $('#apaternoEd').val(res.data.apaterno);
                    $('#amaternoEd').val(res.data.amaterno);
                    $('#correoEd').val(res.data.correo);
                    $('#telefonoEd').val(res.data.telefono);
                    $('#direccionEd').val(res.data.direccion);
                }
            }
        });
    });

$("#formClientesEditar").validate({
    rules: {
        nombreEd: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        apaternoEd: {
            required: true,
            minlength: 3
        },
        amaternoEd: {
            required: true,
            minlength: 3
        },
        telefonoEd: {
            required: true,
            minlength: 1
        },
        correoEd: {
            required: true,
            minlength: 3
        },
        direccionEd: {
            required: true,
            minlength: 3
        }
    },
    messages: {
        nombreEd: {
            required: "Campo requerido",
            // email: "Ingresa correo valido",
            minlength: "Minimo 3 caracteres",
            maxlength: "Maximo 255 caracteres"
        },
        apaternoEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        amaternoEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        telefonoEd: {
            required: "Campo requerido",
            minlength: "Minimo 1 caracteres"
        },
        correoEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        direccionEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
    }
});


// $("#GuardarUsuarioEd").click(function() {
    $('#formClientesEditar').submit(function(event){
        if ($("#formClientesEditar").valid()) {

        event.preventDefault();

        var datos = $("#formClientesEditar").serialize();

        $.ajax({
            type: 'POST',
            url: SITEURL + "Clientes_controller/modificar",
            data: datos,
            dataType: "json",
            success: function(data){
                console.log(data);
                if (data.success == true) {
                //Cuando la interacción sea exitosa, se ejecutará esto.
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Guardado correctamente',
                showConfirmButton: true,
                // timer: 1500
            });
                $('#modalClientesEditar').modal('hide');
                $("#modalClientesEditar").find("input,select").val("");
                $('#tb_clientes').DataTable().ajax.reload();
                    // location.reload();
              }else{
                Swal.fire({
                          icon: 'error',
                          title: 'Ocurrio algo',
                          text: 'Contacte al Admin!'
                        })
              }                                  
            },
        })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Algo esta mal!',
                text: 'Verifica tu información!'
            })
        };
    });
    // });


$('body').on('click', '#btn_activo', function() {
        var datos = $(this).data("id");

        // alert(datos);
        $.ajax({
            type: "POST",
            url: SITEURL + "Clientes_controller/desactivarUsuario",
            data: {
                id_cliente: datos
            },
            dataType: "json",
            success: function(res) {
                if (res.success == true) {
                    console.log(res);

                    $('#tb_clientes').DataTable().ajax.reload();

                }
            }
        });
    });


$('body').on('click', '#btn_inactivo', function() {
        var datos = $(this).data("id");

        // alert(datos);
        $.ajax({
            type: "POST",
            url: SITEURL + "Clientes_controller/activarUsuario",
            data: {
                id_cliente: datos
            },
            dataType: "json",
            success: function(res) {
                if (res.success == true) {
                    console.log(res);

                    $('#tb_clientes').DataTable().ajax.reload();

                }
            }
        });
    });









