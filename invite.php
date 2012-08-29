<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	basePageTop();
	menuBar($login);
	require_once 'mail.php';
	if(isset($_GET['login']))
	{
		if(sendmail($_GET['login']."@iitk.ac.in","Invitation for Pulse@IITK",""))
		{
			echo "Email invitation sent.";
		}
	}
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>