<?php

include('./includes/connect.php');
function getproducts(){
        global $con;

        if(!isset($_GET['category'])){
            if(!isset($_GET['zodiac'])){

        
                $select_query="Select * from `products` order by rand()";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_desc=$row['product_desc'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $zodiac_id=$row['zodiac_id'];
        
                    echo "<div class='col-md-2 mb-4'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <h5>$$product_price</h5>
                                <p class='card-text'>$product_desc</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Details</a>
                            </div>
                        </div>
                    </div>";

                }
            }
        }
}



function get_unique_categories(){
    global $con;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="Select * from `products` where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_desc=$row['product_desc'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $zodiac_id=$row['zodiac_id'];
    
    echo "<div class='col-md-2 mb-4'>
    <div class='card'>
        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <h5>$$product_price</h5>
            <p class='card-text'>$product_desc</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Details</a>
        </div>
    </div>
</div>";

}
}
}

function get_unique_zodiac(){
    global $con;

    if(isset($_GET['zodiac'])){
        $zodiac_id=$_GET['zodiac'];
    $select_query="Select * from `products` where zodiac_id=$zodiac_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>There are no products for this Zodiac Sign</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_desc=$row['product_desc'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $zodiac_id=$row['zodiac_id'];
    
    echo "<div class='col-md-2 mb-4'>
    <div class='card'>
        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <h5>$$product_price</h5>
            <p class='card-text'>$product_desc</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Details</a>
        </div>
    </div>
</div>";

}
}
}

function getZodiac(){
        global $con;
        $select_zodiac="Select * from `zodiac`";
        $result_zodiac=mysqli_query($con,$select_zodiac);
    while($row_data=mysqli_fetch_assoc($result_zodiac)){
        $zodiac_title=$row_data['zodiac_title'];
        $zodiac_id=$row_data['zodiac_id'];
        echo "<li class='nav item bg-body-secondary'>
        <a href='index.php?zodiac=$zodiac_id' class='nav-link text-dark'>$zodiac_title</a>";
    }
}

function getCategories(){
        global $con;
        $select_categories="Select * from `categories`";
        $result_categories=mysqli_query($con,$select_categories);

    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav item bg-body-secondary'>
        <a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a>";
    }
}

function view_details(){

        global $con;

        if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['zodiac'])){
                $product_id=$_GET['product_id'];
        
                $select_query="Select * from `products` where product_id=$product_id";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_desc=$row['product_desc'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $zodiac_id=$row['zodiac_id'];
                    $zodiac_item=$row['itemdesc'];
        
                    echo "<div class='col-md-12 '>
                        <div class='card'>
                            <div class='float-start'>
                                <img src='./admin/product_images/$product_image1' class='floatLeft rounded mx-auto d-block width='300' height='300'' alt='$product_title'>
                            </div>
                            <div class='float-end'>
                                <img src='./admin/product_images/$product_image2' class='floatLeft rounded mx-auto d-block width='300' height='300'' alt='$product_title'>
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <h3 class='card-title'>$ $product_price</h3>
                                <p class='card-text'>$product_desc</p>
                                <p class='card-text'>$zodiac_item</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                                <a href='index.php' class='btn btn-secondary'>Return to Home</a>
                            </div>
                        </div>
                    </div>";

                }
            }
        }
}
}


function get_related(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['zodiac'])){

    
            $select_query="Select * from `products` order by rand() LIMIT 0,6";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_desc=$row['product_desc'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $zodiac_id=$row['zodiac_id'];
    
                echo "<div class='col-md-2 mb-4'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <h5>$$product_price</h5>
                            <p class='card-text'>$product_desc</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Details</a>
                        </div>
                    </div>
                </div>";

            }
        }
    }
}

function get_home(){
    global $con;

    if(!isset($_GET['category'])){
        if(!isset($_GET['zodiac'])){

    
            $select_query="Select * from `products` order by rand() LIMIT 0,9";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_desc=$row['product_desc'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $zodiac_id=$row['zodiac_id'];
                $zodiac_item=$row['itemdesc'];
    
                echo "<div class='col-md-2 mb-4'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <h5>$$product_price</h5>
                            <p class='card-text'>$product_desc</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Details</a>
                        </div>
                    </div>
                </div>";

            }
        }
    }
}

function cart(){
    if(isset($_GET['add_to_cart'])){
            global $con;

            $get_ip_add = GetIpAddress();
            $get_product_id=$_GET['add_to_cart'];
            
            $select_query="Select * from `cart_details` where ip_address='$get_ip_add' and 
            product_id=$get_product_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('This item is already present inside cart')</script>";
        echo "<script>window.open('index.php')</script>";
    }else{
        $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
    }

    }

}

// I used the get ip function in order to keep track of user's orders, it's mentioned in my 'cart_details' database

function GetIpAddress(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// cart number function

function cartItem(){
    if(isset($_GET['add_to_cart'])){
        global $con;

        $get_ip_add = GetIpAddress();
        $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        }else{
            global $con;
            $get_ip_add = GetIpAddress();
            $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

function total_cart(){
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
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }    


    }
    echo $total_price;


}

function getQuantityNumber(){
    global $con;
    $get_ip_add = GetIpAddress();
    $select_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $quantity=1;
        $quantity=$row['quantity'];

    }
    echo $quantity;

}





?>