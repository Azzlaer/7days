<?php
$xmlFile = 'C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\serveradmin.xml';
$xml = simplexml_load_file($xmlFile) or die("Error al cargar XML.");

$index = $_POST['index'];
unset($xml->users->user[intval($index)]);

$xml->asXML($xmlFile);
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
