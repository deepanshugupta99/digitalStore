<?php 
require('../conn.php');
if(isset($_POST['submit']))
{
$value = $_POST['product'];
$pid_fetch = mysqli_query($query, "SELECT * FROM product WHERE pname = '$value'");
$pid_result = mysqli_fetch_array($pid_fetch);
$pid = $pid_result['p_id'];
$cat = $pid_result['category'];
$s_cat_id = $pid_result['s_cat_id'];
$all_s_cat_fetch = mysqli_query($query, "SELECT * FROM all_s_cat WHERE s_cat_id='$s_cat_id' and cat_id='$cat'");
$all_s_cat_result = mysqli_fetch_array($all_s_cat_fetch);
$s_cat_name=$all_s_cat_result['s_cat_name'];

$all_cat_fetch = mysqli_query($query, "SELECT * FROM all_category WHERE cat_id='$cat'");
$all_cat_result = mysqli_fetch_array($all_cat_fetch);
$cat_name = $all_cat_result['cat_name'];

if($pid=='')
{
    echo "<script>window.location.assign('../wrong_search.php')</script>";
}
else{
echo "<script>window.location.assign('../sub_category.php?cat_id=$cat&s_cat_id=$s_cat_id&s_cat=$s_cat_name&cat_name=$cat_name')</script>";
}
}
?>