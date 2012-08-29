<?php
require_once 'settings.php';
require_once 'base.php';
require_once 'plugins/star.php';
require_once 'search.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	basePageTop();
	menuBar($login);
	require_once 'db_connect.php';
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$check=mysql_query("SELECT * from item WHERE `id`=$id");
		if($check && $it=mysql_fetch_assoc($check))
		{
			$by=$it['by'];
			//echo $by;
			$viable=0;
			$check2=mysql_query("SELECT * from user WHERE `login`='$by' ");
			if($check2 && $us=mysql_fetch_assoc($check2))
			{
				$gr=explode("*",$us['group']);
				if(array_search($login, $gr))$viable=1;
			}
			if($by==$login)$viable=1;	
			if($it['priv']==0)$viable=1;		
			if($viable)
			{
				?>
				
				<div id="itemdis">
					<h2><?php echo $it['title']; ?></h2>
					<p>Category: <?php echo $category[$it['category']]; ?></p>
					<p>By: _<?php echo $by; ?></p>
					<p>Privacy: <?php if($it['priv']==0)echo "Shared with everyone."; else echo "Shared with a group only";?></p>
					<?php
					addStar($id, $it['rate'], $it['vote'],30);?><br><br><br><?php
					//addStar($id, 2.3, 10,30);
					if($it['url']!='') echo "<p> URL: <a href='".$it['url']."' target='_blank'>".$it['url']."</a> </p>";
					if($it['image']!='') echo "<img src='".$it['image']."' height='200'/><br>";
					if($it['video']!='') echo "<p> URL: <a href='".$it['video']."' target='_blank'>".$it['video']."</a> </p>";
					if($it['file']!='') echo "<p> File: <a href='".$it['file']."' >Download</a> </p>";
					echo "<h4>More information:</h4><p>".$it['info']."</p>";
					echo "<h4>Comments</h4><ul>";
					$cmt=explode("<~>",$it['discussion']);
					foreach ($cmt as $ct) {
						if($ct!='')
						{
							//echo strstr($ct," ");
							$ctu=substr($ct,0, strpos($ct," "));
							//echo $ctu;
							$ct=strstr($ct," ");
							
							echo "<li><a style='text-decoration:none;' href='showprofile.php?login=".$ctu."'>_".$ctu."</a> : ".$ct."</li>";
						}
					}
					?>
					
					</ul><form action="comment.php?id=<?php echo $id; ?>" method="post">
						<textarea rows="8" cols="30" name="comm"></textarea>
						<input type="submit" value="Comment" />
					</form>
				</div>
				<div style="padding:15px;">
					<h2>
						Search Results:						
					</h2>
					<h3>Web:</h3>
					<?php searchFor($it['title'], "web"); ?>
					<h3>News:</h3>
					<?php searchFor($it['title'], "news"); ?>
					<h3>Images:</h3>
					<?php searchImg($it['title']); ?>
				</div>
				
				<?php
			}
		}
	}
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>