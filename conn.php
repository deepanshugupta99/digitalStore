<?php
$query=mysqli_connect("localhost","root","","grocease1");
if(mysqli_connect_error())
{
	echo "Error in connection please try again ".mysqli_connect_error();
}
function fetch_business_listing_bulk()
{
	$fetch_bulk_listing=mysqli_query($GLOBALS['query'],"select *  from business");
	$bulk_listing_result=mysqli_fetch_array($fetch_bulk_listing);
	return($bulk_listing_result);
}
//mysqli_close($query);
?>