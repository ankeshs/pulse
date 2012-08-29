<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	$id=$_GET['id'];
	require_once 'db_connect.php';
	$check=mysql_query("DELETE from item WHERE `id`=$id");
	if($check)header('Location:myitem.php');
}
else {
header('Location:loginform.php');	
}
?>