<?php

class Comercios extends ModeloGenerico{
    protected $id_comercio;
    protected $nombre;
    protected $telefono_1;
    protected $telefono_2;
    protected $disponibilidad;
    protected $horario;
    protected $categoria;
    protected $direccion;
    protected $descripcion;

    public function __construct($propiedades = null)
    {
        parent::__construct("comercios", Comercios::class, $propiedades);
    }

    public function getId_comercio(){
		return $this->id_comercio;
	}

	public function setId_comercio($id_comercio){
		$this->id_comercio = $id_comercio;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getTelefono_1(){
		return $this->telefono_1;
	}

	public function setTelefono_1($telefono_1){
		$this->telefono_1 = $telefono_1;
	}

	public function getTelefono_2(){
		return $this->telefono_2;
	}

	public function setTelefono_2($telefono_2){
		$this->telefono_2 = $telefono_2;
	}

	public function getDisponibilidad(){
		return $this->disponibilidad;
	}

	public function setDisponibilidad($disponibilidad){
		$this->disponibilidad = $disponibilidad;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}




}
?>