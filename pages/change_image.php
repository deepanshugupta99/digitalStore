<?php 
session_start();
require('../conn.php');
$uid = $_SESSION['uid'];
//$image = $_POST['image'];
//echo $image;




//The name of the directory that we need to create.
$directoryName = "../user_image/".$uid;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
$target_dir = "../user_image/".$uid."/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$image =  basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		mysqli_query($query, "UPDATE users set image='$image' WHERE uid='$uid'");
		echo "<script>alert('Profile Image Changed Succesfuly');window.location.assign('../usr_profile.php');</script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}?>
