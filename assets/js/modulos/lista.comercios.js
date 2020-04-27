var vista = {
    controles: {
        tbodyListaComercios: $('#prueba ')
    },
    init: function () {
        vista.eventos();
        vista.peticiones.listarComercios();
    },
    eventos: function(){

    },
    callbacks:{
        eventos:{

        },
        peticiones: {
            listarComercios: {
                beforeSend: function () {
                    var tbody = vista.controles.tbodyListaComercios;
                    tbody.html(vista.utils.templates.consultando());
                },
                completo: function (respuesta) {
                    var tbody = vista.controles.tbodyListaComercios;
                    var datos = __app.parsearRespuesta(respuesta);
                    if (datos && datos.length > 0) {
                        tbody.html('');
                        for (var i = 0; i < datos.length; i++) {
                            var dato = datos[i];
                            tbody.append(vista.utils.templates.item(dato));
                        }
                    } else {
                        tbody.html(vista.utils.templates.noHayRegistros());
                    }
                }
            }
        }
    },
    peticiones:{
        listarComercios: function () {
            __app.get(RUTAS_API.COMERCIOS.LISTAR)
                    .beforeSend(vista.callbacks.peticiones.listarComercios.beforeSend)
                    .success(vista.callbacks.peticiones.listarComercios.completo)
                    .error(vista.callbacks.peticiones.listarComercios.completo)
                    .send();
        }
    },
    utils:{
        templates:{
            item: function(obj){
                return '<div class="col pb-3 pt-3 pb-3 box">'
                +'<div class="card pb-3 align-items-center" style="width: 18rem;">'
                +'<img src="https://newwweb.com.mx/sites/default/files/2017-11/ecommerce-site.png" class="card-img-top" alt="...">'
                +'<div class="card-body">'
                +'<h5 class="name">'+obj.nombre+'</h5>'
                +'<div class="badges">'
                +'<span class="badge badge-success">'+obj.categoria+'</span>'
                +'<span class="badge badge-info">'+obj.horario+'</span>'
                +'</div>'
                +'<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus cupiditate expedita reprehenderit rerum sunt...</p>'
                +'<a href="#" target="_blank" class="btn btn-primary">Ver Detalles</a>'
                +'</div>'
                +'</div>'
                +'</div>';
                
                /*return '<tr>'
                        +'<td>'+ obj.nombre +'</td>'
                        +'<td>'+ obj.direccion +'</td>'
                        +'<td>'+ obj.categoria +'</td>'
                        +'<td>'+ obj.descripcion +'</td>'
                        +'<td>'+ obj.horario +'</td>'
                        +'<td>'+ obj.telefono_1 +'</td>'
                        +'<td>'+ obj.telefono_2 +'</td>'
                        +'<td>'+ obj.disponibilidad +'</td>'
                        +'</tr>';*/
            },
            consultando: function (){
                return '<tr><td colspan="6">Consultando...</td></tr>'
            },
            noHayRegistros:function(){
                return '<tr><td colspan="6">No hay registros...</td></tr>'
            }
        }
    }
        
};
$(vista.init);