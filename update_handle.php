<?php
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("connect.php");
	$id=$_GET['userId'];
	$userNickname=$_POST['userNickname'];
	$userName=$_POST['userName'];
	$userPwd=$_POST['userPwd'];
	$userMailBox=$_POST['userMailBox'];
	$userRegTime=$_POST['userRegTime'];
	$sql="UPDATE user SET userNickname='$userNickname',userName='$userName',userPwd='$userPwd',userMailBox='$userMailBox',userRegTime='$userRegTime' WHERE userId='$id' ";
	$result=mysql_query($sql);
	if($result){
		echo "<script> alert('更新成功');window.location.href='test.php'</script>";
	}
	else{
		echo "<script> alert('更新失败');window.location.href='test_update.php'</script>";	
	}
?>