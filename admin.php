<?php
	define("ROOT",dirname(__FILE__));    
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("config.php");
	require_once("connect.php");
	$title=$_POST['title'];
	$content=$_POST['input_form'];
	$dat1=date('Y-m-j');
	$dat2=date('G:i:s');
	$dat=$dat1.' '.$dat2;
	$sql="INSERT INTO article_list(artTitle,artContent,pubDate)VALUES('$title','$content','$dat')";
	$result=mysql_query($sql)or die("query fail".mysql_error());
	if($result){
		echo "<script> alert('发布成功');window.location.href='index.php'</script>";
	}
	else{
		echo "<script> alert('发布失败');window.location.href='admin.html'</script>";	
	}
?>