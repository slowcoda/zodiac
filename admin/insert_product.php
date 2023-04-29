<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        
        $product_tile=$_POST['product_title'];
        $product_desc=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_zodiac=$_POST['product_zodiac'];
        $product_price=$_POST['product_price'];
        $product_status='true';
        
        //images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];

        //check if fields are empty
        if($product_tile=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_zodiac=='' or $product_price=='' or $product_image1=='' or $product_image2=='' ){
            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");

            $insert_products="insert into `products` (product_title,product_desc,product_keywords,category_id,zodiac_id,product_image1,product_image2,product_price,date,status) values('$product_tile','$product_desc','$product_keywords','$product_category','$product_zodiac','$product_image1','$product_image2','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('Successfully added Product')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-ADMIN</title>

	<!-- my link for bootstrap(CSS) -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
            <!-- product title below -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- product desc below -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <!-- product keywords below -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Product Associated Category</label> 
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <!-- applies the product types names to dropdown -->
                    <?php
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_zodiac" class="form-label">Product Associated Zodiac Sign</label>                
                <select name="product_zodiac" id="" class="form-select">
                    <option value="">Select a Zodiac Sign</option>
                    <!-- applies the zodiac names to dropdown -->
                    <?php
                    $select_query="Select * from `zodiac`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $zodiac_title=$row['zodiac_title'];
                        $zodiac_id=$row['zodiac_id'];
                        echo "<option value='$zodiac_id'>$zodiac_title</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" placeholder="Select an Image" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" placeholder="Select an Image" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter the Price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-secondary mb-3 px-2" value="Insert Products">
            </div>            
        </form>
    </div>


<!-- my link for bootstrap(JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<div class="bg-body-tertiary p-3 text-center">
		<p>Made by Evan Moreno CPT-283-82 Php Programming</p>
</div>
</body>
</html>