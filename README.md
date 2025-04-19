# 🧟 7 Days to Die - Web Admin Panel

¡Bienvenido sobreviviente! Este proyecto es una interfaz web desarrollada en PHP, HTML, CSS y algo de Python, diseñada para facilitar la administración de un servidor **7 Days to Die**. Desde la edición de jugadores hasta el control del servidor y comandos Telnet en tiempo real.

## ⚙️ Características

### 👤 Panel de Jugadores (`players.php`)
- Listado de todos los jugadores del servidor con filtro por nombre.
- Datos extraídos desde el archivo XML generado por el servidor (`players.xml`).
- Acceso directo a la edición de cada jugador.

### 📝 Editor de Jugadores (`edit.php`)
- Visualización y edición de los siguientes datos:
  - `id`, `steamid`, `name`, `score`, `level`, `position`, `online`, `lastOnline`
  - `backpack`: Posición y timestamp de mochilas.
  - `questpositions`: Todas las posiciones de misiones con sus tipos.
- Formulario con validación y guardado automático en el XML.

### Estilo Visual Zombie
- Interfaz con **temática post-apocaliptica** inspirada en *7 Days to Die*.
- Uso de colores oscuros, rojos sangrientos y verdes terminal.
- Emojis decorativos para ambientar (🧟‍♀�? 💀, ☠️, 🔪).
- Compatible con dispositivos móviles (diseño responsivo básico).

### Panel Telnet (opcional)
- Consola estilo zombie para enviar comandos en tiempo real.
- Soporte para conectar/desconectar del servidor Telnet.
- Captura y visualización en vivo de respuestas del servidor.

> *[⚠️ Pronto se integrará esta función directamente en el mismo panel.]*

---

## Estructura del Proyecto

7dtd-admin-panel/ 
�?
├── players.php # Página principal con listado de jugadores 
├── edit.php # Editor individual de jugadores 
├── serverconfig.php # Opcional: edita el archivo serverconfig.xml 
├── telnet.php # Interfaz de conexión Telnet (si se activa) 
├── style.css # Estilo zombie con emojis y colores temáticos 
├── players.xml # Archivo fuente de datos de jugadores 
├── mods-counter.php # Cuenta los mods instalados en la carpeta Mods/ 
├── /Mods/ # Carpeta escaneada para contar mods 
└── README.md # Este archivo


---

## Requisitos

- Servidor web con PHP (se recomienda XAMPP para desarrollo local)
- Acceso de lectura/escritura al archivo `players.xml`
- Permisos para ejecutar scripts si se usa Telnet o Python
- Navegador moderno (Chrome, Firefox)

---

## Configuracion

Configurar los archivos: 

1) telnet_send.php
2) telnet.php
3) players.php - C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml
4) players_save.php - C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml
5) players_edit.php - C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml
6) ftp_manager.php  - // Datos de conexi��n al FTP
7) ftp_edit.php - // Datos de conexi��n al FTP
8) ftp_download.php - // Datos de conexi��n al FTP
9) ftp_compress.php - $base_dir = "C:\\Games\\mta\\mods\\deathmatch\\resources";
10) editar_config.php - $filename = 'C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\serverconfig.xml';


## Instalacion

Clona este repositorio o copia los archivos en tu servidor local:

   git clone https://github.com/tuusuario/7dtd-admin-panel.git
Asegurate de tener los permisos adecuados sobre el archivo players.xml.

Abre players.php desde tu navegador para comenzar.

Futuras Funcionalidades
Estadisticas de conexion por jugador 

Gestión de permisos y baneos 

Control de misiones y experiencia 

Integración con Webhooks de Discord 

Creditos
Proyecto desarrollado por [TuNombre] 
Inspirado en el mundo de 7 Days to Die
Gracias a la comunidad por sobrevivir juntos otro dia mas

Captura de Pantalla (Preview)
(Agrega aquí imágenes del panel si deseas mostrarlo en GitHub)

Que el apocalipsis te sea leve!
El ultimo en morir ?que apague el servidor.?