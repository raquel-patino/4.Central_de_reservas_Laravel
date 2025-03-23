🏨**Proyecto de Gestión de Reservas de Hotel**

Este proyecto es una aplicación web desarrollada con Laravel 12 que permite gestionar reservas de habitaciones de hotel. Está pensado como práctica educativa para aplicar los conocimientos adquiridos en el curso de desarrollo backend con Laravel.

🚀 **Funcionalidades principales**

Gestión de reservas de habitaciones

Registro y login de usuarios

Vista de reservas activas

Cancelación y eliminación de reservas

Interfaz con Tailwind CSS


🧑‍🏫 **Acceso para el profesor**

Para facilitar la revisión del proyecto, se ha creado un usuario con las siguientes credenciales:

**Correo electrónico:** admin@gmail.com

**Contraseña:** 1234abcd


⚙️ **Requisitos**
Antes de ejecutar el proyecto, asegúrate de tener instalado:

- PHP ^8.2
- Composer
- Laravel 12
- Un servidor local como Laravel Sail, XAMPP o similar

🛠️ **Instalación y puesta en marcha**

- Clona el repositorio

- Instala las dependencias

- Copia el archivo de entorno y genera la clave de la aplicación

- Configura el archivo .env si es necesario (por ejemplo, para usar SQLite o una base de datos JSON si lo configuraste así).

- Ejecuta las migraciones y/o carga los datos si es necesario:

- Inicia el servidor de desarrollo:

php artisan serve

Abre tu navegador y accede a http://localhost:8000

También puedes acceder a la ruta que aparece en tu terminal al hacer "php artisan serve".

📂 **Estructura del proyecto**

Este proyecto sigue la arquitectura MVC de Laravel:

- Models: lógica de acceso a datos
- Views: plantillas Blade con Tailwind CSS
- Controllers: manejo de la lógica de negocio y rutas
