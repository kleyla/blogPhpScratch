<?php

class Comentario
{
    private $id;
    private $autor_id;
    private $entrada_id;
    private $titulo;
    private $texto;
    private $fecha;

    public function __construct($id, $autor_id, $entrada_id, $titulo, $texto, $fecha)
    {
        $this->id = $id;
        $this->autor_id = $autor_id;
        $this->entrada_id = $entrada_id;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function get_autor_id()
    {
        return $this->autor_id;
    }
    public function get_entrada_id()
    {
        return $this->entrada_id;
    }
    public function get_titulo()
    {
        return $this->titulo;
    }
    public function get_texto()
    {
        return $this->texto;
    }
    public function get_fecha()
    {
        return $this->fecha;
    }

    public function edit_titulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function edit_texto($texto)
    {
        $this->texto = $texto;
    }
}
