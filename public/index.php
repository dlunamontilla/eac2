<?php
    $database = __DIR__ . "/../database/eac2.db";

    if (!file_exists($database)) {
        include __DIR__ . "/../install.php";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de base de datos</title>
</head>
<body>
    <main id="app">
        <h2>Resultados</h2>
    </main>
</body>
</html>