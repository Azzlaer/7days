<?php
function loadXMLConfig($filename) {
    if (!file_exists($filename)) {
        die("Archivo XML no encontrado.");
    }
    return simplexml_load_file($filename);
}

function saveXMLConfig($xml, $filename) {
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save($filename);
}

$filename = 'C:\\Servidores\\Steam\\steamapps\\common\\7 Days to Die Dedicated Server\\serverconfig.xml';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = loadXMLConfig($filename);
    foreach ($_POST as $name => $value) {
        foreach ($xml->property as $property) {
            if ((string)$property['name'] === $name) {
                $property['value'] = $value;
            }
        }
    }
    saveXMLConfig($xml, $filename);
    echo "<p style='color:green;'>Configuración guardada exitosamente.</p>";
}

$xml = loadXMLConfig($filename);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar serverconfig.xml</title>
    <style>
        body { font-family: Arial, sans-serif; background: #121212; color: #f0f0f0; padding: 20px; }
        .form-container { background: #1e1e1e; padding: 20px; border-radius: 10px; width: 80%; margin: auto; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="number"], select {
            width: 100%; padding: 8px; margin-top: 5px;
            background: #2c2c2c; border: 1px solid #444; color: #fff;
        }
        input[type="submit"] {
            margin-top: 20px; padding: 10px 20px;
            background: #4caf50; border: none; color: white;
            font-size: 16px; border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Editor de Configuración del Servidor</h1>
    <form method="POST">
        <?php foreach ($xml->property as $property): ?>
            <?php $name = (string)$property['name']; ?>
            <label for="<?php echo htmlspecialchars($name); ?>">
                <?php echo htmlspecialchars($name); ?>
            </label>
            <input type="text" id="<?php echo htmlspecialchars($name); ?>" 
                   name="<?php echo htmlspecialchars($name); ?>" 
                   value="<?php echo htmlspecialchars($property['value']); ?>">
        <?php endforeach; ?>
        <input type="submit" value="Guardar Cambios">
    </form>
</div>
</body>
</html>
