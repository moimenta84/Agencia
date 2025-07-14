# 🌍 Agencia de Viajes - Proyecto Intermodular

Aplicación web desarrollada en **PHP**, **PostgreSQL**, **HTML/CSS** y **JavaScript**, que permite a los usuarios realizar reservas de viajes seleccionando país, ciudad, hotel y fechas. Incluye funcionalidades para administración, visualización y control de datos.

---

## 🛠 Tecnologías utilizadas

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Backend**: PHP 8.x
- **Base de datos**: PostgreSQL
- **Servidor**: Apache (XAMPP o similar)
- **Control de versiones**: Git

---

## 📁 Estructura del proyecto

├── assets/ # Recursos estáticos (imágenes, CSS, fuentes)
├── controllers/ # Lógica PHP (reserva, login, etc.)
├── Includes/ # Archivos comunes (conexion.php, footer.php, etc.)
├── views/ # Vistas (login, panel admin, formularios)
│ └── admin/
│ └── destiny/
│ └── reserva.php
├── index.php # Página principal
└── README.md # Este archivo

---

## 🚀 Funcionalidades principales

- 🔐 **Inicio de sesión**
- 📌 **Selección de país, ciudad y hotel** desde base de datos
- 📅 **Formulario de reserva** con validación de fechas y cálculo automático de precio
- 💾 **Inserción de reservas** en tabla `seleccionar`
- ✅ **Feedback de éxito o errores mediante sesiones**


🧑‍🏫 Autor
Iker Martínez Velasco
Proyecto Intermodular DAW
Curso 2024/2025
