<?php

class Usuario
{

    private $id;
    private $nombre;
    private $email;
    private $password;
    private $fecha_registro;
    private $activo;

    public function __construct($id, $nombre, $email, $password, $fecha_registro, $activo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
    }

    public function get_id()
    {
        return $this->id;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_fecha()
    {
        return $this->fecha_registro;
    }
    public function get_activo()
    {
        return $this->activo;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }
    public function set_activo($activo)
    {
        $this->activo = $activo;
    }
}
