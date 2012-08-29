<?php
function makeStar($r, $n, $h)
{
	$w=intval($r*$h);
	?>	
	<div style="height: <?php echo $h;?>px; width: <?php echo $h*5;?>px;">
		<div style="height: <?php echo $h;?>px; width: <?php echo $w;?>px; background: url(images/star<?php echo $h;?>.png)">
			
		</div><span style="color: grey; font-size: <?php echo intval(0.8*$h) ?>px;"><?php echo $n; ?> votes </span>
	</div>	
	<?php
}
function addStar($id, $r, $n, $h)
{
	$w=intval($r*$h);
	?>	
	<div style="height: <?php echo $h;?>px; width: <?php echo $h*5;?>px;">
		<div style="height: <?php echo $h;?>px; width: <?php echo $w;?>px; background: url(images/star<?php echo $h;?>.png)">
			
		</div><span style="color: grey; font-size: <?php echo intval(0.7*$h) ?>px;"><?php echo round($r,2)." (".$n; ?> votes) </span>
		<form action="rate.php?id=<?php echo $id; ?>" method="post" style="font-size: <?php echo intval(0.6*$h) ?>px;">
			<select name="rat">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<input type="submit" value="Rate" />
		</form>
	</div>	
	<?php
}
?>