<?php
$host = '127.0.0.1';
$port = 8086;
$password = '35027595*';
$comando = trim($_POST['comando'] ?? '');

$logFile = 'telnet_log.txt';

if (!$comando) exit;

$fp = fsockopen($host, $port, $errno, $errstr, 5);
if (!$fp) {
    file_put_contents($logFile, "Error: $errstr ($errno)\n", FILE_APPEND);
    exit;
}

fwrite($fp, $password . "\n");
usleep(500000);

fwrite($fp, $comando . "\n");
usleep(500000);

$output = '';
while (!feof($fp)) {
    $line = fgets($fp, 128);
    if ($line) $output .= $line;
}
fclose($fp);

file_put_contents($logFile, "\n> $comando\n$output\n", FILE_APPEND);
