<?php

class Categorias extends ModeloGenerico
{
    protected $id_categoria;
    protected $nombre_categoria;

    public function __construct($propiedades = null)
    {
        parent::__construct("categorias", Categorias::class, $propiedades);
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function getNombre_categoria()
    {
        return $this->nombre_categoria;
    }

    public function setNombre_categoria($nombre_categoria)
    {
        $this->nombre_categoria = $nombre_categoria;
    }
}
