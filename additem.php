<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	basePageTop();
	menuBar($login);
	?>
	<div id="additem">
	<form action="newitem.php" method="post" enctype="multipart/form-data">
	<span>Add a new item</span><br>
	<span><b>Title:</b> </span><input type="text" name="title"/><br>
	<span>Category: </span>
	<select name='category'>
		<?php
		foreach ($category as $k => $v) {
			echo "<option value='$k'>$v</option>"	;		
		}
		?>
	</select><br>
	<span>Shared with: </span><select name="priv"><option value="0">Public</option><option value="1">Group</option></select><br>
	<span>Url: </span><input type="text"  name="url" /><br />
	<span>Image: </span><input type="file" name="image" /><br />
	<span>Video url: </span><input type="text" name="video" /><br />
	<span>File: </span> <input type="file" name="file" /><br />
	<span>Information: </span><br /><textarea name="info" cols="30" rows="7"></textarea>
	<br />
	<input type="submit" value="Create" />
	</form>

	</div>
	<?php
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>