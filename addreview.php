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
<section class="book" id="book">

    <h1 class="heading">
        <span>a</span>
        <span>d</span>
        <span>d</span>
        <span class="space"></span>
        <span>r</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>

    <div class="row">

        <div class="image">
            <!--img src="images/book-img.svg" alt=""-->
             
             <?php
include "config.php";

if(isset($_POST['saves'])){
    


    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $exp = explode('.',$file_name);
    $file_ext = end($exp);
    $extensions = array("jpeg","jpg","png");
  
    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file";
    }
  
    if($file_size > 2097152)
    {
      $errors[] = "File size must be 2MB or lower."; 
    }
  
    if(empty( $errors) == true){
     move_uploaded_file($file_tmp,"images/".$file_name);
    }else {
       print_r($errors);
       die();
    }

$title = mysqli_real_escape_string($conn,$_POST['rname']);
$description = mysqli_real_escape_string($conn,$_POST['desc']);
        
$sql2 = "INSERT INTO review(name,descp,img) VALUES('{$title}','{$description}','{$file_name}')";

$result = mysqli_query($conn,$sql2);
header("location: {$hostname}/index.php");
/*
if($result){
    header("location: {$hostname}/index.php");
}else {
   echo "Query Failed.";
}
*/
}

?>
        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" enctype="multipart/form-data">
            <div class="inputBox">
                <h3>name</h3>
                <input type="text" name="rname" placeholder="name" required>
            </div>
            <div class="inputBox">
                <h3>description</h3>
                <input type="text" name="desc" placeholder="type your message" required>
            </div>
            <div class="inputBox">
                <h3>post image</h3>
                <input type="file" name="fileToUpload" required>
            </div>
            <input type="submit" name="saves" class="btn" value="save">
        </form>

    </div>

    </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src=" script.js"></script>

</body>
</html>

