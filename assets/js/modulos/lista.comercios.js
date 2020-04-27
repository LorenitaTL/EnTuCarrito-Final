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
                return '<div class="col col-lg-4 col-md-6 col-sm-12 pb-3 pt-3 pb-3 box">'
                +'<div class="card pb-3" >'
                +'<img src="https://newwweb.com.mx/sites/default/files/2017-11/ecommerce-site.png" class="card-img-top" alt="...">'
                +'<div class="card-body ">'
                +'<h4 class="name">'+obj.nombre+'</h4>'
                +'<div class="badges">'
                +'<h5><span class="badge badge-success">Categoría: '+obj.categoria+'</span></h5>'
                +'<h5><span class="badge badge-info">Horario: '+obj.horario+'</span></h5>'
                +'</div>'
                +'<p class="card-text">'+obj.descripcion+'</p>'
                +'<a href="" class="" data-toggle="collapse" data-target="#detalles'+obj.id_comercio+'">Mostrar/Ocultar detalles</a>'
                +'<div id="detalles'+obj.id_comercio+'" class="collapse">'
                +'<hr>'
                +'<h6>Teléfono: <small>'+obj.telefono_1+'</small></h6>'
                +'<h6>Teléfono 2: <small>'+obj.telefono_2+'</small></h6>'
                +'<h6>Disponibilidad: <small>'+obj.disponibilidad+'</small></h6>'
                +'<h6>Direccion: <small>'+obj.direccion+'</small></h6>'
                +'</div>'
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