# Sistema de Pedidos - Restaurante

Aplicación web para gestión de pedidos de restaurante construida con Laravel 9.

## Características

- **Menú del restaurante**: Tres categorías (Menú Corriente, Menú Especial, Menú Ejecutivo)
- **Gestión de usuarios**: Registro, login y logout
- **Carrito de compras**: Añadir, eliminar y actualizar cantidad de platos
- **Sistema de pedidos**: Confirmar pago, procesar pedido y seguimiento de estado
- **Panel de administración**: 
  - Gestión de platos (crear, editar, eliminar)
  - Gestión de pedidos (ver detalles, actualizar estado)
  - Gestión de usuarios

## Requisitos

- PHP 8.0.2+
- Composer
- Laravel 9.x
- Base de datos (MySQL/SQLite)

## Instalación

```bash
# Instalar dependencias
composer install

# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Iniciar servidor
php artisan serve
```

## Estructura del proyecto

- **Modelos**: User, Plato, Pedido, DetallePedido, Carrito, CarritoItem
- **Controladores**: AdminController, MenuController, CarritoController, PedidoController, etc.
- **Vistas**: Blade templates en `resources/views/`

## Rutas principales

| Ruta | Descripción |
|------|-------------|
| `/` | Página de inicio |
| `/menu` | Ver menú completo |
| `/login` | Iniciar sesión |
| `/register` | Registrarse |
| `/carrito` | Ver carrito (requiere auth) |
| `/admin` | Panel de admin (requiere auth + rol admin) |

## Licencia

MIT License
