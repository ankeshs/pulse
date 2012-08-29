<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	$id=$_GET['id'];
	$v=$_POST['comm'];
	require_once 'db_connect.php';
	$check=mysql_query("SELECT * from item WHERE `id`=$id");
	if($check && $it=mysql_fetch_assoc($check))
	{		
		$r=$it['discussion'];
		$r=$r."<~>".$login." ".$v;
		$check=mysql_query("UPDATE item SET `discussion`='$r' WHERE `id`='$id'");
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