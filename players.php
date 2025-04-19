<?php
$xml = simplexml_load_file('C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml');

$filter = $_GET['filter'] ?? '';
$filter = strtolower($filter);

echo "<h2>Jugadores</h2>";
echo '<form method="get"><input type="text" name="filter" placeholder="Buscar..." value="' . htmlspecialchars($filter) . '"><input type="submit" value="Filtrar"></form><ul>';

foreach ($xml->player as $player) {
    $name = (string)$player['playername'];
    $platform = strtolower((string)$player['nativeplatform']);
    $lastlogin = strtolower((string)$player['lastlogin']);

    if (!$filter || strpos(strtolower($name), $filter) !== false || strpos($platform, $filter) !== false || strpos($lastlogin, $filter) !== false) {
        echo "<li><a href='players_edit.php?userid={$player['userid']}'>{$name}</a></li>";
    }
}
echo "</ul>";
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