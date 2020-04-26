<?php
class Crud
{
    protected $table;
    protected $conexion;
    protected $wheres = "";
    protected $sql = null;

    public function __construct($table = null)
    {
        $this->conexion = (new Conexion())->conectar();
        $this->table = $table;
    }

    public function get()
    {
        try {
            $this->sql = "SELECT * FROM {$this->table} {$this->wheres}";
            $sth = $this->conexion->prepare($this->sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function first() {
        $lista = $this->get();
        if (count($lista) > 0) {
            return $lista[0];
        } else {
            return null;
        }
    }

    public function insert($obj)
    {
        try {
            $campos = implode("`, `", array_keys($obj)); //nombre`, `apellido`, `edad
            $valores = ":" . implode(", :", array_keys($obj)); //:nombre, :apellido, :edad
            $this->sql = "INSERT INTO {$this->table} (`{$campos}`) VALUES ({$valores})";
            $this->ejecutar($obj);
            $id = $this->conexion->lastInsertId();
            return $id;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function update($obj)
    {
        try {
            $campos = "";
            foreach ($obj as $llave => $valor) {
                $campos .= "`$llave`=:$llave,";
            }
            $campos = rtrim($campos, ",");
            $this->sql = "UPDATE {$this->table} SET {$campos} {$this->wheres}";
            $filasAfectadas = $this->ejecutar($obj);
            return $filasAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function delete(){
        try {
        $this->sql = "DELETE FROM {$this->table} {$this->wheres}";
        $filesAfectadas = $this->ejecutar();
        return $filesAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    public function where($llave, $condicion, $valor){
        $this->wheres .=(strpos($this->wheres, "WHERE")) ? "AND" : "WHERE";
        $this->wheres .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";
        return $this;
    }

    public function orWhere($llave, $condicion, $valor){
        $this->wheres .=(strpos($this->wheres, "WHERE")) ? "OR" : "WHERE";
        $this->wheres .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";
        return $this;
    }

    private function ejecutar($obj = null)
    {
        $sth = $this->conexion->prepare($this->sql);
        if ($obj !== null) {
            foreach ($obj as $llave => $valor) {
                if (empty($valor)) {
                    $valor = NULL;
                }
                $sth->bindValue(":$llave", $valor);
            }
        }
        $sth->execute();
        $this->reiniciarValores();
        return $sth->rowCount();
    }

    private function reiniciarValores()
    {
        $this->wheres = "";
        $this->sql = null;
    }
}
