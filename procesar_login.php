<?php
session_start();
require_once 'db.php';

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios_admin WHERE usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['usuario'] = $user['usuario'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

