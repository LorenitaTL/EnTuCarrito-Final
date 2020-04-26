<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Tu Carrito Jerez - Comercios</title>
    <link rel="stylesheet" href="<?= URL::to("assets/bootstrap/css/bootstrap.min.css") ?>" type="text/css" />
    <link href="<?= URL::to("assets/plugins/sweetalert/sweetalert.css") ?>" rel="stylesheet" type="text/css"/>
</head>

<body data-urlbase="<?= URL::base() ?>">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark text-white">
                <h5>En Tu Carrito</h5>
            </div>
            <div class="card-body">
                <div class="btn-group">
                    <a href="<?= URL::base()?>">Listar comercios</a>
                </div>
                <hr />
                <h4 class="card-title mb-4">Agregar nuevo comercio</h4>
                <form id="formComercio" action="comercios/registrar" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre (*):</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion (*):</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="horario">Horario:</label>
                            <input type="text" class="form-control" id="horario" name="horario" />
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" />
                        </div>
                        <div class="form-group">
                            <label for="telefono_1">Telefono 1 (*):</label>
                            <input type="number" class="form-control" id="telefono_1" name="telefono_1" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="telefono_2">Telefono 2 (*):</label>
                            <input type="email" class="form-control" id="telefono_2" name="telefono_2" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="disponibilidad">Disponibilidad:</label>
                            <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" />
                        </div>
                        
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/js/global/helperForm.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
        <script src="<?= URL::to("assets/js/modulos/registrar.comercios.js") ?>" type="text/javascript"></script>
    </body>

</html>