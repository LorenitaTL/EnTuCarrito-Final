<!DOCTYPE html>
<html lang="es">
<?php $categoriaModel = new Categorias();
$lista = $categoriaModel->get();
?>

<head>
    <meta charset="gb18030">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En Tu Carrito Jerez - Comercios</title>
    <link rel="stylesheet" href="<?= URL::to("assets/bootstrap/css/bootstrap.min.css") ?>" type="text/css" />
    <link href="<?= URL::to("assets/plugins/sweetalert/sweetalert.css") ?>" rel="stylesheet" type="text/css" />
</head>

<body data-urlbase="<?= URL::base() ?>">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-dark text-white">
                <h5>En Tu Carrito</h5>
            </div>
            <div class="card-body">
                <div class="btn-group">
                    <a href="<?= URL::to('listar_comercios/jerez') ?>" type="button" class="btn btn-primary">Listar comercios</a>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCategoria">
                    Agregar categoria
                </button>
                <hr />
                <h4 class="card-title mb-4">Agregar nuevo comercio</h4>
                <form id="formComercio" action="comercios/registrar" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre (*):</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required="required" onkeyup="this.value = this.value.toUpperCase();" />
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion (*):</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="horario">Horario:</label>
                        <input type="text" class="form-control" id="horario" name="horario" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <?php
                            foreach ($lista as $key) {
                                echo '<option value="' . $key->nombre_categoria . '">' . $key->nombre_categoria . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telefono_1">Telefono 1 (*):</label>
                        <input type="text" class="form-control" id="telefono_1" name="telefono_1" />
                    </div>
                    <div class="form-group">
                        <label for="telefono_2">Telefono 2 (*):</label>
                        <input type="text" class="form-control" id="telefono_2" name="telefono_2" />
                    </div>
                    <div class="form-group">
                        <label for="disponibilidad">Disponibilidad:</label>
                        <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" />
                    </div>

                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto1" name="foto1" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto1')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto2" name="foto2" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto2')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto3" name="foto3" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto3')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto4" name="foto4" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto4')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto5" name="foto5" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto5')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto6" name="foto6" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto6')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto7" name="foto7" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto7')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto8" name="foto8" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto8')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto9" name="foto9" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto9')">
                    </div>
                    <div class="form-group row">
                        <input type="file" class="form-control col-10 m-1" id="foto10" name="foto10" />
                        <input type="button" value="Limpiar" class="col-1 btn btn-danger" onclick="setVal('#foto10')">
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formCategoria" action="categorias/registrar" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre_categoria">Nombre Categoría(*):</label>
                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required="required" />
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setVal(idInput) {
            $(idInput).val("")
        }
    </script>



    <script src="<?= URL::to("assets/plugins/jquery.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/helperForm.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/rutas.api.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/global/app.global.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/plugins/sweetalert/sweetalert.js") ?>" type="text/javascript"></script>
    <script src="<?= URL::to("assets/js/modulos/registrar.comercios.js") ?>" type="text/javascript"></script>
</body>

</html>