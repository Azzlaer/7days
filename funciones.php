<?php
function getServerStatus($exeName = "7DaysToDieServer.exe") {
    $output = shell_exec("tasklist");
    return strpos($output, $exeName) !== false;
}


 function startServer() {
    $basePath = "C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\";
    $dataFolder = "";
    $exeName = "";
    $logName = "";

    // Detectar ejecutable
    if (file_exists($basePath . "7DaysToDieServer.exe")) {
        $exeName = "7DaysToDieServer";
        $logName = "output_log_dedi";
    } else {
        $exeName = "7DaysToDie";
        $logName = "output_log";
    }

    $dataFolder = $basePath . $exeName . "_Data\\";

    // Eliminar logs antiguos (solo dejar los más recientes 20)
    $logFiles = glob($dataFolder . $logName . "*.txt");
    usort($logFiles, function($a, $b) {
        return filectime($a) - filectime($b); // orden ascendente
    });

    if (count($logFiles) > 20) {
        $oldLogs = array_slice($logFiles, 0, count($logFiles) - 20);
        foreach ($oldLogs as $file) {
            @unlink($file);
        }
    }

    // Crear timestamp para log
    $timestamp = date("__Y-m-d__H-i-s");
    $logFile = $dataFolder . $logName . $timestamp . ".txt";

    // Crear steam_appid.txt
    file_put_contents($basePath . "steam_appid.txt", "251570");

    // Comando para iniciar el servidor
    $cmd = "cmd.exe /c start \"\" \"{$basePath}{$exeName}.exe\" -logfile \"$logFile\" -quit -batchmode -nographics -configfile=serverconfig.xml -dedicated";

    // Ejecutar comando
    shell_exec($cmd);
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
?>
