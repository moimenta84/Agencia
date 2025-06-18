<?php
// controllers/UsuarioController.php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario(); // instancia del modelo
    }

    // Mostrar lista de usuarios (solo admin, normalmente)
    public function listar() {
        $usuarios = $this->modelo->listar();
        include '../app/views/admin/usuarios/listar.php';
    }

    // Mostrar formulario de registro
    public function mostrarFormularioRegistro() {
        include '../app/views/auth/registro.php';
    }

    // Procesar formulario de registro
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                $this->modelo->registrar($nombre, $email, $password);
                header('Location: login.php');
                exit;
            } else {
                $error = "Faltan datos obligatorios.";
                include '../app/views/auth/registro.php';
            }
        }
    }

    // Mostrar perfil de usuario (requiere sesión iniciada)
    public function verPerfil($id) {
        $usuario = $this->modelo->obtenerPorId($id);
        include '../app/views/user/perfil.php';
    }

    // Eliminar usuario (admin)
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('Location: listar_usuarios.php');
    }
}
