<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $host = $_POST['host'] ?? '127.0.0.1';
  $port = $_POST['port'] ?? '8081';
  $password = $_POST['password'] ?? '';

  $_SESSION['telnet_connected'] = true;
  $_SESSION['telnet_host'] = $host;
  $_SESSION['telnet_port'] = $port;
  $_SESSION['telnet_password'] = $password;

  $command = "open php telnet_process.php";
  pclose(popen("start /B cmd /C php telnet_process.php", "r"));

  header("Location: index.php");
  exit;
} else {
  echo "Acceso no permitido";
  exit;
}
?>
