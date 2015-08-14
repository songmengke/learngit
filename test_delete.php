<?php
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$userid=$_GET['userId'];

	$sql="DELETE FROM user WHERE userId='$userid' ";
	$result=mysql_query($sql)or die("query fail".mysql_error());
	if($result){
		echo "<script> alert('删除成功');window.location.href='test.php'</script>";
	}
	else{
		echo "<script> alert('删除失败');window.location.href='test.php'</script>";	
	}
?>