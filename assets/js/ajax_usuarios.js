var SITEURL = window.location.origin + '/ventas_sis/index.php/';
$("#formUsuarios").validate({
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
        rol: {
            required: true,
            minlength: 1
        },
        correo: {
            required: true,
            minlength: 3
        },
        contraseña: {
            required: true,
            minlength: 3
        },
        confirmcontraseña: {
            required: true,
            minlength: 3,
            equalTo: "#contraseña"
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
        rol: {
            required: "Campo requerido",
            minlength: "Minimo 1 caracteres"
        },
        correo: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        contraseña: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        confirmcontraseña: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres",
            equalTo: "Por favor, introduzca el mismo valor de nuevo"
        }
    }
});
$('#formUsuarios').submit(function(event) {
    if ($("#formUsuarios").valid()) {
        event.preventDefault();
        var datos = $("#formUsuarios").serialize();
        var correo = $('#correo').val();
        $.ajax({
            type: 'POST',
            url: SITEURL + "Usuarios_controller/consultar",
            data: {
                'correo': JSON.stringify(correo)
            },
            // dataType: "json",
            success: function(data) {
                console.log(data);
                if (data == '0') {
                    //Cuando la interacción sea exitosa, se ejecutará esto.
                    $.ajax({
                        type: 'POST',
                        url: SITEURL + "Usuarios_controller/insertar",
                        data: datos,
                        dataType: "json",
                        success: function(data) {
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
                                $('#modalUsuarios').modal('hide')
                                $("#modalUsuarios").find("input,select").val("");
                                $('#example1').DataTable().ajax.reload();
                                // location.reload();
                            } else {
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
                        title: 'Error',
                        text: 'El correo ya esta registrado en el sistema!'
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
$('body').on('click', '#eliminarus', function() {
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
                url: SITEURL + "Usuarios_controller/eliminarUsuario",
                data: {
                    id: datos
                },
                dataType: "json",
                success: function(res) {
                    if (res.success == true) {
                        $('#example1').DataTable().ajax.reload();
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
$('body').on('click', '#editarus', function() {
    var datos = $(this).data("id");
    $.ajax({
        type: "POST",
        url: SITEURL + "Usuarios_controller/recuperar",
        data: {
            id_usuario: datos
        },
        dataType: "json",
        success: function(res) {
            if (res.success == true) {
                console.log(res);
                $('#modalUsuariosEditar').modal('show');
                $('#id_usuario').val(res.data.id_usuario);
                $('#nombreEd').val(res.data.nombre);
                $('#apaternoEd').val(res.data.apaterno);
                $('#amaternoEd').val(res.data.amaterno);
                $('#rolEd').val(res.data.id_rol);
                $('#correoEd').val(res.data.correo);
            }
        }
    });
});
$("#formUsuariosEditar").validate({
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
        rolEd: {
            required: true,
            minlength: 1
        },
        correoEd: {
            required: true,
            minlength: 3
        },
        contraseñaEd: {
            required: false,
            minlength: 3
        },
        confirmcontraseñaEd: {
            required: false,
            minlength: 3,
            equalTo: "#contraseñaEd"
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
        rolEd: {
            required: "Campo requerido",
            minlength: "Minimo 1 caracteres"
        },
        correoEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        contraseñaEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres"
        },
        confirmcontraseñaEd: {
            required: "Campo requerido",
            minlength: "Minimo 3 caracteres",
            equalTo: "Por favor, introduzca el mismo valor de nuevo"
        },
    }
});
// $("#GuardarUsuarioEd").click(function() {
$('#formUsuariosEditar').submit(function(event) {
    if ($("#formUsuariosEditar").valid()) {
        event.preventDefault();
        var datos = $("#formUsuariosEditar").serialize();
        $.ajax({
            type: 'POST',
            url: SITEURL + "Usuarios_controller/modificar",
            data: datos,
            dataType: "json",
            success: function(data) {
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
                    $('#modalUsuariosEditar').modal('hide');
                    $("#modalUsuariosEditar").find("input,select").val("");
                    $('#example1').DataTable().ajax.reload();
                    // location.reload();
                } else {
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
        url: SITEURL + "Usuarios_controller/desactivarUsuario",
        data: {
            id_usuario: datos
        },
        dataType: "json",
        success: function(res) {
            if (res.success == true) {
                console.log(res);
                $('#example1').DataTable().ajax.reload();
            }
        }
    });
});
$('body').on('click', '#btn_inactivo', function() {
    var datos = $(this).data("id");
    // alert(datos);
    $.ajax({
        type: "POST",
        url: SITEURL + "Usuarios_controller/activarUsuario",
        data: {
            id_usuario: datos
        },
        dataType: "json",
        success: function(res) {
            if (res.success == true) {
                console.log(res);
                $('#example1').DataTable().ajax.reload();
            }
        }
    });
});

function getData() {
    $.ajax({
        type: "POST",
        url: SITEURL + "Usuarios_controller/get_roles",
        async: false,
        dataType: "json",
        data: {},
        success: function(e) {
            // alert(e);
            // var obj = jQuery.parseJSON(e);
            $.each(e, function(key, value) {
                // console.log(value);
                // console.log(value);
                $.each(value, function(k, v) {
                    // console.log(v.);
                    // console.log(v);
                    $("#rol").append('<option value=' + v.id_rol + '>' + v.roles + '</option>');
                    $("#rolEd").append('<option value=' + v.id_rol + '>' + v.roles + '</option>');
                });
            });
        },
        error: function(data) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se a podido contactar al servidor, algunos datos podrian no estar disponibles!'
                // footer: '<a href>Why do I have this issue?</a>'
            })
        }
    });
}