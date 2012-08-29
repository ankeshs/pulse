<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	$id=$_GET['id'];
	$r=$_POST['rat'];
	require_once 'db_connect.php';
	$check=mysql_query("SELECT * from item WHERE `id`=$id");
	if($check && $it=mysql_fetch_assoc($check))
	{
		$v=$it['vote'];
		$r=(1.0*$r+$it['rate']*$v)/($v+1.0);
		$v=$v+1;
		$check=mysql_query("UPDATE item SET `rate`=$r, `vote`=$v WHERE `id`='$id'");
		if($check)
		header('Location:viewitem.php?id='.$id);
	}
	else {
		
	}
}
else {
header('Location:loginform.php');	
}
?>