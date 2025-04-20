<?php
function getServerStatus($exeName = "7DaysToDieServer.exe") {
    $output = shell_exec("tasklist");
    return strpos($output, $exeName) !== false;
}


function stopServer($exeName = "7DaysToDieServer.exe") {
    shell_exec("taskkill /F /IM $exeName");
}

function readConfigFile($path) {
    return file_exists($path) ? htmlspecialchars(file_get_contents($path)) : "";
}

function writeConfigFile($path, $content) {
    file_put_contents($path, $content);
}

function countMods($modsPath) {
    $folders = glob($modsPath . '/*', GLOB_ONLYDIR);
    return count($folders);
}

if (isset($_POST['start_server'])) {
    $batFile = 'C:\Servidores\Steam\steamapps\common\7 Days to Die Dedicated Server\startdedicated.bat';

    // Escapa la ruta y ejecuta el .bat con salida
    $output = shell_exec("start \"\" \"$batFile\"");
    $message = "Servidor iniciado con éxito.";
}
if (isset($_POST['stop_server'])) {
    $batFile = 'C:\Servidores\Steam\steamapps\common\7 Days to Die Dedicated Server\server_stop.bat';
    shell_exec("start \"\" \"$batFile\"");
    $message = "Comando de apagado enviado vía Telnet.";
}
?>
