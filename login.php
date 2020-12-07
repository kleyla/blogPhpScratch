<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['login'])) {
    Conexion::open_conexion();
    $validador = new ValidadorLogin(
        $_POST['email'],
        $_POST['pass'],
        Conexion::get_conexion()
    );
    if ($validador->get_error() === '' && !is_null($validador->get_usuario())) {
        //iniciar sesion
        // echo "Inicio de sesion";
        ControlSesion::iniciar_sesion(
            $validador->get_usuario()->get_id(),
            $validador->get_usuario()->get_nombre()
        );
        Redireccion::redirigir(SERVIDOR);
    } else {
        echo "Inicio de sesion fallido";
    }
    Conexion::close_conexion();
}
$titulo = "Login";

include_once 'layout/header.inc.php';
include_once 'layout/navbar.inc.php';

?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario inicio de sesion</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Iniciar sesion</h4>
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email.." <?php
                                                                                                                    if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                                                                                                                        echo 'value="' . $_POST['email'] . '"';
                                                                                                                    }
                                                                                                                    ?> required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Contrasenha:</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contrasenha.. " required>
                        </div>
                        <?php
                        if (isset($_POST['login'])) {
                            $validador->show_error();
                        }
                        ?>
                        <button type="reset" class="">
                            Limpiar datos
                        </button>
                        <button type="submit" name="login" class="btn btn-default btn-primary">
                            Iniciar sesion
                        </button>

                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="#">Olvidaste tu contrasenha?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'layout/footer.inc.php';
?>