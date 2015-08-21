<?php
	session_start();/*开启session会话,记录用户名*/
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$checkcode=$_POST['checkcode'];
	$sql=mysql_query("SELECT  userName , userPwd  FROM  user where userName='$username' and userPwd='$password'");
	if($sql){
		$_SESSION['name']=$username;
		$update="UPDATE user SET loginFlag = '1' WHERE userName='$username'";
		$res=mysql_query($update);
		if($res){
			if($checkcode==$_SESSION['checkpic']){
				echo "<script> alert('登录成功！');window.location.href='index.php'</script>";
			}
			else{
				echo "<script> alert('验证码错误');window.location.href='login.html'</script>";
			}	
		}
		else{
			echo "<script> alert('标志设置失败！');window.location.href='login.html'</script>";
		}
	}
	else{
		echo "<script> alert('用户名或密码错误！');window.location.href='login.html'</script>";
	}

?>