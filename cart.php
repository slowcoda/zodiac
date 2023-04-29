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
							<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartItem() ?></sup></a>
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

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Color of Product</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- the code used to call our total -->
                <?php
                    global $con;

                    $get_ip_add = GetIpAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products="Select * from `products` where product_id='$product_id'";
                        $result_products=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price=array($row_product_price['product_price']);
                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                            
                
                
                    
?>
                
            
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><?php echo "<img src='admin/product_images/$product_image1' width='100' height='100' alt='test'>";?></td>
                    <!--<td><input type='text' name='qty' class="form-input">-->
                    <?php
                        $get_ip_add = GetIpAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            global $quantities;
                            $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                        }
                    ?>
                    <td><input type='text' name='qty' value="<?php getQuantityNumber(); ?>" class="form-input"></td>
                    <td>
                        <select name='colorPICK' value='Select a Color' id='colorPICK' required>                            
                            
                            <option value='Black'>Black</option>
                            <option value='White'>White</option>
                        </select>
                    </td>
                    <td><?php echo "$$price_table" ?></td>
                    <td><input type='checkbox' name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                        
                        <input type="submit" value="Update" class='bg-light p-1 m-1 border-0' name='update_cart'>
                        <input type="submit" value="Remove Item" class='bg-light p-1 m-1 border-0' name='remove_cart'>
                    </td>
                </tr>
<?php
}
} ?>
            </tbody>
        </table>
        <div class="d-flex mb-3">
            <h4 class="px-3">Subtotal:<strong class="text"><?php echo " $$total_price" ?></strong></h4>
            <a href="index.php"><button class="bg-light p-3 py-2 m-1 border-1">Continue Shopping</button></a>
            <a href="#"><button class="bg-light p-3 py-2 m-1 border-1">Checkout</button></a>
        </div>
    </div>
</div>
</form>

<?php
	function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo$remove_item=remove_cart_item();
    
    
    GetIpAddress();
	$ip = GetIpAddress();
?>
<br>
<?php
	include("./includes/footer.php")
?>	
	
	
	
	
	
	
	
</div>





<!-- my link for bootstrap(JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>