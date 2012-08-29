<?php
require_once 'settings.php';
require_once 'base.php';
function upload($login)
{

  if ($_FILES["img"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    return "1";
    }
  	else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/

    if (file_exists("upload/$login" . $_FILES["img"]["name"]))
      {
      return "2";
      }
    	else
      {
      move_uploaded_file($_FILES["img"]["tmp_name"],"upload/$login" . $_FILES["img"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      return "upload/$login" . $_FILES["img"]["name"];
      }
    }
}


if(isset($_COOKIE[COOKI]))
{
	echo $_POST['img'];
	$login=$_COOKIE[COOKI];
	require_once 'db_connect.php';
	$check=mysql_query("SELECT * from user WHERE `login`='$login' LIMIT 1;");
	if($check && ($ud=mysql_fetch_assoc($check)))
	{
		$img= "";
		if ($_FILES["img"]["error"] > 0)
    	{
    	//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";    
    }
  	else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/

    if (file_exists("upload/$login" . $_FILES["img"]["name"]))
      {
      
      }
    	else
      {
      move_uploaded_file($_FILES["img"]["tmp_name"],"upload/$login" . $_FILES["img"]["name"]);
      //echo "Stored in: " . "upload/".$login . $_FILES["file"]["name"];
      $img="upload/".$login . $_FILES["img"]["name"];
      }
    }
		if($img!='')$ud['img']=$img;
		//echo "Imag:".$img;
		
		if(isset($_POST['fb'])&& $_POST['fb']!='')
		{
			$ud['fb']=$_POST['fb'];
		}
		//echo "Imag:".$ud['fb'];
		if(isset($_POST['twitter'])&& $_POST['twitter']!='')
		{
			$ud['twitter']=$_POST['twitter'];
		}
		
		$fb=$ud['fb'];
		$tw=$ud['twitter'];
		$grp=$ud['group'];
		if(isset($_POST['group'])&&trim($_POST['group'])!=''){
			$cg=trim($_POST['group']);
			$cv=explode(" ",$cg);
			$grp=implode("*",array_merge(explode("*",$grp),$cv));
		}
		
		$check=mysql_query("UPDATE user SET `img`='$img', `fb`='$fb',`twitter`='$tw', `group`='$grp' WHERE login='$login'");
		
		header('Location:profile.php');
	}
	else {
	die('fatal error');	
	}
}
else {
header('Location:loginform.php');	
}
?>