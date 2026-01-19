<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .task-form { background: #f4f4f4; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .task-form input { padding: 10px; width: 70%; margin-right: 10px; }
        .task-form button { padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 3px; }
        .task-list { list-style: none; padding: 0; }
        .task-item { background: white; padding: 15px; margin: 10px 0; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .task-item.completed { background: #d4edda; text-decoration: line-through; }
        .task-actions { margin-top: 10px; }
        .task-actions button { padding: 5px 10px; margin-right: 5px; border: none; border-radius: 3px; cursor: pointer; }
        .complete-btn { background: #28a745; color: white; }
        .delete-btn { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h1>Gestión de Tareas</h1>
    
    <div class="task-form">
        <form action="../controllers/TaskController.php?action=add" method="POST">
            <input type="text" name="title" placeholder="Nueva tarea..." required>
            <button type="submit">Agregar Tarea</button>
        </form>
    </div>

    <h2>Lista de Tareas</h2>
    <ul class="task-list">
        <?php if (empty($tasks)): ?>
            <li>No hay tareas registradas.</li>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <li class="task-item <?php echo $task['completed'] ? 'completed' : ''; ?>">
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                    <div class="task-meta">
                        <small>Creada: <?php echo $task['created_at']; ?></small>
                        <small>Estado: <?php echo $task['completed'] ? 'Completada' : 'Pendiente'; ?></small>
                    </div>
                    <div class="task-actions">
                        <?php if (!$task['completed']): ?>
                            <a href="../controllers/TaskController.php?action=complete&id=<?php echo $task['id']; ?>">
                                <button class="complete-btn">Completar</button>
                            </a>
                        <?php endif; ?>
                        <a href="../controllers/TaskController.php?action=delete&id=<?php echo $task['id']; ?>">
                            <button class="delete-btn">Eliminar</button>
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>