<!-- docs.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Documentación CMS Kusito</title>
  <link rel="stylesheet" href="assets/css/docs.css">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <h2>📚 Menú</h2>
      <ul>
        <li><a href="#intro">Introducción</a></li>
        <li><a href="#instalacion">Instalación</a></li>
        <li><a href="#modulos">Módulos</a></li>
        <li><a href="#insignias">Insignias</a></li>
        <li><a href="#caracolas">Caracolas</a></li>
        <li><a href="#api">API</a></li>
      </ul>
    </aside>

    <main class="content">
      <section id="intro">
        <h1>🎙️ Introducción</h1>
        <p>Este CMS está diseñado para fansites y radios como Habbospeed. Modular, visual y con el espíritu Kusito.</p>
      </section>

      <section id="instalacion">
        <h2>🛠️ Instalación</h2>
        <ol>
          <li>Sube los archivos al servidor</li>
          <li>Configura `.env` con tu base de datos</li>
          <li>Importa `database.sql`</li>
          <li>Accede a `/admin` con tu usuario</li>
        </ol>
      </section>

      <section id="modulos">
        <h2>🎛️ Módulos</h2>
        <ul>
          <li>Noticias</li>
          <li>DJs</li>
          <li>Eventos</li>
          <li>Slides</li>
          <li>Estadísticas</li>
        </ul>
      </section>

      <section id="insignias">
        <h2>🏅 Insignias</h2>
        <p>Los DJs y oyentes ganan insignias por participación. Se muestran en sus perfiles.</p>
        <table>
          <tr><th>Insignia</th><th>Requisito</th></tr>
          <tr><td>🎤 Voz Kusito</td><td>10 transmisiones</td></tr>
          <tr><td>🔥 DJ Activo</td><td>3 semanas seguidas</td></tr>
          <tr><td>🐚 Caracol VIP</td><td>100 caracolas</td></tr>
        </table>
      </section>

      <section id="caracolas">
        <h2>🐚 Caracolas</h2>
        <p>Moneda virtual que se gana por escuchar, comentar y participar.</p>
        <ul>
          <li>Se acumulan en el perfil del usuario</li>
          <li>Se usan para desbloquear insignias y contenido</li>
          <li>Ranking semanal por caracolas</li>
        </ul>
      </section>

      <section id="api">
        <h2>🔌 API</h2>
        <p>Endpoints disponibles para integraciones:</p>
        <ul>
          <li>`GET /api/djs`</li>
          <li>`GET /api/eventos`</li>
          <li>`GET /api/oyentes?ranking=caracolas`</li>
        </ul>
      </section>
    </main>
  </div>
</body>
</html>
