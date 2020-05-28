<?php
include_once 'config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';

class RepositorioEntrada
{
    public static function insetar_entrada($conexion, $entrada)
    {
        $entrada_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO entradas(autor_id, titulo, texto, fecha, activa) VALUES (:autor_id, :titulo, :texto, NOW(), 0 ) ";
                $sentencia = $conexion->prepare($sql);
                $autor_id = $entrada->get_autor_id();
                $titulo = $entrada->get_titulo();
                $texto = $entrada->get_texto();
                $sentencia->bindParam(':autor_id', $autor_id, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $texto, PDO::PARAM_STR);

                $entrada_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $entrada_insertado;
    }
}
