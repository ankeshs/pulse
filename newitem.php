<?php
require_once 'settings.php';
require_once 'base.php';
if(isset($_COOKIE[COOKI]))
{
	$login=$_COOKIE[COOKI];
	$id=0;
	require_once 'db_connect.php';
	$check=mysql_query('SELECT * from item');
	if($check)
	{
		while($r=mysql_fetch_assoc($check))
		{
			if($id<=$r['id'])$id++;
		}
	}
	$title=$_POST['title'];
	$cat=$_POST['category'];
	$priv=$_POST['priv'];
	$url=$_POST['url'];
	$img="";
	if ($_FILES["image"]["error"] > 0)
    {    	    
    }
  	else
    {
      if (file_exists("upload/$id" . $_FILES["image"]["name"]))
      {
      
      }
      else
      {
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/$id" . $_FILES["image"]["name"]);      
      $img="upload/".$id . $_FILES["image"]["name"];
      }
    }
	$vid=$_POST['video'];
	$file="";
	if ($_FILES["file"]["error"] > 0)
    {    	    
    }
  	else
    {
      if (file_exists("upload/$id" . $_FILES["file"]["name"]))
      {
      
      }
      else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$id" . $_FILES["file"]["name"]);      
      $file="upload/".$id . $_FILES["file"]["name"];
      }
    }
	$info=$_POST['info'];
	$check=mysql_query("INSERT INTO item (`id`,`title`,`category`,`by`,`priv`, `rate`, `vote`, `ppl`, `url`, `image`,`video`, `file`, `info`, `discussion`) 
	VALUES ($id, '$title', $cat, '$login', $priv, 0.0, 0, '', '$url', '$img', '$vid', '$file', '$info', '')");
	if(check)
	{
		header('Location:viewitem.php?id='.$id);
	}
	else {
		echo "Error! Could not save data.";
	}
}
else {
header('Location:loginform.php');	
}
?>