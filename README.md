# DanceWithMe - Sistema de Gestión de Clases de Baile

Aplicación web desarrollada en PHP con arquitectura MVC que permite a una academia de baile gestionar sus clases, alumnos y reservas.

Desarrollada como **Trabajo de Fin de Grado (TFG)**.

---

## Características

- **Página pública**: presentación de la academia, estilos de baile, profesores y testimonios.
- **Registro e inicio de sesión** con validación de formulario y contraseñas cifradas (bcrypt).
- **Panel de alumno**: calendario mensual con clases disponibles y sistema de reservas.
- **Panel de administrador**: gestión de reservas (aceptar/rechazar) y CRUD de clientes.
- **Control de roles**: separación entre usuarios `cliente` y `administrador`.
- Diseño **responsive** con Bootstrap 4 (pública) y Bootstrap 5 (panel privado).

---

## Tecnologías

| Capa       | Tecnología                    |
|------------|-------------------------------|
| Backend    | PHP 8.x, PDO                  |
| Base datos | MySQL (XAMPP)                 |
| Frontend   | HTML5, CSS3, Bootstrap 4/5    |
| Fuentes    | Google Fonts (Josefin Slab, Poppins) |
| Iconos     | Bootstrap Icons               |

---

## Estructura del proyecto

```
proyecto-clases-baile-copia/
├── app/
│   ├── controllers/       # Lógica de negocio (AuthController, ReservationController)
│   ├── models/            # Acceso a base de datos (UserModel, ReservationModel, ClassModel)
│   ├── routes/            # Procesadores de formularios POST
│   └── views/
│       ├── auth/          # Login y registro
│       ├── dashboard/     # Panel del alumno
│       └── admin/         # Panel del administrador
├── config/
│   ├── config.example.php # Plantilla de configuración (copiar como config.php)
│   └── config.php         # ← IGNORADO EN GIT (credenciales)
└── public/                # Punto de entrada y recursos estáticos
    ├── css/
    ├── img/
    ├── layouts/           # Header y footer compartidos
    ├── index.php
    ├── estilos.php
    ├── profesores.php
    └── who.php
```

---

## Instalación local

### Requisitos
- [XAMPP](https://www.apachefriends.org/) (PHP 8.x + MySQL)
- Navegador moderno

### Pasos

1. **Clona el repositorio** en la carpeta `htdocs` de XAMPP:
   ```bash
   git clone https://github.com/PieroCorrales/Proyecto-academia-de-baile.git
   cd Proyecto-academia-de-baile
   ```

2. **Crea la base de datos**: importa el esquema SQL en phpMyAdmin:
   - Nombre de la base de datos: `escuela_baile`

3. **Configura la conexión**: copia la plantilla y ajusta tus credenciales:
   ```bash
   cp config/config.example.php config/config.php
   ```
   Edita `config/config.php`:
   ```php
   define('BASE_URL', '/Proyecto-academia-de-baile');  // nombre de tu carpeta
   $username = 'root';
   $password = '';  // contraseña de tu MySQL
   ```

4. **Inicia XAMPP** (Apache + MySQL) y accede a:
   ```
   http://localhost/Proyecto-academia-de-baile/public/index.php
   ```

---

## Uso

### Como alumno
1. Regístrate en `/app/views/auth/register.php`
2. Inicia sesión en `/app/views/auth/login.php`
3. En tu panel, elige **Reservar clase** para ver el calendario del mes
4. Haz clic sobre una clase disponible (en verde) para reservarla
5. En **Mis reservas** puedes ver el estado de cada solicitud

### Como administrador
- Accede con un usuario de rol `administrador` (créalo directamente en BD)
- Desde el panel: acepta o rechaza reservas pendientes, edita o elimina clientes

---

## Seguridad implementada
- Consultas preparadas PDO (protección contra SQL Injection)
- Contraseñas cifradas con `password_hash()` / `password_verify()` (bcrypt)
- Control de sesiones con verificación de rol en cada ruta protegida
- Salida de mensajes escapada con `json_encode` (protección XSS)

---

## Autor

Proyecto de TFG — **Piero Corrales**

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Piero%20Corrales-0077B5?style=flat&logo=linkedin)](https://www.linkedin.com/in/piero-corrales/)
