<?php
include 'funciones.php';

$serverPath = "C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\";
$configPath = $serverPath . "serverconfig.xml";
$modsPath = $serverPath . "Mods";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["start"])) {
        startServer();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } elseif (isset($_POST["stop"])) {
        stopServer();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } elseif (isset($_POST["save_config"])) {
        writeConfigFile($configPath, $_POST["config_content"]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}


$isRunning = getServerStatus();
$configContent = readConfigFile($configPath);
$modsCount = countMods($modsPath);
?>





<!DOCTYPE html>
<html lang="es">
<head>
<script>
function abrirVentanaConfig() {
    window.open('editar_config.php', '_blank', 'width=900,height=700,scrollbars=yes');
}
function abrirVentanaConfigTelnet() {
    window.open('telnet_admin.php', '_blank', 'width=900,height=700,scrollbars=yes');
}
function abrirVentanaConfigFTP() {
    window.open('ftp_manager.php', '_blank', 'width=900,height=700,scrollbars=yes');
}
function abrirVentanaConfigUsers() {
    window.open('players.php', '_blank', 'width=900,height=700,scrollbars=yes');
}
function abrirVentanaConfigPanel() {
    window.open('http://latinbattlex.servegame.com:4780', '_blank', 'width=900,height=700,scrollbars=yes');
}
function abrirVentanaConfigPanelADM() {
    window.open('admins.php', '_blank', 'width=900,height=700,scrollbars=yes');
}
</script>

    <meta charset="UTF-8">
    <title>Control Servidor 7 Days to Die</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    background-color: #1b1b1b;    
    font-family: "Courier New", monospace;	
    margin: 0;
    padding: 0;
    background: url('assets/images/wallpaper.jpg') no-repeat center center fixed;
    background-size: cover;
    color: white;
    	
}
</style>
<body>

    <h1>🧟 Panel de Control: 7 Days to Die</h1>

    <div class="status">
        Estado del servidor:
        <span class="<?= $isRunning ? 'online' : 'offline' ?>">
            <?= $isRunning ? '🟢 ONLINE' : '🔴 OFFLINE' ?>
        </span>
    </div>





<?php if (!empty($message)): ?>
    <p style="color: lime; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>


		
    </form>

	<h1><span style="text-decoration: underline;">Configuraciones</span></h1>
    <h2>📝 Configuración del Servidor <button onclick="abrirVentanaConfig()" class="boton-editar">Editar Configuración</button></h2>
	<h2>📝 Telnet Consola <button onclick="abrirVentanaConfigTelnet()" class="boton-editar">Usar Telnet</button></h2>
	<h2>📝 FTP Manager <button onclick="abrirVentanaConfigFTP()" class="boton-editar">Usar FTP Manager</button></h2>
	<h2>📝 Admin Panel <button onclick="abrirVentanaConfigPanelADM()" class="boton-editar">Usar ADM Panel</button></h2>	
	<h2>📝 7DTD Panel <button onclick="abrirVentanaConfigPanel()" class="boton-editar">Usar Panel Manager</button></h2>
	<h2>📝 Users Manager <button onclick="abrirVentanaConfigUsers()" class="boton-editar">Usar Users Manager</button></h2>
	<h1><span style="text-decoration: underline;">Estad&iacute;sticas de Partidas</span></h1>
	<h2>🧍‍♂️ Jugadores Online <button onclick="window.open('jugadores_online.php', '_blank', 'width=800,height=600');" class="boton-editar">Ver Usuarios Online</button></h2>
    <h2>📦 Cantidad de Mods: <?= $modsCount ?></h2>
	<?php
$directorio = 'C:/Users/Guardia/AppData/Roaming/7DaysToDie/Saves/Pregen06k4/guardia/Player';
$extension = 'ttp';

// Verificar si la carpeta existe
if (!is_dir($directorio)) {
    echo "❌ La carpeta no existe: $directorio";
    exit;
}

// Buscar archivos .ttp
$archivos = glob($directorio . '/*.' . $extension);
$cantidad = count($archivos);

// Mostrar resultado
echo "<h2> <p>📦 Cuentas creadas: <strong>$cantidad</strong></p></h2>";

?>
	
	<div class="container">
	<h1><span style="text-decoration: underline;">Gametracker - Informacion</span></h1>
	<a href="https://www.gametracker.com/server_info/latinbattlex.servegame.com:26900/" target="_blank"><img src="https://cache.gametracker.com/server_info/latinbattlex.servegame.com:26900/b_560_95_1.png" border="0" width="560" height="95" alt=""/></a>
    </div>
	
	
	
	

	
	

	
	
	
</body>
</html>
