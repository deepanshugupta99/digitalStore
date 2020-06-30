<?php 
require('../conn.php');
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$feedback = mysqli_query($query, "insert into feedback values('$name', '$email', '$mobile', '$subject', '$message')");
echo "<script>alert('Thankyou for your valuable feedback.');window.location.assign('../mail.php');</script>";
}
?>