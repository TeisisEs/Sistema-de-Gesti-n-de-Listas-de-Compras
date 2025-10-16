# 🛒 ShopList Pro - Sistema de Gestión de Listas de Compras

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.34.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-3-003B57?style=for-the-badge&logo=sqlite&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind-2.2.19-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

Organiza tus compras 

</div>

---

##  Descripción

**ShopList Pro** es una aplicación web desarrollada en **Laravel 12** que permite gestionar listas de compras de manera intuitiva y profesional.  
Con una interfaz moderna construida con **Tailwind CSS**, ofrece funcionalidades completas para administrar productos, crear listas personalizadas y generar reportes en **PDF**.

---

##  Características

-  **Gestión de Productos:** Crea y administra un catálogo completo de productos con precios y descripciones.  
-  **Listas Personalizadas:** Organiza múltiples listas de compras con fechas y notas.  
-  **Control de Cantidades:** Añade productos con cantidades específicas y calcula totales automáticamente.  
-  **Exportación PDF:** Genera reportes  en PDF.  
-  **Interfaz :** Diseño responsive con gradientes y animaciones usando Tailwind CSS.  
-  **Base de Datos SQLite:** Ligera y sin necesidad de configuración compleja.  
-  **Fácil Despliegue:** Optimizado para servicios gratuitos como Render, Railway o Fly.io.  

---

##  Tecnologías Utilizadas

| Tecnología     | Versión   | Propósito                                                       |
|----------------|-----------|-----------------------------------------------------------------|
| **Laravel**    | 12.34.0   | Framework principal para el desarrollo backend en PHP.          |
| **PHP**        | 8.4.10    | Lenguaje de programación utilizado por Laravel.                 |
| **SQLite**     | 3.x       | Base de datos ligera y embebida utilizada por defecto.          |
| **Tailwind CSS** | 2.2.19  | Framework CSS para diseño moderno, responsive y minimalista.    |
| **Blade**      | -         | Motor de plantillas nativo de Laravel para vistas dinámicas.   |
| **DomPDF**     | Latest    | Librería para generar y exportar reportes en formato PDF.       |
| **Composer**   | 2.8.10    | Gestor de dependencias para proyectos PHP.                      |
| **Node.js & NPM** | 16.x+  | Compilación de recursos frontend y dependencias de desarrollo.  |


---

##  Instalación Local

### 1️. Clonar el Repositorio
```bash
git clone https://github.com/TeisisEs/Sistema-de-Gesti-n-de-Listas-de-Compras.git
cd shoplist-pro
```

### 2. Instalar Dependencias

```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node (si aplica)
npm install

```
### 3. Configurar Variables de Entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```
### 4. Configurar Base de Datos

```bash 
# Crear archivo de base de datos
# Linux / macOS:
touch database/database.sqlite

# Windows (CMD):
cd database && echo.> database.sqlite
```
Verificar que el archivo .env contenga:
```bash
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```
### 5. Ejecutar Migraciones
```bash
php artisan migrate
```
### 6. Iniciar Servidor de Desarrollo
```bash 
php artisan serve
```
La aplicación estará disponible en:
- http://localhost:8000

---
---

##  Mejoras Futuras para el proyecto

ShopList Pro seguira con nuevas funciones pensadas para una experiencia más completa.  
Entre las próximas mejoras planificadas se incluyen:

-  **Sistema Multiusuario:** Permitir que varios usuarios gestionen sus propias listas con autenticación y roles.  
-  **Autenticación Segura:** Implementación de registro, inicio de sesión y recuperación de contraseña.    
-  **Panel de Estadísticas:** Mostrar reportes de compras frecuentes y gasto total por período.   
-  **Modo Oscuro:** Personalización visual para mejorar la experiencia del usuario.  

#### *Tras la implementación del sistema multiusuario, se planea desplegar la aplicación en **Render**, aprovechando su entorno gratuito y compatibilidad con Laravel.*
---
