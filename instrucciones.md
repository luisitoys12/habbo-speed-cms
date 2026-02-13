# instrucciones.md

## Cambios realizados en esta versión

1. Se eliminó el uso de archivos binarios para slides en el repositorio.
2. Se reconstruyó `modules/slides.php` para renderizar tarjetas HTML/CSS en lugar de imágenes locales.
3. Se añadieron estilos nuevos para `slide-container` y `slide-card` en `assets/css/style.css`.
4. Se actualizaron instrucciones de `README.md` para reflejar la versión sin binarios.
5. Se mantiene toda la robustez previa: fallback de DB/APIs y dashboard tolerante a fallos.

## Requisitos o dependencias nuevas

- No se agregaron dependencias nuevas.
- Recomendado (igual que versión anterior):
  - `DB_HOST`
  - `DB_PORT`
  - `DB_NAME`
  - `DB_USER`
  - `DB_PASSWORD`
  - `AZURACAST_URL` (opcional)

## Guía paso a paso para probar la funcionalidad

1. **Configurar DB (opcional, recomendado):**
   - Importar SQL en `sql/`.
   - Definir variables de entorno de base de datos.

2. **Levantar entorno local:**

   ```bash
   php -S 0.0.0.0:8080 -t .
   ```

3. **Abrir rutas principales:**
   - Home: `http://localhost:8080/`
   - Login admin: `http://localhost:8080/admin/login.php`

4. **Checks técnicos:**

   ```bash
   find . -name '*.php' -print0 | xargs -0 -n1 php -l
   curl -I http://localhost:8080/
   curl -I http://localhost:8080/admin/login.php
   ```

5. **Resultado esperado:**
   - Todas las rutas cargan sin fatal error.
   - Módulo de slides visible sin necesidad de imágenes binarias versionadas.
   - El CMS funciona incluso sin DB (con fallback).
