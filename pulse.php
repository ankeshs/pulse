<?php
require_once 'settings.php';
require_once 'base.php';
require_once 'plugins/star.php';
if(isset($_COOKIE[COOKI]))
{
	if(isset($_GET['cat']))$ct=$_GET['cat'];
	else $ct=-1;
	if(isset($_GET['own']))$ow=$_GET['own'];
	else $ow="";
	$login=$_COOKIE[COOKI];
	basePageTop();
	menuBar($login);
	require_once 'db_connect.php';
	?>
	<div>
		<div id="category">
			<ul>
				<li><a href='pulse.php'>All</a></li>
				<?php
				foreach ($category as $k=>$v) {
					$check=mysql_query("SELECT * from item WHERE `category`=$k");
					$num=0;
					if($check){
						while($it=mysql_fetch_assoc($check))$num++;
					}
					echo "<li><a href='pulse.php?cat=$k'> $v ($num)</a></li>";
				}
				?>
			</ul>
		</div>
		<div id="tags">
			<ul>
			<li><a href="pulse.php?tag=0">#Entertainment</a></li>
			<li><a href="pulse.php?tag=1">#Academics</a></li>
			<li><a href="pulse.php?tag=2">#Technical</a></li>
			<li><a href="pulse.php?tag=3">#Lifestyle</a></li>
			</ul>
			<br>
			<ul>
			<li><a href="pulse.php?spl=0">Posted by group</a></li>
			<li><a href="pulse.php?tag=1">Suggestions</a></li>			
			</ul>
		</div>
		<div id="pulse">
			<?php
			$check="";
			if($ct>=0 && $ow!='')
			$check=mysql_query("SELECT * from item WHERE `by`='$ow' AND `category`=$ct");
			else if($ct>=0)
			$check=mysql_query("SELECT * from item WHERE `category`=$ct");
			else if($ow!='')
			$check=mysql_query("SELECT * from item WHERE `by`='$ow' ");
			else if(isset($_GET['tag']))
			{
				switch($_GET['tag'])
				{
					case 0: $check=mysql_query("SELECT * from item WHERE `category`=1 OR `category`=2 OR `category`=3 OR `category`=4 OR `category`=10");
					break;
					case 1: $check=mysql_query("SELECT * from item WHERE `category`=6 OR `category`=7 OR `category`=8");
					break;
					case 2: $check=mysql_query("SELECT * from item WHERE `category`=7 OR `category`=3 OR `category`=12");
					break;
					case 3: $check=mysql_query("SELECT * from item WHERE `category`=9 OR `category`=10 OR `category`=13");
					break;
					default: $check=mysql_query("SELECT * from item");
				}
			}
			else $check=mysql_query("SELECT * from item"); 
			if($check){
			$i=0;
			echo "<table><tr>";
			$data=array();
			while($it=mysql_fetch_assoc($check))
			{
				$er=($it['rate']-1)*$it['vote'];
				$data[$er." ".$it['id']]=$it;
			}
			krsort($data);
			foreach ($data as $it) 
			{
				$i++;
				echo "<td><div class='thumb'onclick='view(".$it['id'].")'>";
				echo "<i>#".$it['id']."</i><br>";
				echo "<b>".$it['title']."</b><br>";
				echo "<span>".$category[$it['category']]."</span><br>";
				makeStar($it['rate'],$it['vote'],15);
				echo "</td></div>";
				if($i%4 ==0)echo "</tr><tr>";
				
			}
			echo "</tr></table>";
			}
			?>
		</div>
		<script type="text/javascript">
		function view (id) {
		  window.location = 'viewitem.php?id='+id;
		}
	</script>
	</div>
	<?php
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>