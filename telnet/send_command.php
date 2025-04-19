<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $command = $_POST['command'] ?? '';
  if ($command === '') exit;

  $logFile = __DIR__ . '/data/log.txt';
  $fp = fopen($logFile, 'a');
  fwrite($fp, date("[H:i:s]") . " [CLIENT] $command\n");
  fclose($fp);

  // Reenviar el comando a la conexión telnet activa (simulado)
  // En producción esto debería ser parte del proceso persistente
  // o usar sockets/named pipes para comunicarse con telnet_process.php

  echo "Comando enviado: $command";
} else {
  echo "Método inválido";
}
?>