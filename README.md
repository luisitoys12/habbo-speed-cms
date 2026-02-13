# Habbospeed CMS 🎛️🎧

CMS modular para fansites/radios Habbo con portada pública, panel administrativo y módulos de contenido.

## ✅ Estado actual del proyecto

Esta versión corrige errores críticos de ejecución y deja el CMS funcional incluso si todavía no se configuró MySQL:

- Portada operativa sin includes rotos.
- Integración de radio robusta con fallback si falla API.
- Módulos públicos (radio, noticias, eventos) con tolerancia a falla de DB.
- Dashboard admin sin fatal error cuando no hay conexión.
- Slides sin assets binarios en Git (solo HTML/CSS).

## Requisitos

- PHP 8.1+
- MySQL 5.7+ o MariaDB 10+

## Configuración rápida

1. Importa el esquema SQL desde `sql/`.
2. Define variables de entorno para DB:

```bash
export DB_HOST=127.0.0.1
export DB_PORT=3306
export DB_NAME=habbospeed
export DB_USER=root
export DB_PASSWORD=secret
```

3. (Opcional) URL de AzuraCast:

```bash
export AZURACAST_URL=https://tu-azuracast.com
```

## Ejecutar en local

```bash
php -S 0.0.0.0:8080 -t .
```

- Home: `http://localhost:8080/`
- Admin login: `http://localhost:8080/admin/login.php`

## Validación recomendada

```bash
find . -name '*.php' -print0 | xargs -0 -n1 php -l
curl -I http://localhost:8080/
curl -I http://localhost:8080/admin/login.php
```
