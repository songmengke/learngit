<?php
	define("ROOT",dirname(__FILE__));    
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql=mysql_query("SELECT  userName , userPwd  FROM  user where userName='$username' and userPwd='$password'");
	if($sql){
		echo "<script> alert('登录成功！');window.location.href='admin.html'</script>";	
	}
	else{
		echo "<script> alert('用户名或密码错误！');window.location.href='admin_login.html'</script>";
	}
?>