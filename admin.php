<?php include 'db_connect.php'; ?>
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Mostrás un mensaje bonito en el diseño o redirigís con un error en querystring
    header("Location: login_form.php?error=Debes iniciar sesión");
    exit();
}
$productos = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Lista de Productos</h2>
				<a href="add-product.php" class="btn btn-sm btn-warning">Agregar un nuevo producto</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($p = mysqli_fetch_assoc($productos)): ?>
                        <tr>
                            <td><img src="img/<?php echo htmlspecialchars($p['imageName']); ?>" width="50"></td>
                            <td><?php echo htmlspecialchars($p['name']); ?></td>
                            <td>$<?php echo number_format($p['price'], 2); ?></td>
                            <td><?php echo $p['isInStock'] ? 'Sí' : 'No'; ?></td>
                            <td>
                                <a href="edit-product.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="edit-product.php?id=<?php echo $p['id']; ?>&delete=1" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés eliminar este producto?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
