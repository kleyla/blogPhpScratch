<?php
include_once 'config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario
{
    public static function insetar_comentario($conexion, $comentario)
    {
        $comentario_insertado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentarios(autor_id, entrada_id, titulo, texto, fecha) VALUES (:autor_id, :entrada_id, :titulo, :texto, NOW() ) ";
                $sentencia = $conexion->prepare($sql);
                $autor_id = $comentario->get_autor_id();
                $entrada_id = $comentario->get_entrada_id();
                $titulo = $comentario->get_titulo();
                $texto = $comentario->get_texto();
                $sentencia->bindParam(':autor_id', $autor_id, PDO::PARAM_STR);
                $sentencia->bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $texto, PDO::PARAM_STR);

                $comentario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $comentario_insertado;
    }
}
