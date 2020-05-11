<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Tu Carrito Jerez - Comercios</title>
    <link rel="stylesheet" href="<?= URL::to("assets/bootstrap/css/bootstrap.min.css") ?>" type="text/css" />
</head>

<body data-urlbase="<?= URL::base() ?>">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark text-white">
                <h5>En Tu Carrito</h5>
            </div>
            <div class="card-body">
                <div class="btn-group">
                    <a href="<?= URL::to("comercios/form/crear") ?>" class="btn btn-primary">Agregar comercio</a>
                </div>
                <hr />
                <h4 class="card-title mb-4">Listar comercios</h4>
                <table class="bg-white table-condensed tanle-hover table-striped" width="100%" id="tablaListaComercios">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Categoría</th>
                            <th>Descripcion</th>
                            <th>Horario</th>
                            <th>Teléfono 1</th>
                            <th>Teléfono 2</th>
                            <th>Disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">Consultando...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/helperForm.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/lista.comercios.admin.js") ?>" type="text/javascript"></script>
</body>

</html>