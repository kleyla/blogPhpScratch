<?php

class RepositorioUsuario
{
    public static function get_all($conexion)
    {
        $usuarios = array();
        if (isset($conexion)) {
            try {
                include_once "Usuario.inc.php";
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['email'],
                            $fila['pass'],
                            $fila['fecha_registro'],
                            $fila['activo']
                        );
                    }
                } else {
                    print "No hay resultados";
                }
            } catch (PDOException $ex) {
                print "EROOR: " . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function count_users($conexion)
    {
        $total_users = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                $total_users = $resultado['total'];
            } catch (PDOException $ex) {
                print "EROOR: " . $ex->getMessage();
            }
        }
        return $total_users;
    }
}
