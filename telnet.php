<?php
$host = '127.0.0.1'; // o la IP del servidor si está en otra máquina
$port = 8086;        // asegúrate de que coincida con el puerto de telnet configurado
$password = '35027595*'; // cambia esto por tu contraseña real

$salida = '';
$comando = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comando'])) {
    $comando = $_POST['comando'];
    
    $fp = fsockopen($host, $port, $errno, $errstr, 5);
    if (!$fp) {
        $salida = "Error al conectar a Telnet: $errstr ($errno)";
    } else {
        // Login
        fwrite($fp, $password . "\n");
        usleep(500000); // Espera medio segundo
        
        // Envía comando
        fwrite($fp, $comando . "\n");
        usleep(500000);

        // Leer salida
        $salida = '';
        while (!feof($fp)) {
            $line = fgets($fp, 128);
            $salida .= htmlspecialchars($line);
        }

        fclose($fp);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consola Telnet</title>
    <style>
        body {
            background-color: #101010;
            color: #00ff00;
            font-family: monospace;
            padding: 20px;
        }

        textarea {
            width: 100%;
            height: 200px;
            background-color: #1a1a1a;
            color: #0f0;
            border: 1px solid #333;
            padding: 10px;
        }

        input[type="text"] {
            width: 80%;
            background-color: #1a1a1a;
            color: #0f0;
            border: 1px solid #333;
            padding: 10px;
        }

        button {
            background-color: #222;
            color: #fff;
            padding: 10px 15px;
            border: 1px solid #444;
            cursor: pointer;
        }

        .salida {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Consola Telnet - 7 Days to Die</h2>
    <form method="post">
        <label>Comando Telnet:</label><br>
        <input type="text" name="comando" value="<?= htmlspecialchars($comando) ?>" required>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($salida): ?>
        <div class="salida">
            <h3>Salida del servidor:</h3>
            <textarea readonly><?= $salida ?></textarea>
        </div>
    <?php endif; ?>
</body>
</html>
