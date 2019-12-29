<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = 'Blog';

include_once 'Views/layout/header.inc.php';
include_once 'Views/layout/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1>Blog de Karen</h1>
        <p>Blog dedicado a la programacion.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="material-icons">search</i> Busqueda
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="Buscar...">
                            </div>
                            <button class="form-control">Buscar</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="material-icons">search</i> Filtro
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="material-icons">search</i> Archivo
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="material-icons">schedule</i> Ultimas entradas
                </div>
                <div class="card-body">
                    <?php
                    // include_once 'app/Conexion.inc.php';
                    // Conexion::open_conexion();
                    // Conexion::close_conexion();
                    ?>
                    <p>Aun no hay entradas.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include_once 'Views/layout/footer.inc.php';
?>