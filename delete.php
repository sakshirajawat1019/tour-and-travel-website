<html>
<head>
</head>
<?php
$msg = "";
if(isset($_POST['save'])) {
    // the path to store the uploaded image

    $target = "images/".basename($_FILES['fileToUpload']['name']);

    //connect to database
    include "config.php";

    //get all the submitted data from the form
    $image = $_FILES['fileToUpload']['name'];
    $title = mysqli_real_escape_string($conn,$_POST['name2']);
    $description = mysqli_real_escape_string($conn,$_POST['desc']);

    $sql2 = "INSERT INTO review(name,descp,img) VALUES('{$title}','{$description}','{$image}')";
        
        mysqli_query($conn,$sql2);//store the submitted data into database
 
       //now let's move the upload image into the folder: images
       if(move_uploaded_file($_FILES['fileToUpload']['temp_name'],$target)) {
           $msg = "image uploaded successfully";
       }
       else{
           $msg = "there was a problem uploading image";
       }

}
?>
<form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
            <div class="inputBox">
                <h3>name</h3>
                <input type="text" name="name2" placeholder="name">
            </div>
            <div class="inputBox">
                <h3>description</h3>
                <input type="text" name="desc" placeholder="type your message">
            </div>
            <div class="inputBox">
                <h3>post image</h3>
                <input type="file" name="fileToUpload" required>
            </div>
            <input type="submit" name="save" class="btn" value="save">
        </form>
</html>