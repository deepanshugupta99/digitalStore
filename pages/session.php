session_start();
session_regenerate_id(true);
if(isset($_SESSION['uid']))
{
	$uid=$_SESSION['uid'];
}
