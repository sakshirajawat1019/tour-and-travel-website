<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tour and travel agency</title>
    

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    
    
             
             <?php
include "config.php";

if(isset($_POST['rsave'])){
    


$email = mysqli_real_escape_string($conn,$_POST['email']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
        
$sql2 = "INSERT INTO register(email,name,password) VALUES('{$email}','{$name}','{$password}')";

$result = mysqli_query($conn,$sql2);
 
if($result){
    header("location: {$hostname}/index.php");
}else {
   echo "Query Failed.";
}

}

?>
        <section class="book" id="book">
        <div class="row">

<div class="image">
    <!--img src="images/book-img.svg" alt=""-->
    
    <h1 class="heading">
        <span>register me</span>
        
    </h1>
        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" enctype="multipart/form-data">
        <div class="inputBox"> 
        <input type="email" placeholder="enter your email" name="email" required><br>
        </div>
        <div class="inputBox"> 
        <input type="text" placeholder="enter your name" name="name" required><br>
        </div>
        <div class="inputBox">
        <input type="password" placeholder="enter your password" name="password" required><br>
        </div>
        <div class="inputBox">
        <input type="submit" value="login now" class="btn" name="rsave"><br>
        </div>
        
        </form>

    </div>

    </div>

</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src=" script.js"></script>

</body>
</html>

