<?php
require_once 'settings.php';
require_once 'base.php';
require_once 'plugins/star.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	basePageTop();
	menuBar($login);
	require_once 'db_connect.php';
	$check=mysql_query("SELECT * from item WHERE `by`='$login'");
	if($check){
	$i=0;
	echo "<table><tr>";
	while($it=mysql_fetch_assoc($check))
	{
		$i++;
		echo "<td><div class='thumb'onclick='view(".$it['id'].")'>";
		echo "<i>#".$it['id']."</i><br>";
		echo "<b>".$it['title']."</b><br>";
		echo "<span>".$category[$it['category']]."</span><br>";
		makeStar($it['rate'],$it['vote'],15);
		echo "<br><a href='remitem.php?id=".$it['id']."'><img src='images/close.jpg' height='15' /></a>";
		echo "</td></div>";
		if($i%4 ==0)echo "</tr><tr>";
		
	}
	echo "</tr></table>";
	}
	?>
	<script type="text/javascript">
		function view (id) {
		  window.location = 'viewitem.php?id='+id;
		}
	</script>
	<?php
	basePageFoot();
}
else {
header('Location:loginform.php');	
}
?>