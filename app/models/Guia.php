<?php

class Guia
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function obtenerTodos()
    {
        $stmt = $this->db->query("SELECT * FROM guias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM guias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $idioma, $telefono)
    {
        $stmt = $this->db->prepare("INSERT INTO guias (nombre, idioma, telefono) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $idioma, $telefono]);
    }

    public function actualizar($id, $nombre, $idioma, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE guias SET nombre = ?, idioma = ?, telefono = ? WHERE id = ?");
        return $stmt->execute([$nombre, $idioma, $telefono, $id]);
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM guias WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
