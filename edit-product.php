<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['usuario'])) {
    // Mostrás un mensaje bonito en el diseño o redirigís con un error en querystring
    header("Location: login_form.php?error=Debes iniciar sesión");
    exit();
}

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>ID de producto no especificado.</div></div>";
    exit();
}

// Eliminar producto si se pidió
if (isset($_POST['delete'])) {
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

// Actualizar producto si se envió formulario
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = floatval($_POST['price']);
    $stars = intval($_POST['stars']);
    $stock = isset($_POST['isInStock']) ? 1 : 0;
    $image = $_POST['imageName'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, stars=?, isInStock=?, imageName=? WHERE id=?");
    $stmt->bind_param("ssdiisi", $name, $description, $price, $stars, $stock, $image, $id);
    $stmt->execute();
    header("Location: admin.php");
    exit();
}

// Obtener producto
$res = mysqli_query($conn, "SELECT * FROM products WHERE id = $id LIMIT 1");
$product = mysqli_fetch_assoc($res);
if (!$product) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Producto no encontrado.</div></div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="text-center mb-4">Editar Producto</h2>

                <?php if (isset($_GET['updated'])): ?>
                    <div class="alert alert-success text-center">Producto actualizado con éxito.</div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <input name="name" class="form-control" placeholder="Nombre" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Descripción"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <input name="price" type="number" step="0.01" class="form-control" placeholder="Precio" value="<?php echo $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input name="stars" type="number" min="0" max="5" class="form-control" placeholder="Estrellas (0-5)" value="<?php echo $product['stars']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="isInStock" <?php echo $product['isInStock'] ? 'checked' : ''; ?>> En Stock</label>
                    </div>
                    <div class="form-group">
                        <input name="imageName" class="form-control" placeholder="Nombre de imagen (ej: producto.jpg)" value="<?php echo htmlspecialchars($product['imageName']); ?>" required>
                    </div>
                    <button name="update" class="btn btn-primary" type="submit">Actualizar Producto</button>
                    <button name="delete" class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que querés eliminar este producto?')">Eliminar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
