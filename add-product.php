<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['usuario'])) {
    // Mostrás un mensaje bonito en el diseño o redirigís con un error en querystring
    header("Location: login_form.php?error=Debes iniciar sesión");
    exit();
}

// Guardar producto nuevo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = floatval($_POST['price']);
    $stars = intval($_POST['stars']);
    $stock = isset($_POST['isInStock']) ? 1 : 0;

    $uploadDir = 'img/';
    $foto = $_FILES['foto'];

    if ($foto['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $foto['tmp_name'];
        $fileName = uniqid() . '_' . basename($foto['name']); // nombre único
        $destPath = $uploadDir . $fileName;

        move_uploaded_file($fileTmpPath, $destPath);

        $image = $fileName;
    } else {
        $image = 'default.jpg'; // o null, según tu lógica
    }

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stars, isInStock, imageName) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiis", $name, $description, $price, $stars, $stock, $image);
    $stmt->execute();

    header("Location: add-product.php?success=1");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center mb-4">Agregar Producto</h2>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success text-center">Producto agregado con éxito.</div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input name="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group">
                        <input name="price" type="number" step="0.01" class="form-control" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <input name="stars" type="number" min="0" max="5" class="form-control" placeholder="Estrellas (0-5)" required>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="isInStock"> En Stock</label>
                    </div>
                    <div class="form-group">
                        <label><input type="file" id="foto" name="foto" REQUIRED>Foto</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Agregar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
