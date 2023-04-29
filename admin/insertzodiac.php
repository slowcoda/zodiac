<?php
    include('../includes/connect.php');
    if(isset($_POST['insertzodiac'])) {
        $zodiactitle=$_POST['zodiacinfo'];       
        
        $select_query="Select * from `zodiac` where zodiac_title='$zodiactitle'";
        $result_select=mysqli_query($con,$select_query); 
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This Zodiac Sign is present inside the database')</script>";
        }
        else {

        

            $insertquery="insert into `zodiac` (zodiac_title) values ('$zodiactitle')";
            $result=mysqli_query($con,$insertquery);
            if($result){
                echo "<script>alert('The Zodiac Sign has been inserted successfully')</script>";
            }
        }
    }

?>



<h2 class="text-center">Insert Zodiac Signs</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-body-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="zodiacinfo" placeholder="Insert Zodiac Sign" aria-label="zodiac" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-body-secondary border-0 p-2 my-3" name="insertzodiac" value="Insert Zodiac Sign">
    </div>
</form>