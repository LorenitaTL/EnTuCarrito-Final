<?php
class ModeloGenerico extends Crud
{
    private $className;
    private $excluir = ["className", "table", "conexion", "wheres", "sql", "excluir"];

    function __construct($table, $className, $propiedades = null)
    {
        parent::__construct($table);
        $this->className = $className;

        if (empty($propiedades)) {
            return;
        }

        foreach ($propiedades as $llave => $valor) {
            $this->{$llave} = $valor;
        }
    }

    protected function obtenerAtributos()
    {
        $variables = get_class_vars($this->className);
        $atributos = [];
        $max = count($variables);
        foreach ($variables as $llave => $valor) {
            if (!in_array($llave, $this->excluir)) {
                $atributos[] = $llave;
            }
        }
        return $atributos;
    }

    protected function parsear($obj = null)
    {
        try {
            $atributos = $this->obtenerAtributos();
            $objetoFinal = [];
            //Obtener el objeto desde el modelo
            if ($obj == null) {
                foreach ($atributos as $indice => $llave) {
                    if (isset($this->{$llave})) {
                        $objetoFinal[$llave] = $this->{$llave};
                    }
                }
                return $objetoFinal;
            }

            //Corregir el objeto que recibimos con los atributos del modelo
            foreach ($atributos as $indice => $llave) {
                if (isset($obj[$llave])) {
                    $objetoFinal[$llave] = $obj[$llave];
                }
            }
            return $objetoFinal;
        } catch (Exception $exc) {
            throw new Exception("Error en ". $this->className ." .parsear() =>" . $exc->getMessage());
        }
    }

    public function insert($obj = null){
        $obj = $this->parsear($obj);
        return parent::insert($obj);
    }

    public function update($obj = null){
        $obj = $this->parsear($obj);
        return parent::update($obj);
    }

    public function __get($name){
        return $this->{$name};
    }

    public function __set($nombreAtributo, $valor){
        $this->{$nombreAtributo} = $valor;
    }
}
