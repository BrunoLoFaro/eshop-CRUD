<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
	
<?php include 'header.php'; ?>
		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">

<!-- aside Widget -->
<div class="aside">
	<h3 class="aside-title">Top selling</h3>
	<?php
	$topQuery = "SELECT * FROM products ORDER BY price DESC LIMIT 3";
	$topResult = mysqli_query($conn, $topQuery);
	while ($topProduct = mysqli_fetch_assoc($topResult)) { ?>
		<div class="product-widget">
			<div class="product-img">
				<img src="images/<?php echo htmlspecialchars($topProduct['imageName']); ?>" alt="">
			</div>
			<div class="product-body">
				<p class="product-category">Electronics</p>
				<h3 class="product-name"><a href="#"><?php echo htmlspecialchars($topProduct['name']); ?></a></h3>
				<h4 class="product-price">$<?php echo number_format($topProduct['price'], 2); ?></h4>
			</div>
		</div>
	<?php } ?>
</div>
<!-- /aside Widget -->

					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store products -->
						<?php

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!-- store products -->
<div class="row">
	<?php while ($product = mysqli_fetch_assoc($result)) { ?>
		<div class="col-md-4 col-xs-6">
			<div class="product">
				<div class="product-img">
						<img src="img/<?php echo htmlspecialchars($product['imageName']); ?>" alt="">
					<div class="product-label">
						<?php if ($product['isInStock']) { ?>
							<span class="new">NEW</span>
						<?php } else { ?>
							<span class="sale">OUT</span>
						<?php } ?>
					</div>
				</div>
				<div class="product-body">
					<p class="product-category">Electronics</p>
					<h3 class="product-name"><a href="#"><?php echo htmlspecialchars($product['name']); ?></a></h3>
					<h4 class="product-price">$<?php echo number_format($product['price'], 2); ?></h4>
					<div class="product-rating">
						<?php for ($i = 1; $i <= 5; $i++) {
							echo $i <= $product['stars'] ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
						} ?>
					</div>
					<div class="product-btns">
						<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
						<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
						<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
					</div>
				</div>
				<div class="add-to-cart">
					<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- /store products -->

						<!-- /store products -->

						<!-- store bottom filter -->
						<!-- <div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div> -->
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre nosotros</h3>
								<p>Somos la empresa de venta de electrónicos más grande America Latina.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Intermédanos 776</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+5491195518432</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>electro@email.com</a></li>
								</ul>
							</div>
						</div>

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a><i class="fa fa-cc-visa"></i></a></li>
								<li><a><i class="fa fa-credit-card"></i></a></li>
								<li><a><i class="fa fa-cc-paypal"></i></a></li>
								<li><a><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a><i class="fa fa-cc-discover"></i></a></li>
								<li><a><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
