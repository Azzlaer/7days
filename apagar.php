<?php
// Ruta al ejecutable de Python
$python = 'C:\Users\\Guardia\\AppData\\Local\\Programs\\Python\\Python312\\python.exe';

// Ruta al script Python
$script = 'C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\apagar_servidor.py';

// Ejecutar el script y capturar salida
$output = shell_exec("\"$python\" \"$script\" 2>&1");
echo "<pre>$output</pre>";
?>
