# Habbospeed CMS v2.5 🎮🎧

Un CMS modular para fansites Habbo, con modo mantenimiento, panel staff, integración con AzuraCast y avatares dinámicos.

## 🚀 Instalación

1. Clona el repositorio o sube los archivos a tu servidor.
2. Crea una base de datos y carga el archivo `sql/habbospeed_schema.sql`.
3. Configura `config/database.php` con tus credenciales.
4. Para activar el modo mantenimiento, crea un archivo vacío llamado `.maintenance` en la raíz.
5. Accede al panel staff en `/admin/login.php` con:
   - Usuario: `admin`
   - Contraseña: `kusito123`

## 🧩 Módulos incluidos

- `radio.php`: muestra el reproductor y DJ actual
- `noticias.php`: noticias dinámicas desde la base de datos
- `eventos.php`: próximos eventos
- `slides.php`: carrusel de imágenes

## 🛠️ Personalización

- Cambia el avatar en `mantenimiento.php` con tu nombre Habbo
- Edita el estilo en `assets/css/style.css`
- Agrega nuevos módulos en `modules/`

## 📡 Integraciones

- [Habbo API](https://www.habbo.com/api/public/users?name=Kusito)
- [AzuraCast Now Playing](https://your-radio-url.com/api/nowplaying)

## 🧠 Recomendaciones

- Usa PHP 8+ y MySQL 5.7+
- Protege el panel admin con HTTPS y sesiones seguras
- Modulariza cada sección para facilitar mantenimiento

---

Creado con 💜 por Estacionkus y Copilot.
