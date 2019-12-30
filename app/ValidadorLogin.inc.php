<?php
include_once 'RepositorioUsuario.inc.php';


class ValidadorLogin
{
    private $usuario;
    private $error;
    public function __construct($email, $pass, $conexion)
    {
        $this->error = "";
        if (!$this->variable_iniciada($email) && !$this->variable_iniciada($pass)) {
            $this->usuario = null;
            $this->error = "Debes introducir tu email y  contrasenha";
        } else {
            $this->usuario = RepositorioUsuario::get_usuario($conexion, $email);
            if (is_null($this->usuario) || !password_verify($pass, $this->usuario->get_password())) {
                $this->error = "Datos incorrectos";
            }
        }
    }
    private function variable_iniciada($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_usuario()
    {
        return $this->usuario;
    }
    public function get_error()
    {
        return $this->error;
    }
    public function show_error()
    {
        if ($this->error !== "") {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }
}
