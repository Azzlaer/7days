<?php
session_start();
$connected = isset($_SESSION['telnet_connected']) && $_SESSION['telnet_connected'] === true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consola Zombie Telnet</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <div class="container">
    <h1>Telnet Zombie - 7 Days to Die</h1>

    <form action="connect.php" method="POST" class="connection-form">
      <label>Host: <input type="text" name="host" value="127.0.0.1" required></label>
      <label>Puerto: <input type="number" name="port" value="8081" required></label>
      <label>Contraseña: <input type="password" name="password" required></label>
      <button type="submit" class="btn connect-btn">Conectar</button>
    </form>

    <?php if ($connected): ?>
      <button onclick="disconnect()" class="btn disconnect-btn">Desconectar</button>
      <button onclick="openModal()" class="btn open-console">Abrir Consola</button>
    <?php endif; ?>

    <div id="consoleModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Consola Zombie</h2>
        <div id="console-output" class="console-output"></div>
        <form onsubmit="sendCommand(event)" class="command-form">
          <input type="text" id="command" placeholder="Escribe un comando...">
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="assets/zombie.js"></script>
</body>
</html>
