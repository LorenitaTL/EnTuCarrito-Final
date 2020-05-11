var vista = {
    controles: {
        formCategoria: $('#formCategoria'),
    },
    init: function () {
        vista.eventos();
    },
    eventos: function () {
        vista.controles.formCategoria.on('submit', vista.callbacks.eventos.accionesFormRegistro.ejecutar);
    },
    callbacks: {
        eventos: {
            accionesFormRegistro: {
                ejecutar: function (evento) {
                    __app.detenerEvento(evento);
                    var form = vista.controles.formCategoria;
                    var obj = form.getFormData();
                    console.log(obj);
                    vista.peticiones.registrarCategoria(obj);
                }
            }
        },
        peticiones: {
            beforeSend: function () {
                vista.controles.formCategoria.find('input,button').prop('disabled', true);
            },
            completo: function () {
                vista.controles.formCategoria.find('input,button').prop('disabled', false);
            },
            finalizado: function (respuesta) {
                if (__app.validarRespuesta(respuesta)) {
                    vista.controles.formCategoria.find('input').val('');
                    swal('Correcto', 'Se ha registrado correctamente el comercio', 'success');
                    return;
                }
                swal('Error', respuesta.mensaje, 'error');
            }
        }
    },
    peticiones: {
        registrarCategoria: function (obj) {
            __app.post(RUTAS_API.CATEGORIAS.REGISTRAR_CATEGORIA, obj)
                    .beforeSend(vista.callbacks.peticiones.beforeSend)
                    .complete(vista.callbacks.peticiones.completo)
                    .success(vista.callbacks.peticiones.finalizado)
                    .error(vista.callbacks.peticiones.finalizado)
                    .send();
        }
    }
};
$(vista.init);