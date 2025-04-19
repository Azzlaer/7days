<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consola Telnet en Tiempo Real</title>
    <style>
        body {
            background-color: #0d0d0d;
            color: #0f0;
            font-family: monospace;
            padding: 20px;
        }

        #terminal {
            width: 100%;
            height: 400px;
            background: #111;
            border: 1px solid #444;
            padding: 10px;
            overflow-y: scroll;
            white-space: pre-wrap;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            background: #222;
            color: #0f0;
            border: 1px solid #444;
        }

        button {
            padding: 10px 20px;
            background: #444;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Consola Telnet (7 Days to Die)</h2>
    <div id="terminal">Cargando consola...</div>
    <br>
    <input type="text" id="comando" placeholder="Escribe un comando Telnet">
    <button onclick="enviarComando()">Enviar</button>

    <script>
        function actualizarConsola() {
            fetch('fetch_log.php')
                .then(response => response.text())
                .then(data => {
                    const terminal = document.getElementById('terminal');
                    terminal.textContent = data;
                    terminal.scrollTop = terminal.scrollHeight;
                });
        }

        function enviarComando() {
            const comando = document.getElementById('comando').value;
            if (!comando) return;

            fetch('telnet_send.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'comando=' + encodeURIComponent(comando)
            }).then(() => {
                document.getElementById('comando').value = '';
                setTimeout(actualizarConsola, 1000);
            });
        }

        setInterval(actualizarConsola, 3000);
        actualizarConsola();
    </script>
</body>
</html>
