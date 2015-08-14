<?php
	session_start();/*开启session会话,记录用户名*/
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$input_form=$_POST['input_form'];
	$username=$_SESSION['name'];//通过用户名查找用户ID
	$artId=$_GET['art_Id'];
	$dat1=date('Y-m-j');
	$dat2=date('G:i:s');
	$dat=$dat1.' '.$dat2;
	$query=mysql_query("select * from user where userName='$username'");
	if($row=mysql_fetch_assoc($query)){
		$uId=$row['userId'];
	}
	else{
		echo "<script> alert('未登录不能发表评论，请先登录');window.location.href='login.html'</script>";
		exit;
	}

	$sql="INSERT INTO com_list(user_ID,art_ID,comCon,comTime)VALUES('$uId','$artId','$input_form','$dat')";
	$result=mysql_query($sql)or die("query fail".mysql_error());
	if($result){
		$_SESSION['name']="$username";
		echo "<script> alert('发表评论成功');
		window.location.href='userCom.php?articleID=$artId'</script>";
	}
	else{
		echo "<script> alert('发表评论失败');window.location.href='reg.html'</script>";	
	}
?>