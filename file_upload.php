<?php
function upload_file($str,$id,$login,$n)
{
	if(! isset($_FILES[$str]['name']))return "";
	if($_FILES[$str]['name']=="")return "";	
	//echo "s1";
	//if(substr($_FILES[$str]['name'],-4)!=".pdf") echo("Invalid file type uploaded");
	//echo "s2 ".$_FILES[$str]["size"];	
	if ($_FILES[$str]["size"] < 5000000)
  	{
  	if ($_FILES[$str]["error"] > 0)
    	{
   	echo ("Return Code: ".$_FILES[$str]["error"]."<br />");
   	 }
  	else
   	 {
	$extn=substr($FILES[$str][''
     	$fname="upload/".$login."_".$id."_";
		if($n==1)$fname=$fname."resume.pdf";
		else $fname=$fname."transcript.pdf";
    	if (file_exists($fname))
      	{
      	echo("File already exists. ");
		return $fname;
      	}
    	else
      {
      move_uploaded_file($_FILES[$str]["tmp_name"], $fname);
      return $fname;
      }
    }
  }
else
  {
  echo ("Invalid file");
  }
  return "";
}
?>
