<?php
$logFile = 'telnet_log.txt';
echo file_exists($logFile) ? file_get_contents($logFile) : "Sin registros todavía.";
