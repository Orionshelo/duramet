# 🚀 Guía de Despliegue Gratuito para Duramet

Esta guía te muestra cómo publicar tu sitio web Duramet completamente gratis, incluyendo frontend y base de datos.

---

## 📋 Resumen de Opciones Recomendadas

| Componente | Opción 1 (Recomendada) | Opción 2 | Opción 3 |
|---|---|---|---|
| **Frontend + PHP** | Render.com | Railway.app | InfinityFree |
| **Base de datos** | Supabase (PostgreSQL) | Neon.tech (PostgreSQL) | TiDB Cloud (MySQL) |
| **Dominio** | `.onrender.com` gratis | `.up.railway.app` gratis | `.rf.gd` gratis |

---

## 🏆 OPCIÓN 1: Render + Supabase (RECOMENDADA)

### Paso 1: Preparar el proyecto para Render

1. **Crear archivo `render.yaml`** en la raíz del proyecto:
```yaml
services:
  - type: web
    name: duramet
    env: php
    buildCommand: ""
    startCommand: nginx; php-fpm -F
    envVars:
      - key: DATABASE_URL
        sync: false
      - key: DB_HOST
        sync: false
      - key: DB_USER
        sync: false
      - key: DB_PASS
        sync: false
      - key: DB_NAME
        sync: false
```

2. **Crear archivo `nginx.conf`** en la raíz:
```nginx
server {
    listen 80;
    server_name _;
    root /var/www/html;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

3. **Crear archivo `php-fpm.conf`**:
```ini
[www]
user = www-data
group = www-data
listen = /var/run/php/php-fpm.sock
listen.owner = www-data
listen.group = www-data
pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
```

4. **Crear archivo `composer.json`** (si no existe):
```json
{
    "name": "duramet/web",
    "description": "Duramet - Metalización y Metalmecánica",
    "type": "project",
    "require": {
        "php": ">=8.0"
    }
}
```

### Paso 2: Configurar Supabase (Base de datos gratuita)

1. Ve a https://supabase.com y crea una cuenta gratuita
2. Crea un nuevo proyecto:
   - Nombre: `duramet`
   - Contraseña de BD: (guárdala segura)
   - Región: elige la más cercana a Colombia (US East o similar)
3. Espera a que se cree la base de datos (~2 minutos)
4. Ve a **Settings > Database** y copia los datos de conexión:
   - Host: `db.xxxxxx.supabase.co`
   - User: `postgres`
   - Password: (la que configuraste)
   - Database: `postgres`
   - Port: `5432`

5. **Ejecutar el SQL de migración** en el SQL Editor de Supabase:

```sql
-- Crear tabla de equipos (adaptada a PostgreSQL)
CREATE TABLE IF NOT EXISTS equipos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    categoria VARCHAR(100),
    precio_alquiler DECIMAL(10,2),
    precio_venta DECIMAL(10,2),
    estado VARCHAR(50) DEFAULT 'Disponible',
    imagen VARCHAR(500),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla de contactos
CREATE TABLE IF NOT EXISTS contactos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(50),
    empresa VARCHAR(255),
    servicio VARCHAR(100),
    asunto TEXT,
    equipo_id INTEGER REFERENCES equipos(id),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo (opcional)
INSERT INTO equipos (nombre, descripcion, categoria, precio_alquiler, precio_venta, estado) VALUES
('Equipo de Metalización CNC', 'Equipo de metalización por proyección térmica computarizada', 'Metalización', 500000, 15000000, 'Disponible'),
('Balanceador Dinámico Portátil', 'Equipo de balanceo dinámico en sitio con análisis de vibraciones', 'Balanceo', 350000, 12000000, 'Disponible'),
('Sistema de Control de Sólidos', 'Sistema completo de separación y filtración industrial', 'Control de Sólidos', 450000, 18000000, 'Disponible');
```

### Paso 3: Actualizar la conexión a base de datos

Modifica `db_connection.php` para usar PostgreSQL (Supabase):

```php
<?php
$host = getenv('DB_HOST') ?: 'tu-host.supabase.co';
$port = getenv('DB_PORT') ?: '5432';
$dbname = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASS') ?: 'tu-password';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    // Para desarrollo, mostrar error. Para producción, ocultar.
    die("Error de conexión a la base de datos.");
}
?>
```

⚠️ **NOTA**: Como usamos PDO en lugar de MySQLi, debes actualizar todas las consultas que usan `$conn->query()` a `$conn->query()` de PDO (la sintaxis es similar pero los métodos de fetch cambian ligeramente).

**Alternativa más fácil**: Usar **TiDB Cloud** (MySQL compatible y gratuito) para no cambiar el código:

### Paso 3 (Alternativa): TiDB Cloud (MySQL compatible)

1. Ve a https://tidbcloud.com y crea una cuenta gratuita
2. Crea un cluster gratuito
3. Obtén las credenciales de conexión
4. Actualiza `db_connection.php` con los datos de TiDB
5. **No necesitas cambiar nada del código PHP** (es MySQL compatible)

### Paso 4: Desplegar en Render

1. Ve a https://render.com y crea una cuenta
2. Click en **"New +" > "Web Service"**
3. Conecta tu repositorio de GitHub
4. Configuración:
   - **Name**: `duramet`
   - **Environment**: `PHP`
   - **Build Command**: `composer install`
   - **Start Command**: `heroku-php-apache2`
5. Agrega las variables de entorno:
   - `DB_HOST`
   - `DB_USER`
   - `DB_PASS`
   - `DB_NAME`
6. Click en **"Create Web Service"**
7. Espera el despliegue (~3-5 minutos)

---

## 🥈 OPCIÓN 2: InfinityFree (Más fácil, pero limitado)

### Paso 1: Crear cuenta en InfinityFree

1. Ve a https://www.infinityfree.net
2. Regístrate con email
3. Crea una nueva cuenta de hosting

### Paso 2: Subir archivos

1. Accede al **File Manager** o usa **FTP** (FileZilla)
2. Sube todos los archivos PHP, CSS, JS e imágenes a la carpeta `htdocs`
3. Asegúrate de mantener la estructura de carpetas

### Paso 3: Crear base de datos MySQL

1. En el panel de InfinityFree, ve a **MySQL Databases**
2. Crea una nueva base de datos
3. Copia los datos de conexión:
   - Host: `sqlxxx.infinityfree.com`
   - Username: `epiz_xxxxxxxx`
   - Password: (la que configuraste)
   - Database: `epiz_xxxxxxxx_xxx`
4. Abre **phpMyAdmin** desde el panel
5. Importa tu base de datos o crea las tablas manualmente

### Paso 4: Configurar conexión

Edita `db_connection.php` con los datos de InfinityFree:

```php
<?php
$servername = "sqlxxx.infinityfree.com";
$username = "epiz_xxxxxxxx";
$password = "tu-password";
$dbname = "epiz_xxxxxxxx_xxx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
```

### Paso 5: Tu sitio estará en

`http://tu-sitio.rf.gd`

---

## 🥉 OPCIÓN 3: Railway.app (Buena alternativa a Render)

### Paso 1: Crear proyecto en Railway

1. Ve a https://railway.app
2. Inicia sesión con GitHub
3. Click en **"New Project"**

### Paso 2: Agregar servicios

1. Agrega un servicio **"Deploy from GitHub repo"** para tu frontend PHP
2. Agrega un servicio **"MySQL"** o **"PostgreSQL"** para la base de datos
3. Railway te da $5/mes gratis (suficiente para un sitio pequeño)

### Paso 3: Configurar variables de entorno

En el servicio PHP, agrega las variables:
- `DATABASE_URL` (Railway lo genera automáticamente)
- `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`

### Paso 4: Desplegar

Railway hace deploy automático desde GitHub. Tu sitio estará en:
`https://duramet-production.up.railway.app`

---

## 📦 Checklist Antes del Despliegue

- [ ] Actualizar número de WhatsApp en todos los archivos
- [ ] Reemplazar números/statistics con datos reales
- [ ] Agregar NIT real en el footer
- [ ] Agregar links reales de redes sociales
- [ ] Verificar que las rutas de imágenes son correctas
- [ ] Probar formulario de contacto
- [ ] Verificar que todas las páginas cargan correctamente
- [ ] Optimizar imágenes (comprimirlas para web)
- [ ] Crear sitemap.xml
- [ ] Registrar sitio en Google Search Console

---

## 🔧 Optimizaciones Post-Despliegue

### Google Search Console
1. Ve a https://search.google.com/search-console
2. Agrega tu sitio
3. Verifica la propiedad (HTML tag o archivo)
4. Envía el sitemap

### Google Analytics
1. Crea una cuenta en https://analytics.google.com
2. Agrega el tracking code antes del `</head>` en cada página

### Optimizar imágenes
```bash
# Usar herramienta como TinyPNG o Squoosh
# Comprimir todas las imágenes antes de subir
```

### HTTPS (SSL)
- **Render**: Automático con dominio `.onrender.com`
- **InfinityFree**: SSL gratuito disponible en el panel
- **Railway**: Automático

---

## 💡 Recomendación Final

**Para empezar rápido y gratis**:
1. **Base de datos**: TiDB Cloud (MySQL compatible, no cambias código)
2. **Hosting**: InfinityFree (más fácil para PHP) o Render (mejor rendimiento)
3. **Dominio personalizado**: Compra un `.com` en Namecheap (~$10/año) y conéctalo

**Para producción profesional**:
- Migra a un hosting pago como Hostinger, SiteGround o DigitalOcean
- Invierte en un dominio `.com.co` o `.com`
- Configura emails corporativos con Google Workspace o Zoho Mail

---

## ❓ ¿Necesitas ayuda?

Si tienes dudas sobre algún paso, consulta la documentación oficial:
- Render: https://render.com/docs
- Supabase: https://supabase.com/docs
- TiDB Cloud: https://docs.pingcap.com/tidbcloud
- InfinityFree: https://infinityfree.net/support
