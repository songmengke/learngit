<?php
	session_start();/*开启session会话,记录用户名*/
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$b_user_Id=$_POST['b_user_Id'];
	$userid=$_POST['userid'];
	$com_id=$_POST['com_id'];
	$reply_cont=$_POST['reply_cont'];
	$artId=$_SESSION['artId'];

	$dat1=date('Y-m-j');
	$dat2=date('G:i:s');
	$dat=$dat1.' '.$dat2;
	$query=mysql_query("select * from user where userId='$userid'");
	if($row=mysql_fetch_assoc($query)){
		$qey="INSERT INTO reply_list(com_Id,user_Id,b_user_Id,reply_Cont,reply_Time)VALUES('$com_id','$userid','$b_user_Id','$reply_cont','$dat')";
		$result=mysql_query($qey)or die("query fail".mysql_error());
		if($result){
		echo "<script> alert('发表评论成功');
		window.location.href='userCom.php?articleID=$artId'</script>";
		}
		else{
			echo "<script> alert('发表评论失败');window.location.href='reg.html'</script>";	
		}
	}
	else{
		echo "<script> alert('未登录不能发表回复，请先登录');window.location.href='login.html'</script>";
		exit;
	}
?>