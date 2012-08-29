<?php
$ckid='pulseiitk_id';
session_start();
if(isset($_COOKIE[$ckid]))
{
   setcookie($ckid, "", time()-60*60*24*100, "/");
}
require_once 'base.php';
basePageTop();

?>
<div style="text-align: center;">
<form action="login.php" method="post" name="form">
			<span>CC Login ID:</span>
			<input type="text" name="login" />
			<br/>
			<span>Password:&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<input type="password" name="pass"/>
			<br/>
			<button type="button" value="Login" onclick="formSubmit()">Login</button>
			<br />
			<span id="msg"><?php if(isset($_GET['wp']) && $_GET['wp']==1) echo "Wrong login ID or password";
			if(isset($_GET['wp']) && $_GET['wp']==2) echo "You are not authorized to view this content, You need to login!"; ?></span>
</form>
<script type="text/javascript">
	function formSubmit () {
			login=document.forms["form"]["login"].value;
			pass=document.forms["form"]["pass"].value;				
		    if(login=="" || login==" "){alert("Invalid login ID"); return;}
		    if(pass==""){alert("Password cannot be left empty"); return;}
		    document.forms["form"].submit();
			}
</script>
</div>
<?php
basePageFoot();
?>