<?php
include('includes/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chinese Zodiac PHP EXAM</title>
	
	<!-- my link for bootstrap(CSS) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


	<!-- font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<!-- my css link -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- my navigation -->
<div class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Chinese Zodiac Store</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="display_all.php">All Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php">Checkout</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItem(); ?></sup></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php">Order Cost: $<?php total_cart(); ?></a>
						</li>
					</ul>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<!--<button class="btn btn-outline-success" type="submit">Search</button>-->
						<input type="submit" value="Search" class="btn btn-outline-dark">
					</form>
				</div>
			</div>
		</nav>
	
		<?php
		cart();
		?>

		<nav class="navbar navbar-expand-lg bg-body-secondary">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Welcome Guest</a>
				</li>		
				<li class="nav-item">
					<a class="nav-link" href="#">Login</a>
				</li>			
			</ul>
		</nav>

		<div class="bg-light">
			<h3 class="text-center">Chinese Zodiac Store</h3>
			<p class="text-center">Buy your Chinese Zodiac Merchandise!</p>
		</div>

		<div class="row px-2">
			<div class="col-md-10">
			<div class="row">
				<?php
				get_home();
				get_unique_categories();
				get_unique_zodiac();
				GetIpAddress();
				$ip = GetIpAddress();
				
				?>
			</div>
				</div>
			<div class="col-md-2 bg-body-secondary p-0">
				<!-- side bar for better navigation -->
				<ul class="navbar-nav me-auto text-center">
					<li class="nav item bg-body">
						<a href="#" class="nav-link text-dark"><h4>Zodiac Signs</h4></a>
					</li>
					<?php
					getZodiac();
					?>
				</ul>
				<ul class="navbar-nav me-auto text-center">
					<li class="nav item bg-body">
						<a href="#" class="nav-link text-dark"><h4>Type of Product</h4></a>
					</li>
					<?php
					getCategories();
					?>
				</ul>
			</div>
		</div>

<?php
	include("./includes/footer.php")
?>	
	
	
	
	
	
	
	
</div>





<!-- my link for bootstrap(JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>