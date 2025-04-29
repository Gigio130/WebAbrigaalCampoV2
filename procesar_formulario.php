<?php
// procesar_formulario.php
require_once 'db.php';

// Recoger datos
$nombres = trim($_POST['nombres']);
$apellidos = trim($_POST['apellidos']);
$documento_identidad = trim($_POST['documento_identidad']);
$edad = intval($_POST['edad']);
$pais = trim($_POST['pais']);
$ciudad = trim($_POST['ciudad']);
$direccion = trim($_POST['direccion']);
$telefono = trim($_POST['telefono']);
$correo_electronico = trim($_POST['correo_electronico']);
$descripcion = trim($_POST['descripcion']);
$acepta_tratamiento_datos = isset($_POST['acepta_tratamiento_datos']) ? 1 : 0;
$rol = $_POST['rol'];

// Insertar en personas (ya sin restricción de correo)
$sql = "INSERT INTO personas (documento_identidad, nombres, apellidos, edad, pais, ciudad, direccion, telefono, correo_electronico, acepta_tratamiento_datos)
        VALUES (:documento_identidad, :nombres, :apellidos, :edad, :pais, :ciudad, :direccion, :telefono, :correo_electronico, :acepta_tratamiento_datos)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':documento_identidad' => $documento_identidad,
    ':nombres' => $nombres,
    ':apellidos' => $apellidos,
    ':edad' => $edad,
    ':pais' => $pais,
    ':ciudad' => $ciudad,
    ':direccion' => $direccion,
    ':telefono' => $telefono,
    ':correo_electronico' => $correo_electronico,
    ':acepta_tratamiento_datos' => $acepta_tratamiento_datos
]);

$persona_id = $pdo->lastInsertId();

// Insertar en la tabla correspondiente
if ($rol === 'beneficiario') {
    $sql = "INSERT INTO beneficiarios (persona_id, descripcion) VALUES (:persona_id, :descripcion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':persona_id' => $persona_id,
        ':descripcion' => $descripcion
    ]);
} elseif ($rol === 'colaborador') {
    $tipo_colaboracion = $_POST['tipo_colaboracion'];
    $sql = "INSERT INTO colaboradores (persona_id, tipo_colaboracion, descripcion) VALUES (:persona_id, :tipo_colaboracion, :descripcion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':persona_id' => $persona_id,
        ':tipo_colaboracion' => $tipo_colaboracion,
        ':descripcion' => $descripcion
    ]);
} elseif ($rol === 'donante') {
    $tipo_donacion = $_POST['tipo_donacion'];
    $sql = "INSERT INTO donantes (persona_id, tipo_donacion, descripcion) VALUES (:persona_id, :tipo_donacion, :descripcion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':persona_id' => $persona_id,
        ':tipo_donacion' => $tipo_donacion,
        ':descripcion' => $descripcion
    ]);
}

echo "Formulario enviado exitosamente.";
?>

