<?php
$xml = simplexml_load_file('C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml');
$userid = $_GET['userid'] ?? '';
$selected = null;

foreach ($xml->player as $player) {
    if ((string)$player['userid'] === $userid) {
        $selected = $player;
        break;
    }
}

if (!$selected) {
    echo "Jugador no encontrado.";
    exit;
}
?>
<style>
body {
    background-color: #1a1a1a;
    color: #f1f1f1;
    font-family: 'Courier New', Courier, monospace;
    margin: 0;
    padding: 20px;
    background-image: url('https://www.transparenttextures.com/patterns/asfalt-dark.png'); /* textura oscura */
}

h2 {
    color: #ff5555;
    font-size: 28px;
    text-shadow: 1px 1px 2px #000;
}

form {
    background-color: #2a2a2a;
    border: 2px solid #444;
    border-radius: 10px;
    padding: 20px;
    max-width: 700px;
    margin: auto;
    box-shadow: 0 0 10px #000;
}

input[type="text"] {
    width: 100%;
    background-color: #111;
    color: #0f0;
    border: 1px solid #333;
    padding: 8px;
    margin: 4px 0 12px;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #8b0000;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #ff0000;
    box-shadow: 0 0 10px red;
}

fieldset {
    border: 1px solid #444;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #1f1f1f;
    border-left: 5px solid #8b0000;
}

p {
    font-size: 18px;
    margin-top: 20px;
    color: #ffd700;
}

b::before {
    content: "🧟‍♀️ ";
}
b::after {
    content: " 💀";
}

a {
    color: #00ffff;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
</style>
<h2>Editar Jugador: <?= htmlspecialchars($selected['playername']) ?></h2>
<form method="post" action="players_save.php">
    <input type="hidden" name="userid" value="<?= htmlspecialchars($selected['userid']) ?>">

    <p><b>Datos básicos:</b></p>
    Playername: <input type="text" name="playername" value="<?= htmlspecialchars($selected['playername']) ?>"><br>
    Native Platform: <input type="text" name="nativeplatform" value="<?= htmlspecialchars($selected['nativeplatform']) ?>"><br>
    Last Login: <input type="text" name="lastlogin" value="<?= htmlspecialchars($selected['lastlogin']) ?>"><br><br>

    <p><b>Mochilas (Backpack):</b></p>
    <?php foreach ($selected->backpack as $i => $bp): ?>
        <fieldset>
            ID: <input type="text" name="backpack[<?= $i ?>][id]" value="<?= htmlspecialchars($bp['id']) ?>">
            Pos: <input type="text" name="backpack[<?= $i ?>][pos]" value="<?= htmlspecialchars($bp['pos']) ?>">
            Timestamp: <input type="text" name="backpack[<?= $i ?>][timestamp]" value="<?= htmlspecialchars($bp['timestamp']) ?>">
        </fieldset><br>
    <?php endforeach; ?>

    <p><b>Posiciones de misión (Quest Positions):</b></p>
    <?php
    $questPositions = $selected->questpositions->position ?? [];
    foreach ($questPositions as $j => $qp): ?>
        <fieldset>
            ID: <input type="text" name="questpositions[<?= $j ?>][id]" value="<?= htmlspecialchars($qp['id']) ?>">
            Tipo: <input type="text" name="questpositions[<?= $j ?>][positiondatatype]" value="<?= htmlspecialchars($qp['positiondatatype']) ?>">
            Pos: <input type="text" name="questpositions[<?= $j ?>][pos]" value="<?= htmlspecialchars($qp['pos']) ?>">
        </fieldset><br>
    <?php endforeach; ?>

    <input type="submit" value="Guardar cambios">
</form>
