<?php
include "config.php";

if(isset($_POST['save']){
    


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

}

$title = mysqli_real_escape_string($conn,$_POST['rname']);
        $description = mysqli_real_escape_string($conn,$_POST['desc']);
        
$sql2 = "INSERT INTO review(name,descp,img) VALUES('{$title}','{$description}','{$image}')";

$result = mysqli_query($conn,$sql2);
 
if($result){
    header("location: {$hostname}/index.php");
}else {
   echo "Query Failed.";
}


?>