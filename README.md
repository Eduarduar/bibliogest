# 📚 BiblioGest

**BiblioGest** es una aplicación web tipo CRUD orientada a la gestión eficiente de libros, usuarios y préstamos en bibliotecas escolares. Está construida con una arquitectura **MVC modular**, reutilizando controladores y ofreciendo rutas dinámicas con autenticación básica.

---

## 🚀 Objetivo

Desarrollar un sistema funcional y educativo que permita:

* Registrar, editar, buscar y eliminar **libros**.
* Gestionar **usuarios** con roles (admin, lector).
* Controlar **préstamos y devoluciones**, incluyendo fechas límite.
* Visualizar **estadísticas clave** en un **dashboard** intuitivo.
* Fomentar el aprendizaje práctico de desarrollo web con un enfoque modular.

---

## ⚙️ Tecnologías Utilizadas

* **Frontend:** HTML, JavaScript, JQuery, TailwindCSS
* **Backend:** PHP
* **Base de datos:** PostgreSQL
* **Despliegue:** Apache (opcionalmente con VHost)

---

## 🧱 Estructura de Carpetas

```
/app
├── classes/        # Clases generales: Router, Views, DB, Autoloader
├── controllers/    # Lógica del negocio (libros, usuarios, préstamos)
├── models/         # Acceso a datos por módulo
├── views/          # Vistas específicas por sección
├── resources/
│   ├── functions/  # Funciones auxiliares
│   └── layouts/    # Cabeceras, pies y estructura del dashboard

/public
├── assets/         # Imágenes, fuentes y recursos estáticos
├── index.php       # Punto de entrada de la app
└── .htaccess       # Reescritura de URLs para rutas amigables

├── app.php         # Configuración general
└── config.php      # Parámetros y rutas
```

---

## 🛠️ Instalación y Uso
> 🗂️ **Importante:** Asegúrate de colocar el proyecto dentro de la carpeta adecuada para tu entorno local:
> - En **WAMP**: `C:/wamp64/www/`
> - En **XAMPP**: `C:/xampp/htdocs/`
> - O en el directorio raíz correspondiente de tu servidor web local (Apache/Nginx).
1. Clona el repositorio:

   ```bash
   git clone https://github.com/Eduarduar/bibliogest.git
   cd bibliogest
   ```

2. Instala TailwindCSS (si no lo tienes):

   ```bash
   npm install -D tailwindcss postcss autoprefixer
   npx tailwindcss init
   ```

3. Compila Tailwind:

   ```bash
   npx tailwindcss -i ./src/input.css -o ./public/css/output.css --watch
   ```
> 💡 Si no tienes una carpeta src/ con input.css, asegúrate de crearla o ajustar las rutas según tu configuración.

4. Configura la base de datos:

   * Abre el archivo `config.php` y ajusta las credenciales para tu base de datos PostgreSQL:
   ```bash
      'host' => 'localhost',
      'port' => '5432',
      'dbname' => 'bibliogest',
      'user' => 'tu_usuario',
      'password' => 'tu_contraseña'
   ```
5. (Opcional) Configura un Virtual Host en Apache

   * Crea una entrada en tu archivo de configuración de Apache (`httpd-vhosts.conf` o similar):

   ```bash
   <VirtualHost 127.0.0.2:80>
    DocumentRoot "C:\ruta\completa\a\bibliogest\app\public"
    DirectoryIndex index.php
    ServerName bibliogest.com
    ServerAlias www.bibliogest.com

    <Directory "C:\ruta\completa\a\bibliogest\app\public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
   </VirtualHost>

   ```

   * Luego, edita tu archivo `hosts` (en Windows: `C:\Windows\System32\drivers\etc\hosts`) y añade:
   ```bash
   127.0.0.2 bibliogest.com   
   ```



6. Accede a la aplicación:

6. Inicia el servidor y accede a la app

   * Inicia Apache desde tu panel (WAMP/XAMPP).

   * Accede a la aplicación en tu navegador:

      * Usando localhost: http://localhost/bibliogest

      * O si configuraste VHost: http://bibliogest.com

---

## ✨ Funcionalidades

* Gestión completa de libros
* Administración de usuarios por roles
* Registro de préstamos y devoluciones
* Autenticación y control de acceso
* Dashboard con métricas clave

---
## 👥 Desarrolladores

* [**Arcega Rodríguez Eduardo**](https://github.com/Eduarduar)
* [**Medina López Brisa Cristal**](https://github.com/cristaalm)