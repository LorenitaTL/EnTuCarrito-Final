var vista = {
    controles: {
        tbodyListaComercios: $('#prueba '),
        pagination: $('#page')
    },
    init: function () {
        vista.eventos();
        vista.peticiones.listarComercios();
    },
    eventos: function () {

    },
    callbacks: {
        eventos: {

        },
        peticiones: {
            listarComercios: {
                beforeSend: function () {
                    var tbody = vista.controles.tbodyListaComercios;
                    tbody.html(vista.utils.templates.consultando());
                },
                completo: function (respuesta) {
                    var tbody = vista.controles.tbodyListaComercios;
                    var pagination = vista.controles.pagination
                    var datos = __app.parsearRespuesta(respuesta);
                    if (datos && datos.length > 0) {
                        tbody.html('');
                        for (var i = 0; i < datos.length; i++) {
                            var dato = datos[i];
                            tbody.append(vista.utils.templates.item(dato));
                        }
                        pagination.html('<div id="pagination-container"></div>')
                        var items = $(' .list-wrapper .list-item')
                        var numItems = datos.length
                        var perPage = 6
                        console.log(numItems)
                        items.slice(perPage).hide()

                        $('#pagination-container').pagination({
                            items: numItems,
                            itemsOnPage: perPage,
                            prevText: "<",
                            nextText: ">",
                            onPageClick: function (pageNumber) {
                                var showFrom = perPage * (pageNumber - 1)
                                var showTo = showFrom + perPage
                                items.hide().slice(showFrom, showTo).show()
                            }
                        })
                    } else {
                        tbody.html(vista.utils.templates.noHayRegistros());
                    }
                }
            }
        }
    },
    peticiones: {
        listarComercios: function () {
            __app.get(RUTAS_API.COMERCIOS.LISTAR)
                .beforeSend(vista.callbacks.peticiones.listarComercios.beforeSend)
                .success(vista.callbacks.peticiones.listarComercios.completo)
                .error(vista.callbacks.peticiones.listarComercios.completo)
                .send();
        }
    },
    utils: {
        templates: {
            item: function (obj) {
                return '<div class="col-lg-3 m-2 p-0 card shadow details box list-item ' + obj.categoria + '">'
                    + '<img class="card-img-top" src="http://www.entucarrito.com/assets/images/FOTOS/' + obj.nombre + '/1.jpg" alt="Card image" style="width:100%; object-fit: fit;">'
                    + '<div class="card-body">'
                    + '<h4 class="card-title name">' + obj.nombre + '</h4>'
                    + '<h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Categoría: ' + obj.categoria + '</span></h6>'
                    + '<h6 class="text-muted"><span class="badge badge bg-light shadow-lg">Horario: ' + obj.horario + '</span></h6>'
                    + '<p class="card-text">' + obj.descripcion + '</p>'
                    + '<a href="" class="text-light" data-toggle="collapse" data-target="#detalles' + obj.id_comercio + '">Mostrar/Ocultar detalles</a>'
                    + '<div id="detalles' + obj.id_comercio + '" class="collapse detalles">'
                    + '<hr>'
                    + '<h6>Teléfono: <small>' + obj.telefono_1 + '</small></h6>'
                    + '<h6>Teléfono 2: <small>' + obj.telefono_2 + '</small></h6>'
                    + '<h6>Disponibilidad: <small>' + obj.disponibilidad + '</small></h6>'
                    + '<h6>Dirección: <small>' + obj.direccion + '</small></h6>'
                    + '</div>'
                    + '</div>'
                    + '</div>';
                /*return '<div class="col col-lg-4 col-md-6 col-sm-12 pb-3 pt-3 pb-3 box list-item '+obj.categoria+'">'
                +'<div class="card pb-3" >'
                +'<img src="http://www.entucarrito.com/assets/images/FOTOS/'+obj.nombre+'/1.jpg" class="card-img-top" alt="...">'
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
                +'<h6>Dirección: <small>'+obj.direccion+'</small></h6>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>';*/


            },
            consultando: function () {
                return '<tr><td colspan="6">Consultando...</td></tr>'
            },
            noHayRegistros: function () {
                return '<tr><td colspan="6">No hay registros...</td></tr>'
            }
        }
    }

};
$(vista.init);