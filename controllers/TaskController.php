<?php
require_once '../models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new TaskModel();
    }

    // Mostrar todas las tareas
    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        include '../views/task.php';
    }

    // Agregar nueva tarea
    public function addTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
            $title = trim($_POST['title']);
            if (!empty($title)) {
                $this->taskModel->addTask($title);
            }
        }
        header('Location: ../index.php');
        exit();
    }

    // Completar tarea
    public function completeTask() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->taskModel->completeTask($id);
        }
        header('Location: ../index.php');
        exit();
    }

    // Eliminar tarea
    public function deleteTask() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->taskModel->deleteTask($id);
        }
        header('Location: ../index.php');
        exit();
    }
}

// Procesar las acciones
if (isset($_GET['action'])) {
    $controller = new TaskController();
    
    switch ($_GET['action']) {
        case 'add':
            $controller->addTask();
            break;
        case 'complete':
            $controller->completeTask();
            break;
        case 'delete':
            $controller->deleteTask();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller = new TaskController();
    $controller->index();
}
?>