<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';

if (isset($_POST['enviar'])) {
    Conexion::open_conexion();
    $validador = new ValidadorRegistro(
        $_POST['nombre'],
        $_POST['email'],
        $_POST['pass'],
        $_POST['pass2'],
        Conexion::get_conexion()
    );
    if ($validador->registro_valido()) {
        // echo "Todo correcto";
        $usuario = new Usuario('', $validador->get_nombre(), $validador->get_email(), $validador->get_pass(), '', '');
        $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::get_conexion(), $usuario);
        if ($usuario_insertado) {
            //redirigir al login
        } else {
            //
        }
    }
    Conexion::close_conexion();
}
$titulo = 'Registro';

include_once 'layout/header.inc.php';
include_once 'layout/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">
                        Instrucciones
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-justify">Para unirte al blog, introduce un nombre, email y tu contrasenha. Tu email debe ser real.</p>
                    <div class="text-center">
                        <a href="#">Ya tienes cuenta?</a>
                        <br>
                        <a href="#">Olvidaste tu contrasenha?</a>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Introduce tus datos
                    </h3>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once './layout/registro_validado.inc.php';
                        } else {
                            include_once './layout/registro_vacio.inc.php';
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once 'layout/footer.inc.php';
?>