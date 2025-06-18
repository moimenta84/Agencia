<?php
// models/Usuario.php

require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Conexion::getConexion();
    }

    // Registrar un nuevo usuario
    public function registrar($nombre, $email, $password, $rol = 'user') {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) 
                VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $stmt->execute([ $nombre,$email,$hash,$rol]);
    }

    // Login: verificar credenciales
    public function autenticar($email, $password) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }

    // Obtener usuario por ID
    public function obtenerPorId($id) {
        $sql = "SELECT id, nombre, email, rol FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Listar todos los usuarios
    public function listar() {
        $sql = "SELECT id, nombre, email, rol FROM usuarios ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar datos de usuario
    public function actualizar($id, $nombre, $email, $rol) {
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, rol = :rol WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([ $nombre,$email,$rol,$id ]);
    }

    // Eliminar usuario
    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
