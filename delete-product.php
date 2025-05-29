<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login_form.php?error=Debes iniciar sesión");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: admin.php");
exit();
