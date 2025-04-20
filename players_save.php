<?php
$xml = simplexml_load_file('C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\Pregen06k4\guardia\players.xml');
$userid = $_POST['userid'];

foreach ($xml->player as $player) {
    if ((string)$player['userid'] === $userid) {
        // Datos básicos
        $player['playername'] = $_POST['playername'];
        $player['nativeplatform'] = $_POST['nativeplatform'];
        $player['lastlogin'] = $_POST['lastlogin'];

        // Eliminar antiguos backpacks
        unset($player->backpack);
        if (!empty($_POST['backpack'])) {
            foreach ($_POST['backpack'] as $bp) {
                $new = $player->addChild('backpack');
                $new->addAttribute('id', $bp['id']);
                $new->addAttribute('pos', $bp['pos']);
                $new->addAttribute('timestamp', $bp['timestamp']);
            }
        }

        // Eliminar antiguos questpositions
        unset($player->questpositions);
        if (!empty($_POST['questpositions'])) {
            $qpNode = $player->addChild('questpositions');
            foreach ($_POST['questpositions'] as $qp) {
                $pos = $qpNode->addChild('position');
                $pos->addAttribute('id', $qp['id']);
                $pos->addAttribute('positiondatatype', $qp['positiondatatype']);
                $pos->addAttribute('pos', $qp['pos']);
            }
        }

        break;
    }
}

$xml->asXML('players.xml');
echo "Cambios guardados. <a href='players.php'>Volver</a>";
