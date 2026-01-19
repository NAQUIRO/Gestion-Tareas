# Gestión de Tareas

Este es un proyecto sencillo de **Gestión de Tareas** desarrollado en PHP implementando el patrón de arquitectura **MVC (Modelo-Vista-Controlador)**. La aplicación permite a los usuarios crear, leer, actualizar (marcar como completada) y eliminar tareas de manera eficiente.

## 🚀 Características

- **Agregar Tareas**: Permite registrar nuevas tareas con un título descriptivo.
- **Listar Tareas**: Visualiza todas las tareas pendientes y completadas.
- **Marcar como Completada**: Cambia el estado de una tarea a completada.
- **Eliminar Tareas**: Borra tareas que ya no son necesarias.
- **Base de Datos**: Persistencia de datos utilizando MySQL/MariaDB.

## 🛠️ Tecnologías Utilizadas

- **Lenguaje**: PHP
- **Base de Datos**: MySQL / MariaDB
- **Arquitectura**: MVC (Modelo-Vista-Controlador)
- **Servidor Web**: Apache (XAMPP recomendado)

## 🔧 Instalación y Configuración

Sigue estos pasos para configurar el proyecto en tu entorno local:

1.  **Clonar el Repositorio**
    ```bash
    git clone https://github.com/NAQUIRO/Gesti-n-Tareas.git
    cd gestion_tareas
    ```

2.  **Configurar la Base de Datos**
    - Abre tu gestor de base de datos (e.g., phpMyAdmin).
    - Crea una nueva base de datos llamada `gestion_tareas`.
    - Importa el archivo `models/gestion_tareas.sql` incluido en el proyecto para crear la tabla necesaria.

3.  **Configurar Conexión (Opcional)**
    - El archivo `models/Database.php` contiene la configuración de conexión por defecto:
        - Host: `localhost`
        - DB Name: `gestion_tareas`
        - User: `root`
        - Password: `` (vacío)
    - Si tus credenciales de MySQL son diferentes, edita este archivo con tus datos.

## 📂 Estructura del Proyecto

```
gestion_tareas/
├── controllers/    # Controladores (Lógica de negocio)
│   └── TaskController.php
├── models/         # Modelos (Acceso a base de datos)
│   ├── Database.php
│   ├── Task.php
│   └── gestion_tareas.sql
├── views/          # Vistas (Interfaz de usuario)
│   └── task.php
└── index.php       # Punto de entrada / Redirección
```

## ✒️ Autor

**Antony Jampol Aquino Rumualdo**
