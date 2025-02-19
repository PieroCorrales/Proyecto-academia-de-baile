/proyecto-clases-baile
│
├── /public                # Archivos públicos accesibles desde el navegador
│   ├── /css               # Estilos CSS
│   ├── /js                # Código JavaScript
│   ├── /img               # Imágenes y recursos multimedia
│   └── index.php          # Página principal (Frontend)
│
├── /app                   # Lógica del backend (PHP)
│   ├── /controllers       # Controladores (manejo de usuarios, reservas, administrador)
│   │   ├── AuthController.php      # Controlador para Registro y Login
│   │   ├── DashboardController.php # Controlador para el Inicio del usuario
│   │   └── AdminController.php     # Controlador para el Inicio del administrador
│   │
│   ├── /models            # Modelos (definición de datos y conexión a la base de datos)
│   │   ├── UserModel.php           # Modelo para usuarios
│   │   └── ReservationModel.php    # Modelo para reservas
│   │
│   ├── /views             # Vistas parciales (plantillas PHP/HTML reutilizables)
│   │   ├── /layouts       # Plantillas comunes (header, footer, sidebar)
│   │   │   ├── header.php         # Encabezado común
│   │   │   └── footer.php         # Pie de página común
│   │   │
│   │   ├── /home          # Páginas relacionadas con Home
│   │   │   └── index.php          # Contenido de la página Home
│   │   │
│   │   ├── /auth          # Páginas relacionadas con Autenticación
│   │   │   ├── register.php       # Formulario de registro
│   │   │   └── login.php          # Formulario de inicio de sesión
│   │   │
│   │   ├── /dashboard     # Páginas relacionadas con el Inicio del usuario
│   │   │   ├── profile.php        # Sección de información personal
│   │   │   └── reservations.php   # Sección de reservas realizadas
│   │   │
│   │   └── /admin         # Páginas relacionadas con el Inicio del administrador
│   │       ├── users.php          # Gestión de usuarios
│   │       └── reservations.php   # Gestión de reservas
│   │
│   └── functions.php      # Funciones globales reutilizables
│
├── /database              # Base de datos
│   ├── schema.sql         # Esquema de la base de datos
│   └── seed_data.sql      # Datos iniciales para la base de datos
│
├── /config                # Configuración global
│   └── config.php         # Variables de entorno y configuración de la base de datos
│
└── .htaccess              # Configuración del servidor Apache (opcional)