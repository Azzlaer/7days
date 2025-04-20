<?php
$xmlFile = 'C:\Users\Guardia\AppData\Roaming\7DaysToDie\Saves\serveradmin.xml';
$xml = simplexml_load_file($xmlFile) or die("No se pudo cargar el archivo XML.");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>🧟‍♂️ Administración de Usuarios - 7 Days to Die</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #f8f8f2;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 20px;
            background-image: url('https://www.transparenttextures.com/patterns/asfalt-dark.png');
        }

        h1 {
            text-align: center;
            color: #ff5555;
            text-shadow: 2px 2px #000;
            font-size: 32px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #2a2a2a;
            box-shadow: 0 0 15px #111;
            border: 2px solid #444;
        }

        th, td {
            border: 1px solid #444;
            padding: 10px 15px;
            text-align: center;
        }

        th {
            background-color: #444;
            color: #0f0;
        }

        tr:hover {
            background-color: #333;
        }

        form {
            margin: 30px auto;
            max-width: 500px;
            background-color: #2a2a2a;
            padding: 20px;
            border: 2px solid #8b0000;
            border-radius: 10px;
            box-shadow: 0 0 10px #000;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin: 6px 0 12px;
            background-color: #111;
            color: #0f0;
            border: 1px solid #333;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #8b0000;
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ff0000;
            box-shadow: 0 0 10px red;
        }

        .delete-btn {
            color: #fff;
            background-color: #ff0000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        label {
            color: #ffd700;
        }

        b::before {
            content: "☣️ ";
        }

        b::after {
            content: " 🧟‍♀️";
        }

    </style>
</head>
<body>

<h1>🧟‍♂️ Panel de Usuarios - 7 Days to Die</h1>

<table>
    <tr>
        <th>Plataforma</th>
        <th>UserID</th>
        <th>Nombre</th>
        <th>Nivel de Permiso</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($xml->users->user as $index => $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['platform']) ?></td>
            <td><?= htmlspecialchars($user['userid']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['permission_level']) ?></td>
            <td>
                <form method="post" action="delete_user.php" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <input type="submit" value="Eliminar" class="delete-btn">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="post" action="add_user.php">
    <h2 style="text-align: center; color: #ff5555;">🧟 Agregar Nuevo Usuario</h2>

    <label>Plataforma:</label>
    <input type="text" name="platform" placeholder="Steam, Xbox, etc." required>

    <label>UserID:</label>
    <input type="text" name="userid" placeholder="Ej: 76561198021925107" required>

    <label>Nombre:</label>
    <input type="text" name="name" placeholder="Nombre de usuario (opcional)">

    <label>Nivel de Permiso:</label>
    <input type="text" name="permission_level" placeholder="Ej: 0" required>

    <input type="submit" value="Agregar Usuario">
</form>

</body>
</html>
