<?php
session_start();
include 'db_connect.php';

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Para contraseñas en texto plano:
    if ($user['password'] === $clave) {
        $_SESSION['usuario'] = $user['username'];
        header("Location: admin.php");
        exit();
    }

    // Para contraseñas hasheadas (futuro):
    // if (password_verify($clave, $user['password'])) {
    //     $_SESSION['usuario'] = $user['username'];
    //     header("Location: admin.php");
    //     exit();
    // }
}

header("Location: login_form.php?error=Credenciales inválidas");
exit();
