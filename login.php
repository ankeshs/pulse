<?php
require_once 'ftpreq.php';
session_start();
$ckid='pulseiitk_id';
if(isset($_COOKIE[$ckid]))
{
   setcookie($ckid, "", time()-60*60*24*100, "/");
}

if(isset($_POST['login']) && isset($_POST['pass']))
{
$login = $_POST['login'];
$password = $_POST['pass'];

$expire=time()+60*60*2;

if(connect($login,$password))
{
	setcookie($ckid, $login, time()+60*60*2*100, "/");
	header("Location:profile.php");
}
else{
header("Location:loginform.php?wp=1");
}

}
else{
header("Location:loginform.php?wp=1");
}

?>

