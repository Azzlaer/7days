<?php
function obtenerJugadoresOnline() {
    $host = '127.0.0.1';
    $puerto = 8086;
    $clave = '35027595*';

    $socket = fsockopen($host, $puerto, $errno, $errstr, 5);
    if (!$socket) {
        return [];
    }

    fgets($socket); // Espera 'Please enter password:'
    fwrite($socket, $clave . "\n");
    fgets($socket); // Espera confirmación

    fwrite($socket, "lp\n");
    sleep(1); // Espera respuesta
    $output = '';

    while (!feof($socket)) {
        $line = fgets($socket);
        if (strpos($line, 'Total of') !== false) break; // fin de jugadores
        $output .= $line;
    }

    fclose($socket);

    return parseJugadores($output);
}

function parseJugadores($output) {
    $jugadores = [];

    $lineas = explode("\n", $output);
    foreach ($lineas as $linea) {
        if (preg_match('/^\d+\.\s+id=(\d+),\s+([^,]+),/', $linea, $m)) {
            $jugador = [
                'id' => $m[1],
                'nombre' => $m[2],
                'steamid' => '',
                'ip' => '',
                'ping' => '',
                'level' => '',
                'health' => '',
                'deaths' => '',
                'zombies' => '',
                'score' => ''
            ];

            // Extraer todos los campos disponibles sin importar orden
            if (preg_match('/pltfmid=Steam_(\d+)/', $linea, $m)) $jugador['steamid'] = $m[1];
            if (preg_match('/ip=([\d\.]+)/', $linea, $m)) $jugador['ip'] = $m[1];
            if (preg_match('/ping=(\d+)/', $linea, $m)) $jugador['ping'] = $m[1];
            if (preg_match('/level=(\d+)/', $linea, $m)) $jugador['level'] = $m[1];
            if (preg_match('/health=(\d+)/', $linea, $m)) $jugador['health'] = $m[1];
            if (preg_match('/deaths=(\d+)/', $linea, $m)) $jugador['deaths'] = $m[1];
            if (preg_match('/zombies=(\d+)/', $linea, $m)) $jugador['zombies'] = $m[1];
            if (preg_match('/score=(-?\d+)/', $linea, $m)) $jugador['score'] = $m[1];

            $jugadores[] = $jugador;
        }
    }

    return $jugadores;
}



$jugadores = obtenerJugadoresOnline();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jugadores Online</title>
    <style>
    body {
        background-color: #0a0a0a;
        color: #00ff00;
        font-family: 'Courier New', monospace;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        text-shadow: 0 0 10px red;
        color: #ff4444;
    }
    table {
        width: 95%;
        margin: auto;
        border-collapse: collapse;
        background-color: rgba(0, 0, 0, 0.85);
        box-shadow: 0 0 20px red;
    }
    th, td {
        padding: 12px;
        border: 1px solid #00ff00;
        text-align: center;
    }
    th {
        background-color: #111;
        color: #00ff00;
        text-shadow: 0 0 5px #00ff00;
    }
    td {
        color: #ccffcc;
    }
    tr:hover {
        background-color: #222;
    }
    .no-data {
        text-align: center;
        margin-top: 40px;
        font-size: 1.4em;
        color: red;
        text-shadow: 0 0 5px red;
    }
    .zombie-icon {
        font-size: 1.2em;
    }
</style>

</head>
<body>
    <h1>🧟 Jugadores Online en Tiempo Real</h1>

    <?php if (!empty($jugadores)): ?>
<h1>☣️ Jugadores Online - Zona de Infección</h1>

<?php if (!empty($jugadores)): ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>🧟 Nombre</th>
            <th>🧾 SteamID</th>
            <th>🌐 IP / 📶 Ping</th>
            <th>⚔️/❤️/💀/🧠/🏅<br><small>(Lv/H/D/Z/S)</small></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jugadores as $i => $jugador): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td class="zombie-icon">🧟 <?= htmlspecialchars($jugador['nombre']) ?></td>
                <td><?= htmlspecialchars($jugador['steamid']) ?></td>
                <td><?= htmlspecialchars($jugador['ip']) ?> / <?= htmlspecialchars($jugador['ping']) ?>ms</td>
                <td>
                    ⚔️ <?= $jugador['level'] ?> /
                    ❤️ <?= $jugador['health'] ?> /
                    💀 <?= $jugador['deaths'] ?> /
                    🧠 <?= $jugador['zombies'] ?> /
                    🏅 <?= $jugador['score'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p class="no-data">☠️ Sin supervivientes conectados... aún. ⚠️</p>
<?php endif; ?>


    <?php else: ?>
        <p class="no-data">⚠️ No hay jugadores conectados en este momento.</p>
    <?php endif; ?>
</body>
</html>
