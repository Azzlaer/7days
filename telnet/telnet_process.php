<?php
session_start();

$host = $_SESSION['telnet_host'] ?? '';
$port = $_SESSION['telnet_port'] ?? '';
$password = $_SESSION['telnet_password'] ?? '';

if (!$host || !$port || !$password) {
  exit("Datos de conexión faltantes.");
}

$logFile = __DIR__ . '/data/log.txt';
$fp = fopen($logFile, 'a');

$descriptorspec = [
  0 => ["pipe", "r"],
  1 => ["pipe", "w"],
  2 => ["pipe", "w"]
];

$process = proc_open("telnet $host $port", $descriptorspec, $pipes);

if (is_resource($process)) {
  fwrite($pipes[0], $password . "\n");
  fflush($pipes[0]);

  while (true) {
    $output = fgets($pipes[1], 1024);
    if ($output) {
      fwrite($fp, date("[H:i:s]") . " " . $output);
      fflush($fp);
    }
    usleep(100000);
  }

  fclose($pipes[0]);
  fclose($pipes[1]);
  fclose($pipes[2]);
  proc_close($process);
  fclose($fp);
} else {
  fwrite($fp, "No se pudo iniciar el proceso Telnet\n");
  fclose($fp);
}
?>
