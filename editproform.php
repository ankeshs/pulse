<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	require_once 'db_connect.php';
	$check=mysql_query("SELECT * from user WHERE `login`='$login' LIMIT 1;");
	if($check && ($ud=mysql_fetch_assoc($check)))
	{
		
	}
	else {
		$check=	mysql_query("INSERT into user (`login`) VALUES('$login')");
		if(! $check) die('Fatal error');
		$check=mysql_query("SELECT * from user WHERE `login`='$login' LIMIT 1;");
		$ud=mysql_fetch_assoc($check);
	}
	basePageTop();
	menuBar($login);
	?>
	<div style="margin-left: 30px; padding-bottom:  10px;">
	<h2>User Profile: </h2>
	<h3>_<?php echo $ud['login'];?> </h3>
	<form action="editprofile.php" method="post" enctype="multipart/form-data">
		Upload Image: <input type="file" name="img" /> <br>
		Facecook Profile: <input type="text" name="fb" value="<?php echo $ud['fb']; ?>"/> <br>
		Twitter Profile: <input type="text"  name="twitter" value="<?php echo $ud['twitter']; ?>"/> <br>
		Add People to your group (separated by space):<br>
		<input type="text" name="group" />
		<br>
		<input type="submit" value="Update" />
	</form>
	<br>
	
	<div id="group">
		<?php
		$grp=$ud['group'];
		$gr=explode('*', $grp);
		if($grp!="")
		foreach ($gr as $g) {
			if($g!=''){?>
			<span><a href="showprofile.php?login=<?php echo $g; ?>">_<?php echo $g; ?> </a></span>
			<?php
		}
		}
		?>
	</div>
	</div>
	<?php
	//print_r($ud);
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>
