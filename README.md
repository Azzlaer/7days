# 馃 7 Days to Die - Web Admin Panel

隆Bienvenido sobreviviente! Este proyecto es una interfaz web desarrollada en PHP, HTML, CSS y algo de Python, dise帽ada para facilitar la administraci贸n de un servidor **7 Days to Die**. Desde la edici贸n de jugadores hasta el control del servidor y comandos Telnet en tiempo real.

## 鈿欙笍 Caracter铆sticas

### 馃懁 Panel de Jugadores (`players.php`)
- Listado de todos los jugadores del servidor con filtro por nombre.
- Datos extra铆dos desde el archivo XML generado por el servidor (`players.xml`).
- Acceso directo a la edici贸n de cada jugador.

### 馃摑 Editor de Jugadores (`edit.php`)
- Visualizaci贸n y edici贸n de los siguientes datos:
  - `id`, `steamid`, `name`, `score`, `level`, `position`, `online`, `lastOnline`
  - `backpack`: Posici贸n y timestamp de mochilas.
  - `questpositions`: Todas las posiciones de misiones con sus tipos.
- Formulario con validaci贸n y guardado autom谩tico en el XML.

### Estilo Visual Zombie
- Interfaz con **tem谩tica post-apocaliptica** inspirada en *7 Days to Die*.
- Uso de colores oscuros, rojos sangrientos y verdes terminal.
- Emojis decorativos para ambientar (馃鈥嶁檧锔? 馃拃, 鈽狅笍, 馃敧).
- Compatible con dispositivos m贸viles (dise帽o responsivo b谩sico).

### Panel Telnet (opcional)
- Consola estilo zombie para enviar comandos en tiempo real.
- Soporte para conectar/desconectar del servidor Telnet.
- Captura y visualizaci贸n en vivo de respuestas del servidor.

> *[鈿狅笍 Pronto se integrar谩 esta funci贸n directamente en el mismo panel.]*

---

## Estructura del Proyecto

7dtd-admin-panel/ 
鈹?
鈹溾攢鈹� players.php # P谩gina principal con listado de jugadores 
鈹溾攢鈹� edit.php # Editor individual de jugadores 
鈹溾攢鈹� serverconfig.php # Opcional: edita el archivo serverconfig.xml 
鈹溾攢鈹� telnet.php # Interfaz de conexi贸n Telnet (si se activa) 
鈹溾攢鈹� style.css # Estilo zombie con emojis y colores tem谩ticos 
鈹溾攢鈹� players.xml # Archivo fuente de datos de jugadores 
鈹溾攢鈹� mods-counter.php # Cuenta los mods instalados en la carpeta Mods/ 
鈹溾攢鈹� /Mods/ # Carpeta escaneada para contar mods 
鈹斺攢鈹� README.md # Este archivo


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
6) ftp_manager.php  - // Datos de conexión al FTP
7) ftp_edit.php - // Datos de conexión al FTP
8) ftp_download.php - // Datos de conexión al FTP
9) ftp_compress.php - $base_dir = "C:\\Games\\mta\\mods\\deathmatch\\resources";
10) editar_config.php - $filename = 'C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\serverconfig.xml';


## Instalacion

Clona este repositorio o copia los archivos en tu servidor local:

   git clone https://github.com/tuusuario/7dtd-admin-panel.git
Asegurate de tener los permisos adecuados sobre el archivo players.xml.

Abre players.php desde tu navegador para comenzar.

Futuras Funcionalidades
Estadisticas de conexion por jugador 

Gesti贸n de permisos y baneos 

Control de misiones y experiencia 

Integraci贸n con Webhooks de Discord 

Creditos
Proyecto desarrollado por [TuNombre] 
Inspirado en el mundo de 7 Days to Die
Gracias a la comunidad por sobrevivir juntos otro dia mas

Captura de Pantalla (Preview)
(Agrega aqu铆 im谩genes del panel si deseas mostrarlo en GitHub)

Que el apocalipsis te sea leve!
El ultimo en morir ?que apague el servidor.?