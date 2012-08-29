<?php
function connect($user,$pass)
{	
	$conn_id = ftp_connect("vyom.cc.iitk.ac.in");
	$login_result = ftp_login ($conn_id, $user, $pass);

	if ((!$conn_id) || (!$login_result))
	{
		return false;
	}
	return TRUE;
}
?>