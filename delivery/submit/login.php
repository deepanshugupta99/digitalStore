<?php
if(isset($_POST['login']))
	{
	require('../../conn.php');
	$password=$_POST['password'];
	$email=$_POST['email'];
	$emailcheck=mysqli_query($query,"select * from delivery_tracking where email='$email' and password='$password'");
	$row=mysqli_fetch_array($emailcheck);
	if($email!=$row['email'])
		{
		echo "<script>alert('Wrong Email or Password'); window.location.assign('../login.php');</script>";
		}
	else
		{	
		session_start();
		$name=$row['dname'];
		
		$did=$row['did'];
		
		$_SESSION['d_id']=$did;
		$_SESSION['name']=$name;
		
		$_SESSION['email']=$email;
	
		echo "<script>alert('Login Success'); window.location.assign('../index.php');</script>";
		}

	}

?>