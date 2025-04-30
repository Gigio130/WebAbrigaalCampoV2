<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: colaboradores.html");
    exit;
}
require_once 'db.php';

// Obtener beneficiarios
$beneficiarios = $pdo->query("
    SELECT p.nombres, p.apellidos, b.descripcion
    FROM personas p
    INNER JOIN beneficiarios b ON p.id = b.persona_id
")->fetchAll();

// Obtener colaboradores
$colaboradores = $pdo->query("
    SELECT p.nombres, p.apellidos, c.tipo_colaboracion, c.descripcion
    FROM personas p
    INNER JOIN colaboradores c ON p.id = c.persona_id
")->fetchAll();

// Obtener donantes
$donantes = $pdo->query("
    SELECT p.nombres, p.apellidos, d.tipo_donacion, d.descripcion
    FROM personas p
    INNER JOIN donantes d ON p.id = d.persona_id
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #004d00;
        }

        a.logout {
            float: right;
            font-weight: bold;
        }

        h3 {
            margin-top: 40px;
            color: #007a33;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #e6ffe6;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> <a class="logout" href="logout.php">Cerrar sesión</a></h2>

<h3>Beneficiarios registrados:</h3>
<table>
    <tr><th>Nombre</th><th>Apellido</th><th>Descripción</th></tr>
    <?php foreach ($beneficiarios as $b): ?>
        <tr>
            <td><?= htmlspecialchars($b['nombres']) ?></td>
            <td><?= htmlspecialchars($b['apellidos']) ?></td>
            <td><?= htmlspecialchars($b['descripcion']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Colaboradores registrados:</h3>
<table>
    <tr><th>Nombre</th><th>Apellido</th><th>Tipo</th><th>Descripción</th></tr>
    <?php foreach ($colaboradores as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['nombres']) ?></td>
            <td><?= htmlspecialchars($c['apellidos']) ?></td>
            <td><?= htmlspecialchars($c['tipo_colaboracion']) ?></td>
            <td><?= htmlspecialchars($c['descripcion']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Donantes registrados:</h3>
<table>
    <tr><th>Nombre</th><th>Apellido</th><th>Tipo</th><th>Descripción</th></tr>
    <?php foreach ($donantes as $d): ?>
        <tr>
            <td><?= htmlspecialchars($d['nombres']) ?></td>
            <td><?= htmlspecialchars($d['apellidos']) ?></td>
            <td><?= htmlspecialchars($d['tipo_donacion']) ?></td>
            <td><?= htmlspecialchars($d['descripcion']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

