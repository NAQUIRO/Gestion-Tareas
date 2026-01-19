<?php
require_once 'Database.php';

class TaskModel {
    private $db;
    private $table = 'tasks';

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $database->createTable(); // Asegurar que la tabla existe
    }

    // Obtener todas las tareas
    public function getAllTasks() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar nueva tarea
    public function addTask($title) {
        $query = "INSERT INTO " . $this->table . " (title) VALUES (:title)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        return $stmt->execute();
    }

    // Marcar tarea como completada
    public function completeTask($id) {
        $query = "UPDATE " . $this->table . " SET completed = TRUE WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Eliminar tarea
    public function deleteTask($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>