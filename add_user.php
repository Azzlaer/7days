<?php
$xmlFile = 'C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\serveradmin.xml';
$xml = simplexml_load_file($xmlFile) or die("Error al cargar XML.");

$newUser = $xml->users->addChild('user');
$newUser->addAttribute('platform', $_POST['platform']);
$newUser->addAttribute('userid', $_POST['userid']);
$newUser->addAttribute('name', $_POST['name']);
$newUser->addAttribute('permission_level', $_POST['permission_level']);

$xml->asXML($xmlFile);
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
