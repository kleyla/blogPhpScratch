<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro
{
    private $aviso_inicio;
    private $aviso_cierre;

    private $nombre;
    private $email;
    private $pass;

    private $error_nombre;
    private $error_email;
    private $error_pass;
    private $error_pass2;

    public function __construct($nombre, $email, $pass, $pass2, $conexion)
    {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->pass = "";

        $this->error_nombre = $this->validar_nombre($conexion, $nombre);
        $this->error_email = $this->validar_email($conexion, $email);
        $this->error_pass = $this->validar_pass($pass);
        $this->error_pass2 = $this->validar_pass2($pass, $pass2);

        if ($this->error_pass === "" && $this->error_pass2 === "") {
            $this->pass = $pass;
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

    private function validar_nombre($conexion, $nombre)
    {
        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre de usuario";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 6) {
            return "El nombre debe ser mas de 6 caracteres";
        }
        if (strlen($nombre) > 24) {
            return "El nombre no puede ocupar mas de 24 caracteres";
        }
        if (RepositorioUsuario::nombre_existe($conexion, $nombre)) {
            return "Este nombre de usuario ya existe";
        }
        return "";
    }

    private function validar_email($conexion, $email)
    {
        if (!$this->variable_iniciada($email)) {
            return "Debes proporcionar un email";
        } else {
            $this->email = $email;
        }
        if (RepositorioUsuario::email_existe($conexion, $email)) {
            return "Este email ya esta en uso, pruebe otro email o <a href='#'>Intente recuperar su contrasenha</a>";
        }
        return "";
    }
    private function validar_pass($pass)
    {
        if (!$this->variable_iniciada($pass)) {
            return "Debes escribir una contrasenha";
        }
        return '';
    }
    private function validar_pass2($pass, $pass2)
    {
        if (!$this->variable_iniciada($pass)) {
            return "Debes escribir una contrasenha";
        }
        if (!$this->variable_iniciada($pass2)) {
            return "Debes reprtir tu contrasenha";
        }
        if ($pass !== $pass2) {
            return "Ambas contrasenhas deben coincidir";
        }
        return '';
    }

    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_pass()
    {
        return $this->pass;
    }

    public function get_error_nombre()
    {
        return $this->error_nombre;
    }
    public function get_error_email()
    {
        return $this->error_email;
    }
    public function get_error_pass()
    {
        return $this->error_pass;
    }
    public function get_error_pass2()
    {
        return $this->error_pass2;
    }

    public function show_nombre()
    {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }
    public function show_error_nombre()
    {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function show_email()
    {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }
    public function show_error_email()
    {
        if ($this->error_email !== "") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function show_error_pass()
    {
        if ($this->error_pass !== "") {
            echo $this->aviso_inicio . $this->error_pass . $this->aviso_cierre;
        }
    }
    public function show_error_pass2()
    {
        if ($this->error_pass2 !== "") {
            echo $this->aviso_inicio . $this->error_pass2 . $this->aviso_cierre;
        }
    }

    public function registro_valido()
    {
        if (
            $this->error_nombre === "" &&
            $this->error_email === "" &&
            $this->error_pass === "" &&
            $this->error_pass2 === ""
        ) {
            return true;
        } else {
            return false;
        }
    }
}
