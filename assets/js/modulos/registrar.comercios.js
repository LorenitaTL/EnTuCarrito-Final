var vista = {
    controles: {
        formComercio: $('#formComercio'),
        formCategoria: $('#formCategoria'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formComercio.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
        vista.controles.formCategoria.on('submit', vista.callbacks.eventos.accionesFormCategoria.ejecutar)
    },
    callbacks: {
        eventos: {
            accionesFormRegistro: {

                ejecutar: function (evento) {

                    send()
                    __app.detenerEvento(evento);
                    var form = vista.controles.formComercio;
                    var obj = form.getFormData();
                    console.log(obj);
                    vista.peticiones.registrarComercio(obj);
                }
            },
            accionesFormCategoria: {
                ejecutar: function (evento) {
                    __app.detenerEvento(evento)
                    var formCat = vista.controles.formCategoria
                    var objCat = formCat.getFormData()
                    console.log(objCat)
                    vista.peticiones.registrarCategoria(objCat)
                }
            }
        },
        peticiones: {
            beforeSend: function () {
                vista.controles.formComercio.find('input,button').prop('disabled', true);
            },
            completo: function () {
                vista.controles.formComercio.find('input,button').prop('disabled', false);
            },
            finalizado: function (respuesta) {
                if (__app.validarRespuesta(respuesta)) {
                    vista.controles.formComercio.find('input').val('');
                    vista.controles.formComercio.find('textarea').val('');
                    //swal('Correcto', 'Se ha registrado correctamente el comercio', 'success');
                    swal({ title: 'Correcto', text: 'Se ha registrado correctamente el comercio', type: "success" },
                        function () {
                            location.reload();
                        }
                    );
                    return;
                }
                //swal('Error', respuesta.mensaje, 'error');
                swal({ title: 'Error', text: respuesta.mensaje, type: "error" },
                    function () {
                        location.reload();
                    }
                );
            },

            beforeSendCat: function () {
                vista.controles.formCategoria.find('input,button').prop('disabled', true);
            },
            completoCat: function () {
                vista.controles.formCategoria.find('input,button').prop('disabled', false);
            },
            finalizadoCat: function (respuesta) {
                if (__app.validarRespuesta(respuesta)) {
                    vista.controles.formCategoria.find('input').val('');
                    //swal('Correcto', 'Se ha registrado correctamente la categoria', 'success');
                    swal({ title: 'Correcto', text: 'Se ha registrado correctamente la categoria', type: "success" },
                        function () {
                            location.reload();
                        }
                    );
                    return;
                }
                //swal('Error', respuesta.mensaje, 'error');
                swal({ title: 'Error', text: respuesta.mensaje, type: "error" },
                    function () {
                        location.reload();
                    }
                );
            },


        }
    },
    peticiones: {
        registrarComercio: function (obj) {
            __app.post(RUTAS_API.COMERCIOS.REGISTRAR_COMERCIO, obj)
                .beforeSend(vista.callbacks.peticiones.beforeSend)
                .complete(vista.callbacks.peticiones.completo)
                .success(vista.callbacks.peticiones.finalizado)
                .error(vista.callbacks.peticiones.finalizado)
                .send();
        },
        registrarCategoria: function (obj) {
            __app.post(RUTAS_API.CATEGORIAS.REGISTRAR_CATEGORIA, obj)
                .beforeSend(vista.callbacks.peticiones.beforeSendCat)
                .complete(vista.callbacks.peticiones.completoCat)
                .success(vista.callbacks.peticiones.finalizadoCat)
                .error(vista.callbacks.peticiones.finalizadoCat)
                .send()
        },
    },
};
$(vista.init);

function send() {
    var fd = new FormData(document.getElementById("formComercio"));
    console.log("Datos")
    for (var value of fd.values()) {
        console.log(value);
    }
    var json = JSON.stringify(Object.fromEntries(fd))
    console.log(json)
    $.ajax({
        url: 'http://localhost/EnTuCarrito-Final/app/http/controllers/UploadImages.php',
        type: 'POST',
        data: fd,
        contentType: false,
        cache: false,
        processData: false,

        /*success: function(response) {
            $("#result").html(response);
        }*/
    });
}