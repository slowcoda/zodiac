<?php
    include('../includes/connect.php');
    if(isset($_POST['insertcategory'])) {
        $categorytitle=$_POST['categoryinfo'];       
        
        $select_query="Select * from `categories` where category_title='$categorytitle'";
        $result_select=mysqli_query($con,$select_query); 
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This category is present inside the database')</script>";
        }
        else {

        

            $insertquery="insert into `categories` (category_title) values ('$categorytitle')";
            $result=mysqli_query($con,$insertquery);
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    }

?>



<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-body-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="categoryinfo" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-body-secondary border-0 p-2 my-3" name="insertcategory" value="Insert Categories">
    </div>
</form>