<?php
require_once 'models/Guia.php';
require_once 'Includes/auth_check.php';

class GuiaController
{
    private $modelo;

    public function __construct($conexion)
    {
        $this->modelo = new Guia($conexion);
    }

    public function index()
    {
        soloAdmin(); // protección por rol
        $guias = $this->modelo->obtenerTodos();
        require 'views/admin/guia/guias_list.php';
    }

    public function crear()
    {
        //soloAdmin();
        require 'views/administrador/secciones/guias/crear.php';
    }

    public function guardar()
    {
        soloAdmin();
        $nombre = $_POST['nombre'] ?? '';
        $idioma = $_POST['idioma'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        $this->modelo->crear($nombre, $idioma, $telefono);
        header("Location: index.php?controlador=guia&accion=index");
    }

    public function editar($id)
    {
        soloAdmin();
        $guia = $this->modelo->obtenerPorId($id);
        require 'views/admin/guia/guia_edit.php';
    }

    public function actualizar()
    {
        soloAdmin();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $idioma = $_POST['idioma'];
        $telefono = $_POST['telefono'];

        $this->modelo->actualizar($id, $nombre, $idioma, $telefono);
        header("Location: index.php?controlador=guia&accion=index");
    }

    public function eliminar($id)
    {
        soloAdmin();
        $this->modelo->eliminar($id);
        header("Location: index.php?controlador=guia&accion=index");
    }
}
