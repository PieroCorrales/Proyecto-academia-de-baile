<?php
require_once __DIR__ . '/../../config/config.php';

class UserModel
{
    //todo Registra un nuevo usuario
    public function registrar($datos)
    {
        $sentencia = $GLOBALS['conexion']->prepare("INSERT INTO usuarios (nombre, apellidos, dni, email, contraseña)
                                                     VALUES (?, ?, ?, ?, ?)");
        $contraseña_segura = password_hash($datos['contraseña'], PASSWORD_DEFAULT);
        return $sentencia->execute([
            $datos['nombre'], 
            $datos['apellidos'], 
            $datos['dni'], 
            $datos['email'], 
            $contraseña_segura
        ]);
    }

    //todo Busca un usuario por email
    public function buscarPorEmail($email)
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sentencia->execute([$email]);
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    //todo Busca un usuario por ID (devolver todos los datos)
    public function buscarPorId($id)
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT id, nombre, apellidos, dni, email FROM usuarios WHERE id = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    //todo Obtiene todos los usuarios 
    public function obtenerTodosLosUsuarios()
    {
        $sentencia = $GLOBALS['conexion']->query("SELECT * FROM usuarios WHERE rol = 'cliente'");
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    //todo Elimina un usuario
    public function eliminarUsuario($id)
    {
        $sentencia = $GLOBALS['conexion']->prepare("DELETE FROM usuarios WHERE id = ?");
        return $sentencia->execute([$id]);
    }

    //todo Actualiza datos de un usuario
    public function actualizarUsuario($id, $datos)
    {
        $sentencia = $GLOBALS['conexion']->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, dni = ?, email = ? WHERE id = ?");
        return ($sentencia->execute([$datos['nombre'], $datos['apellidos'], $datos['dni'], $datos['email'], $id]));
    }
    //todo Verifica si una clase tiene espacio disponible en una fecha específica
    public function tieneEspacioDisponible($clase, $fecha)
    {
        //* Obtener la capacidad máxima de la clase
        $capacidadMaxima = $this->obtenerCapacidadClase($clase);

        if (!$capacidadMaxima) {
            return (false) ; 
        }

        //* Contar nº reservas para la clase
        $sentencia = $GLOBALS['conexion']->prepare("SELECT COUNT(*) AS total_reservas FROM reservas WHERE clase = ? AND fecha = ? AND estado = 'aceptada'");
        $sentencia->execute([$clase, $fecha]);
        $totalReservas = $sentencia->fetch(PDO::FETCH_ASSOC)['total_reservas'];
        return ($totalReservas < $capacidadMaxima);
    }

    //todo Obtener la capacidad máxima de una clase
    private function obtenerCapacidadClase($clase)
    {
        $sentencia = $GLOBALS['conexion']->prepare("SELECT capacidad_maxima FROM capacidades_clases WHERE nombre_clase = ?");
        $sentencia->execute([$clase]);
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        return ($resultado ? $resultado['capacidad_maxima'] : 0);
    }
}
