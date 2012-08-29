<?php
require_once 'settings.php';
require_once 'base.php';
//require_once 'file_upload.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_GET['login'];
	require_once 'db_connect.php';
	basePageTop();
	menuBar($_COOKIE[COOKI]);
	$check=mysql_query("SELECT * from user WHERE `login`='$login' LIMIT 1;");
	if($check && ($ud=mysql_fetch_assoc($check)))
	{?>
		<div style="margin-left: 30px; padding-bottom: 10px;">
		<h2>User Profile: </h2>
	<h3>_<?php echo $ud['login'];?> </h3>
	<img src="<?php if($ud['img']=='') echo "images/noimage.jpg"; else	echo $ud['img']; ?>" height='200' />
	</div>
	<?php
	}
	else {
		?>
		<span>The User has not joined this application yet.</span><br>
		<span><a href="invite.php?login=<?php echo $login; ?>">Invite via email</a></span>
			<?php
	}
	basePageFoot();
}
		
	
