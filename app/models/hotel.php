<?php

class Hotel
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function obtenerTodos()
    {
        $stmt = $this->db->query("SELECT * FROM hoteles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM hoteles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $direccion, $estrellas, $telefono)
    {
        $stmt = $this->db->prepare("INSERT INTO hoteles (nombre, direccion, estrellas, telefono) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $direccion, $estrellas, $telefono]);
    }

    public function actualizar($id, $nombre, $direccion, $estrellas, $telefono)
    {
        $stmt = $this->db->prepare("UPDATE hoteles SET nombre = ?, direccion = ?, estrellas = ?, telefono = ? WHERE id = ?");
        return $stmt->execute([$nombre, $direccion, $estrellas, $telefono, $id]);
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM hoteles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
