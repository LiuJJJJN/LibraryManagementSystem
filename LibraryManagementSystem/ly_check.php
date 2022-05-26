<?php
	require_once("config.php");
	if($_SESSION["admin"]=="")
	{
 	echo "<script language=javascript>alert('请重新登陆！');window.location='admin_login.php'</script>";
	}
?>