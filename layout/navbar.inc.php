<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion::open_conexion();
$total_usuarios = RepositorioUsuario::count_users(Conexion::get_conexion());
// echo count($total_usuarios);
Conexion::close_conexion();

if (isset($_POST['salir'])) {
    ControlSesion::cerrar_sesion();
    Redireccion::redirigir(SERVIDOR);
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="<?php echo SERVIDOR ?>">Mi sitio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo RUTA_ENTRADA ?>">Entradas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_FAVORITOS ?>">Favoritos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_AUTORES ?>">Autores</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">

                <?php if (ControlSesion::sesion_iniciada()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_LOGIN ?>">
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Entradas</a>
                            <a class="dropdown-item" href="#">Comentarios</a>
                            <a class="dropdown-item" href="#">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <button class="btn btn-default" type="submit" name="salir" id="salir">
                                    <a class="dropdown-item">Salir</a>
                                </button>
                            </form>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="material-icons">group</i>
                            <?php
                            echo $total_usuarios;
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_LOGIN ?>">
                            <i class="material-icons">arrow_forward</i>
                            Iniciar sesion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_REGISTRO ?>">
                            <i class="material-icons">add</i>
                            Registro
                        </a>
                    </li>
                <?php } ?>

            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </div>

</nav>