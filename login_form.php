<?php include 'db_connect.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
	<div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
		<div class="w-100" style="max-width: 400px;">
			<div class="section-title text-center">
				<h3 class="title">Login</h3>
			</div>
			<?php if (isset($_GET['error'])): ?>
				<div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
			<?php endif; ?>
			<form action="login.php" method="POST">
				<div class="form-group">
					<input class="form-control input" type="text" name="usuario" placeholder="Usuario" required>
				</div>
				<div class="form-group">
					<input class="form-control input" type="password" name="clave" placeholder="Contraseña" required>
				</div>
				<div class="text-center">
					<button class="primary-btn" type="submit">Iniciar sesión</button>
				</div>
			</form>
		</div>
	</div>
<?php include 'footer.php'; ?>
</body>
</html>
