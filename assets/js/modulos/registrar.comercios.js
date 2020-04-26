var vista = {
    controles: {
        formComercio: $('#formComercio'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formComercio.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
    },
    callbacks: {
        eventos: {
            accionesFormRegistro: {
                ejecutar: function (evento) {
                    __app.detenerEvento(evento);
                    var form = vista.controles.formComercio;
                    var obj = form.getFormData();
                    console.log(obj);
                    vista.peticiones.registrarUsuario(obj);
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
                    swal('Correcto', 'Se ha registrado correctamente el comercio', 'success');
                    return;
                }
                swal('Error', respuesta.mensaje, 'error');
            }
        }
    },
    peticiones: {
        registrarUsuario: function (obj) {
            __app.post(RUTAS_API.COMERCIOS.REGISTRAR_COMERCIO, obj)
                    .beforeSend(vista.callbacks.peticiones.beforeSend)
                    .complete(vista.callbacks.peticiones.completo)
                    .success(vista.callbacks.peticiones.finalizado)
                    .error(vista.callbacks.peticiones.finalizado)
                    .send();
        }
    }
};
$(vista.init);