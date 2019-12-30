<?php

class Entrada
{
    private $id;
    private $autor_id;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;

    public function __construct($id, $autor_id, $titulo, $texto, $fecha, $activa)
    {
        $this->id = $id;
        $this->autor_id = $autor_id;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->activa = $activa;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function get_autor_id()
    {
        return $this->autor_id;
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
    public function esta_activa()
    {
        return $this->activa;
    }
    public function edit_titulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function edit_texto($texto)
    {
        $this->texto = $texto;
    }
    public function edit_activa($activa)
    {
        $this->activa = $activa;
    }
}
