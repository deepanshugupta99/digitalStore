<?php
session_start();
if(isset($_POST['b_update']) and isset($_SESSION['bid']))
{
require_once('../../conn.php');
$bid=$_SESSION['bid'];
$bid_check1=mysqli_query($query,"select * from business where b_id='$bid'");
	$bid_result2=mysqli_fetch_array($bid_check1);
if($_POST['b_name']!=null)
{
$bname=$_POST['b_name'];
}
else{
$bname=	$bid_result2['business_name'];
}
if($_POST['email']!=null)
{
$bemail = $_POST['email'];
}
else{
$bemail=$bid_result2['email'];
}
if($_POST['bwebsite']!=null)
{
$bwebsite = $_POST['bwebsite'];
}
else{
$bwebsite=$bid_result2['website'];
}
if($_POST['contact']!=null)
{
$number=$_POST['contact'];
}
else{
$number=$bid_result2['contact'];
}
if($_POST['cat']!='0')
{
$cat=$_POST['cat'];
}
else{
$cat=$bid_result2['category_id'];
}
if($_POST['scat1']!='0')
{
$scat=$_POST['scat1'];
}
else{
$scat=$bid_result2['scat_id'];
}
if($_POST['desc']!=null)
{
$desc =$_POST['desc'];
}
else{
$desc=$bid_result2['desc'];
}
if($_POST['shop_no']!=null)
{
$shopno=$_POST['shop_no'];
}
else{
$shopno=$bid_result2['shopno'];
}
if($_POST['area']!='0')
{
$area=$_POST['area'];
}
else{
$area=$bid_result2['area_id'];
}
if($_POST['sector']!=null)
{
$sector=$_POST['sector'];
}
else{
$sector=$bid_result2['sector'];
}
if($_POST['block']!=null)
{
$block=$_POST['block'];
}
else{
$block=$bid_result2['block'];
}
echo $bid;
$update=mysqli_query($query,"update business set `business_name`='$bname', `desc`='$desc',`contact`='$number',`email`='$bemail',`website`='$bwebsite',`category_id`='$cat',`scat_id`='$scat',`area_id`='$area',`shopno`='$shopno',`block`='$block',`sector`='$sector' where `b_id`='$bid' ");
if($update==true)
{
	echo "<script>alert('Update successfully'); window.location.assign('../index.php')</script>";
	header('location:../index.php');
}
else{
echo "<script>alert('some tecnicle error please try again'); window.location.assign('../index.php')</script>";
	header('location:../index.php');

}
}

if(isset($_POST['p_update']))
{
require_once('../../conn.php');
$pid=$_SESSION['pidupdate'];
echo $pid;
$pid_check1=mysqli_query($query,"select * from product where p_id='$pid'");
	$pid_result2=mysqli_fetch_array($pid_check1);
if($_POST['p_name']!=null)
{
$pname=$_POST['p_name'];
}
else{
$pname=	$pid_result2['pname'];
}
if($_POST['mrp']!=null)
{
$mrp=$_POST['mrp'];
}
else{
$mrp=$pid_result2['mrp'];
}
if($_POST['img1']!=null)
{
$img1=$_POST['img1'];
}
else{
$img1=$pid_result2['img1'];
}
if($_POST['img2']!=null)
{
$img2=$_POST['img2'];
}
else{
$img2=$pid_result2['img2'];
}
if($_POST['s_price']!=null)
{
$sprice=$_POST['s_price'];
}
else{
$sprice=$pid_result2['selling_price'];
}
if($_POST['quantity']!=null)
{
$quantity=$_POST['quantity'];
}
else{
$quantity=$pid_result2['quantity'];
}
if($_POST['cat1']!='0')
{
$cat=$_POST['cat1'];
}
else{
$cat=$pid_result2['category'];
}
if($_POST['brand1']!='0')
{
$brand=$_POST['brand1'];
}
else{
$brand=$pid_result2['brand'];
}
if($_POST['desc']!=null)
{
$desc =$_POST['desc'];
}
else{
$desc=$pid_result2['pdesc'];
}


if($_POST['img1']!=null)
{
//The name of the directory that we need to create.
$directoryName = "../../../product_image/".$pid;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
$target_dir = "../../../product_image/".$pid."/";
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
}

if($_POST['img2']!=null)
{



//The name of the directory that we need to create.
$directoryName = "../../../product_image/".$pid;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
$target_dir = "../../../product_image/".$pid."/";
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
}


$update=mysqli_query($query,"update product set `pname`='$pname', `mrp`='$mrp',`selling_price`='$sprice',`quantity`='$quantity',`category`='$cat',`brand`='$brand',`pdesc`='$desc', `img1`='$img1', `img2`='$img2' where `p_id`='$pid' ");
if($update==true)
{
	echo "<script>alert('Update successfully'); window.location.assign('../myadds.php')</script>";
	
}
else{
echo "<script>alert('some tecnicle error please try again'); window.location.assign('../myadds.php')</script>";
	

}

}
?>