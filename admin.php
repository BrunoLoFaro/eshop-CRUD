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
	<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                <a href="#" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $p['id']; ?>)">Eliminar</a>
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
<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- Activar DataTable -->
<script>
  $(document).ready(function() {
    $('.table').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      }
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete(id) {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción no se puede deshacer',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'delete-product.php?id=' + id;
      }
    });
  }
</script>
</html>
