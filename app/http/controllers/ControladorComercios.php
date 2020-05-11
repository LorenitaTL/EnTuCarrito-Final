<?php
class ControladorComercios extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        return $this->view("welcome");
    }
    public function formCrearComercio(){
        return $this->view("comercios/registrarComercio");
    }
    public function listarComerciosView(){
        return $this->view("comercios/listarComercios");
    }
    public function listarComerciosAdmin(){
        return $this->view("comercios/listarComerciosAdmin");
    }

    public function insertarComercio(Request $request){
        $comercioModel = new Comercios();
        $comercio = $comercioModel->where("nombre","=",$request->nombre)->first();
        if ($comercio) {
            return new Respuesta(EMensajes::ERROR, "El nombre del comercio ya se encuentra registrado");
        }
        $id = $comercioModel->insert($request->all());
        $v = ($id>0);
        $respuesta = new Respuesta($v ? EMensajes::INSERCION_EXITOSA : EMensajes::ERROR_INSERCION);
        $respuesta->setDatos($id);
        return $respuesta;      
    }
    public function listarComercios(){
        $comercioModel = new Comercios();
        $lista = $comercioModel->get();
        $v = count($lista);
        $respuesta = new Respuesta($v ? EMensajes::CORRECTO : EMensajes::ERROR);
        $respuesta->setDatos($lista);
        return $respuesta;
    }
    public function actualizarComercio($comercio){
        $comercioModel = new Comercios();
        $actualizados = $comercioModel->where("id_comercio","=", $comercio["id_comercio"])
        ->update($comercio);
        $v = ($actualizados > 0);
        return new Respuesta($v ? EMensajes::ACTUALIZACION_EXITOSA : EMensajes::ERROR_ACTUALIZACION);
    }
    public function eliminarComercio($id_comercio){
        $comercioModel = new Comercios();
        $eliminados = $comercioModel->where("id_comercio","=",$id_comercio)->delete();
        $v = ($eliminados > 0);
        return new Respuesta($v ? EMensajes::ELIMINACION_EXITOSA : EMensajes::ERROR_ELIMINACION);
    }
    public function buscarComercioPorId($id_comercio){
        $comercioModel = new Comercios();
        $comercio = $comercioModel->where("id_comercio", "=", $id_comercio)->first();
        $v = ($comercio != null);
        return new Respuesta($v ? EMensajes::CORRECTO : EMensajes::NO_HAY_REGISTROS);
    }
}
