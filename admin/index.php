<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>

	<!-- my link for bootstrap(CSS) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<img src="../icon.png" alt="" class="logo">
				<nav class="navbar navbar-expand-lg bg-body-tertiary">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="" class="nav-link">Welcome Admin</a>
						</li>
					</ul>
				</nav>
			</div>
		</nav>

		<div class="bg light">
			<h3 class="text-center p-2">Admin Console</h3>
		</div>

		<div class="row">
			<div class="col-md-12 bg-secondary p-2 d-flex align-items-center">
				<div class="px-5">
					<a href="#"><img src="../icon.png" alt="" class="admin_image"></a>
					<p class="text-light text-center">Admin Name</p>
				</div>
				<div class="button text-center">
					<button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-secondary my-1">Insert New Products</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">View All Products</a></button>
					<button class="my-3"><a href="index.php?insertcategory" class="nav-link text-light bg-secondary my-1">Insert Categories</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">View Categories</a></button>
					<button class="my-3"><a href="index.php?insertzodiac" class="nav-link text-light bg-secondary my-1">Insert Zodiac Signs</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">View Zodiac Signs</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">All Orders</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">All Payments</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">List users</a></button>
					<button class="my-3"><a href="" class="nav-link text-light bg-secondary my-1">Logout</a></button>
				</div>	
			</div>
		</div>
	</div>

	<div class="container my-3">
		<?php
			if(isset($_GET['insertcategory'])) {
				include('insertcategories.php');
		}
		if(isset($_GET['insertzodiac'])) {
			include('insertzodiac.php');
		}		
		?>
	</div>


<!-- my link for bootstrap(JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div class="bg-body-tertiary p-3 text-center">
		<p>Made by Evan Moreno CPT-283-82 Php Programming</p>
</div>



</body>
</html>