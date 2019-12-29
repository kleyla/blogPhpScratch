<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
} else {
    Redireccion::redirigir(SERVIDOR);
    // echo "No hay nombre";
}

$titulo = "Registro correcto";

include_once 'layout/header.inc.php';
include_once 'layout/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Registro correcto</h3>
                </div>
                <div class="card-body text-center">
                    <p>Gracias por registrarte <b> <?php echo $nombre ?> </b>! </p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>">Inicia sesion </a>para comenzar a usar tu cuenta</p>
                </div>
            </div>
        </div>
    </div>
</div>