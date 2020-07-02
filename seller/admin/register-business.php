<?php 
if(isset($_POST['b_register']))
{
require_once('../conn.php');
$bname=$_POST['b_name'];
$bemail = $_POST['email'];
$bwebsite = $_POST['bwebsite'];
$number=$_POST['contact'];
$cat=$_POST['cat'];
$scat=$_POST['scat1'];
$desc =$_POST['desc'];
$shopno=$_POST['shop_no'];
$area=$_POST['area'];
$sector=$_POST['sector'];
$block=$_POST['block'];
session_start();
$m_id = $_SESSION['mid'];


$que1 = mysqli_query($query,"insert into business(`m_id`,`business_name`,`desc`, `contact`, `email`, `website`,`category_id`,`scat_id`,`area_id`,`shopno`,`block`,`sector`) values('$m_id','$bname','$desc','$number', '$bemail','$bwebsite','$cat','$scat','$area','$shopno','$block','$sector')");

$que2 = mysqli_query($query, "select * from business where m_id = '$m_id' order by b_id desc");
$result =  mysqli_fetch_array($que2);
$b_id = $result['b_id'];
if($b_id!=null){
	  echo "<script>alert('Business Rugistered'); window.location.assign('index.php');</script>";
	header('location:index.php');
    }
else{
  	  echo "<script>alert('Some Technicle error'); window.location.assign('business_details.php');</script>";	
	header('location:business_details.php');
}

}


if(isset($_POST['p_register']))
{
require_once('../conn.php');
echo "ander aaya";
$pname=$_POST['p_name'];
$mrp=$_POST['mrp'];
$sprice=$_POST['s_price'];
$quantity=$_POST['quantity'];
$cat=$_POST['cat'];
$scat=$_POST['scat'];
$brand='0';
$desc =$_POST['desc'];
//$img1 = $_POST['img1'];
//$img2 = $_POST['img2'];
session_start();
$m_id = $_SESSION['mid'];
$b_id= $_SESSION['bid'];
echo $b_id;
$product_insert = mysqli_query($query, "insert into product (`b_id`,`pname`,`mrp`,`selling_price`,`quantity`,`category`,`s_cat_id`,`brand`,`pdesc`) values('$b_id', '$pname', '$mrp', '$sprice','$quantity','$cat','$scat','$brand','$desc')");
if($product_insert==true)
{
	echo "product registered successfully";
}
else {
	  	  echo "<script>alert('Technicle error'); window.location.assign('myadds.php');</script>";
	header('location:myadds.php');
}
$pid_check=mysqli_query($query,"select * from product where b_id='$b_id' and pname='$pname'");
$pid_result=mysqli_fetch_array($pid_check);
$pid=$pid_result['p_id'];



//The name of the directory that we need to create.
$directoryName = "../../product_image/".$pid;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
$target_dir = "../../product_image/".$pid."/";
$target_file = $target_dir . basename($_FILES["img1"]["name"]);
echo basename($_FILES["img1"]["name"]);
$img1 =  basename($_FILES["img1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
 
    $check = getimagesize($_FILES["img1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img1"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img1"]["name"]). " has been uploaded.";
		mysqli_query($query, "UPDATE product set img1='$img1' WHERE p_id='$pid'");
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




//The name of the directory that we need to create.
$directoryName = "../../product_image/".$pid;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
$target_dir = "../../product_image/".$pid."/";
$target_file = $target_dir . basename($_FILES["img2"]["name"]);
$img2 =  basename($_FILES["img2"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
 
    $check = getimagesize($_FILES["img2"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img2"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img2"]["name"]). " has been uploaded.";
		mysqli_query($query, "UPDATE product set img2='$img2' WHERE p_id='$pid'");
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo "<script>alert('Product Regitered Succesfuly'); window.location.assign('myadds.php');</script>";
}
?>






