<?php
class ControladorCategorias extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertarCategoria(Request $request)
    {
        $categoriaModel = new Categorias();
        $categoria = $categoriaModel->where("nombre_categoria", "=", $request->nombre_categoria)->first();
        if ($categoria) {
            return new Respuesta(EMensajes::ERROR, "La categoria ya se encuentra registrada");
        }
        $id = $categoriaModel->insert($request->all());
        $v = ($id>0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERCION);
        $respuesta->setDatos($id);
        return $respuesta; 
    }
    public function listarCategorias(){
        $categoriaModel = new Categorias();
        $lista = $categoriaModel->get();
        $v = count($lista);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($lista);
        return $respuesta;
    }
}
