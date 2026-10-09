# PHP_events

Aplicación web en PHP y MySQL para administrar eventos (CRUD).

## 1. Descripción

Permite registrar, listar, editar y eliminar eventos con nombre, fecha, hora, lugar y descripción. Está hecha con PHP nativo y la extensión `mysqli`.

## 2. Características

- Alta de eventos mediante formulario.
- Listado de eventos.
- Edición y actualización de eventos existentes.
- Eliminación de eventos.
- Script SQL para crear la base de datos y la tabla.

## 3. Tecnologías

- PHP · MySQL (`mysqli`)
- HTML · CSS

## 4. Requisitos

- PHP 7.4 o superior
- MySQL/MariaDB
- Un servidor local como XAMPP o WAMP

## 5. Configuración

1. Importa `eventos_script.txt` en MySQL para crear la base `eventos_db` y la tabla `evento`:

   | Campo | Tipo |
   |-------|------|
   | `id` | INT, AUTO_INCREMENT, PK |
   | `nombre` | VARCHAR(255) |
   | `fecha` | DATE |
   | `hora` | TIME |
   | `lugar` | VARCHAR(255) |
   | `descripcion` | VARCHAR(255), opcional |

2. Revisa los datos de conexión en `conexion.php` (servidor, usuario, clave y base de datos).

## 6. Uso

Copia la carpeta en `htdocs` (XAMPP), inicia Apache y MySQL, y abre `http://localhost/PHP_events/`.

## 7. Estructura

```
PHP_events/
├── index.php            # Menú principal (Administrador de Eventos)
├── agregar.php          # Formulario de alta
├── procesar.php         # Guarda un evento nuevo
├── mostrar.php          # Lista de eventos
├── mostrar_editar.php   # Lista para elegir el evento a editar
├── editar.php           # Formulario de edición
├── actualizar.php       # Guarda los cambios
├── eliminar.php         # Lista y elimina eventos
├── conexion.php         # Conexión a MySQL
├── estilos.css
├── eventos_script.txt   # Script SQL
└── BASE DE DATOS EVENTOS.png   # Diagrama de la base de datos
```
