<?php 
session_start();
require('../conn.php');
if(isset($_GET['submit']))
{
$name = $_GET['name'];
$password = $_GET['password'];
$uid = $_SESSION['uid'];
$update = mysqli_query($query, "update users set uname='$name', password='$password' where uid='$uid'");
}
else{
    
echo "<script>alert('Please go to your profile to change your profile');</script>";
}
?>
<script>window.location.assign('../usr_profile.php');alert('Your profile has been updated'); </script>