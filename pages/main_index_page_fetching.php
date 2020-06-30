<?php
require('conn.php');
$checkmin5=mysqli_query($query,"select * from product where selling_price<=mrp-mrp*(5/100) order by selling_price desc LIMIT 5");
for($i=0;$i<4;$i++)
{
$min5check=mysqli_fetch_array($checkmin5);
$product5pid[$i]=$min5check['p_id'];
$product5bid[$i]=$min5check['b_id'];
$product5pname[$i]=$min5check['pname'];
$product5quantity[$i]=$min5check['quantity'];
$product5cat[$i]=$min5check['category'];
$product5brand[$i]=$min5check['brand'];
$product5pdesc[$i]=$min5check['pdesc'];
$product5mrp[$i]=$min5check['mrp'];
$product5sprice[$i]=$min5check['selling_price'];
$product5img1[$i]=$min5check['img1'];
$product5img2[$i]=$min5check['img2'];
}

$checkmin10=mysqli_query($query,"select * from product where selling_price<=mrp-mrp*(1/10) order by selling_price desc LIMIT 5");
for($i=0;$i<4;$i++)
{
$min10check=mysqli_fetch_array($checkmin10);
$product10pid[$i]=$min10check['p_id'];
$product10bid[$i]=$min10check['b_id'];
$product10pname[$i]=$min10check['pname'];
$product10quantity[$i]=$min10check['quantity'];
$product10cat[$i]=$min10check['category'];
$product10brand[$i]=$min10check['brand'];
$product10pdesc[$i]=$min10check['pdesc'];
$product10mrp[$i]=$min10check['mrp'];
$product10sprice[$i]=$min10check['selling_price'];
$product10img1[$i]=$min10check['img1'];
$product10img2[$i]=$min10check['img2'];
}


$checkmax25=mysqli_query($query,"select * from product where selling_price<=mrp-mrp*(1/4) order by selling_price LIMIT 5");
for($i=0;$i<4;$i++)
{
$min25check=mysqli_fetch_array($checkmax25);
$product25pid[$i]=$min25check['p_id'];
$product25bid[$i]=$min25check['b_id'];
$product25pname[$i]=$min25check['pname'];
$product25quantity[$i]=$min25check['quantity'];
$product25cat[$i]=$min25check['category'];
$product25brand[$i]=$min25check['brand'];
$product25pdesc[$i]=$min25check['pdesc'];
$product25mrp[$i]=$min25check['mrp'];
$product25sprice[$i]=$min25check['selling_price'];
$product25img1[$i]=$min25check['img1'];
$product25img2[$i]=$min25check['img2'];
}






?>