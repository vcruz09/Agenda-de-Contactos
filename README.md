# 📒 Agenda de Contactos

Una aplicación web desarrollada con Laravel para gestionar contactos personales o profesionales. Permite crear, editar, clasificar por categorías, recibir recordatorios y contactar directamente por WhatsApp.

![Laravel](https://img.shields.io/badge/Built%20With-Laravel-red?style=for-the-badge&logo=laravel)
![MySQL](https://img.shields.io/badge/Database-MySQL-blue?style=for-the-badge&logo=mysql)
![Status](https://img.shields.io/badge/Status-Activo-brightgreen?style=for-the-badge)

---

## ✨ Funcionalidades

- 📇 Gestión de Contactos: crear, editar, eliminar y ver detalles.
- 👁️ Ver detalles del contacto al hacer clic en su foto.
- 🏷️ Categorías para organizar los contactos.
- 🔔 Notificaciones automáticas al registrar contactos.
- 📅 Historial de notificaciones con fecha y hora.
- ✅ Marcar notificaciones como leídas.
- 📤 Enviar mensajes por WhatsApp directamente desde la app.
- 🔙 Botón de "Cancelar" para regresar a la lista sin guardar.
- 💾 Base de datos MySQL.
- 🖼️ Subida de fotos y notas opcionales por contacto.

---

## ⚙️ Tecnologías

- Laravel 10
- MySQL
- Bootstrap 5
- Blade (motor de plantillas)
- JavaScript
- FontAwesome

---

## 🚀 Demo

👉 [Enlace en línea (si tienes uno en Render, Vercel o similar)](https://ejemplo.com)

---

## ⚙️ Requisitos

- PHP ^8.1
- Composer
- Laravel ^10
- MySQL o MariaDB
- Node.js y NPM (para compilar assets)

---

## 🛠 Instalación

```bash
# 1. Clona este repositorio
git clone https://github.com/tuusuario/Agenda-de-contactos.git

# 2. Instala dependencias PHP
composer install
npm install

# 3. Copia el archivo de entorno
cp .env.example .env

# 4. Genera la clave de la app
php artisan key:generate

# 5. Configura tu conexión MySQL en .env

# 6. Ejecuta las migraciones
php artisan migrate

# 7. Instala dependencias frontend
npm install && npm run dev

# 8. Inicia el servidor
php artisan serve

# 9. Crea el enlace simbólico para acceder a las fotos
php artisan storage:link

# WhatsApp Integración
# Esta app permite enviar mensajes directamente a través de WhatsApp Web usando:
https://wa.me/57{telefono}?text=Mensaje personalizado
# Cada usuario puede usar su propio WhatsApp, ya que el envío se hace mediante una ventana nueva en el navegador.

## 👨‍💻 Autor

Desarrollado por [Tu Nombre](https://github.com/tuusuario) como parte de mi portafolio profesional.  
¡Gracias por visitar este repositorio!

## 🧱 Sobre Laravel

Esta app está construida con [Laravel](https://laravel.com), un framework PHP elegante y robusto.

## 📝 Licencia

Este proyecto está bajo la licencia MIT.
