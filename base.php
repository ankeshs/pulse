<?php
function basePageTop()
{
	?>
	<!DOCTYPE html>
<html>
	<head>
		<title>
			Pulse@IITK
		</title>
		<link rel="stylesheet" href="style.css"/>
		<style type="text/css">
			body{
				margin: 0px auto;
				width: 100%;
				background: #bfbfbf;
				border: 2px solid;
				overflow-x: hidden;
				
			}
			#top
			{
				height: 119px;		
				width: 100%;			
				border-bottom: 1px solid black;			
			}
			#tl
			{
				background: url(images/tl.gif);
				height: 119px;
				width: 550px;
				float:left;
				position: relative;
				
			}
			#tr
			{				
				height: 117px;
				background:#ffffff;
				width: 446px;
				float:right;
				position: relative;
				border: 1px solid black;
				
			}
			#menu
			{				
				background: #25587E;
				padding: 5px;
				padding-left:10px;
			}
			#menu span
			{
				font: Verdana, Geneva, Arial, Helvetica, sans-serif;
				font-size: 20px;
				font-weight: bold;				
				margin-right:200px;
			}
			#menu span a
			{
				color: #ffffff;
				text-decoration: none;
			}
			#content, #apply
			{
				background: #ffffff;
				
				min-height: 450px;
			}			
			#footer
			{
				background: #4d4d4d;
				height: 30px;				
				text-align: right;
				font: Verdana, Geneva, Arial, Helvetica, sans-serif;
				font-size:12px;				
				color: #ffffff;
				padding-top: 5px;
			}
			#footer span
			{
				margin-right:20px;				
			}
			#footer span a
			{
			color: #ffffff;
			}
			#mbar span
			{
				margin-left: 10px;
				margin-right: 20px;
			}
			#mbar a
			{
				border: 1px solid #2e2727;
				background: #7f7f7f;
				text-decoration: none;
				color: white;
				padding: 3px;				
			}
			#additem, #itemdis
			{
				padding: 10px;
				padding-left: 20px;									
				
			}
			.thumb
			{
				height: 100px;
				width: 100px;
				border: 3px solid black;
				margin: 5px;
				text-align: center;
				padding: 3px;
			}
			.thumb:hover
			{
				background: #bfbfbf;
			}
			.thumb span{
				color:#a52a2a;
			}
			.thumb i {
				color:#0000ff;
			}
			#category
			{
				width: 200px;
				background: #4d4d4d;
				float: left;
				color: white;
			}
			#category li{
				margin: 5px;	
				margin-left:-30px;
				background: #1a1a1a;	
				list-style: none;	
				text-align: center;
				padding-left: 10px;	
			}
			#category li:hover{
				margin: 5px;	
				background: #357692;			
			}
			#category a{
				text-decoration: none;
				font-weight: bold;
				color: white;
			}
			#tags
			{
				width: 170px;
				background: #4d4d4d;
				float: right;
				color: white;
				position: relative;
			}
			#tags li{
				margin: 5px;	
				margin-left:-30px;
				background: #1a1a1a;	
				list-style: none;	
				text-align: center;
				padding-left: 10px;	
			}
			#tags li:hover{
				margin: 5px;	
				background: #357692;			
			}
			#tags a{
				text-decoration: none;
				font-weight: bold;
				color: white;
			}
			#pulse
			{
				background: #e5e5e5;
				border: 2px solid black;
				width: 900px;
				min-height: 100px;
				margin-left: 10px;
				margin-right: 10px;
				position: relative;
				left: 220px;
				top: 20px;
				text-align: center;
				
			}
		</style>
	</head>
	<body>
		<div id="top">
			<div id="tl"></div>
			<div id="tr"><a href="http://www.techkriti.org" target="blank"><img src="http://www.techkriti.org/themes/techkriti/images/logos/logo.png" width="430" /></a></div>
		</div>
		<div id="content">
		<?php
		}

//basePageTop function ends here
//Add menus after this, followed by content
		?>
<?php
function basePageFoot()
{
?>
</div>
<div id="footer">
			<span>Designed and Coded by: Ankesh Kumar Singh</span>
			<span><a href="http://home.iitk.ac.in/~ankeshs">http://home.iitk.ac.in/~ankeshs</a></span>
		</div>
</body>
	<?php
}
function menuBar($login)
{
	?>
	<div id="mbar" style="width: 100%; background: #4d4d4d; color: white; font-size: 16px; font-weight: bold; padding: 10px; border-bottom: 2px solid black;">
		<span >_<?php echo $login; ?></span>
		<span><a href="#">Notifications</a></span>
		<span><a href="profile.php">Profile</a></span>
		<span><a href="pulse.php">Pulse</a></span>
		<span><a href="myitem.php">My Items</a></span>
		<span><a href="additem.php">Add new Item</a></span>
		<span><a href="logout.php">Logout</a></span>
	</div>
	<?php
}
function embed($url)
{
	?>
	<iframe title="YouTube video player" class="youtube-player" frameborder="0"
	width="560" height="315" src="<?php echo $url; ?>"	frameborder="0" allowFullScreen> </iframe>
	<?php
}
?>
