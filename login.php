<?php
session_start();
include 'db_connect.php'; // conexión a la base de datos si vas a validar contra ella

// Obtener datos del formulario
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

// Ejemplo simple con valores fijos (cambiar por validación de base de datos si querés)
if ($usuario === 'admin' && $clave === '1234') {
    $_SESSION['usuario'] = $usuario;
    header("Location: admin.php");
    exit();
} else {
    header("Location: login_form.php?error=Credenciales inválidas");
    exit();
}
