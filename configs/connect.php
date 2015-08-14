<?php
	require_once("config.php");
	$link = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败".mysql_errno().":".mysql_error());
	mysql_select_db(DB_DBNAME,$link) or die("数据库选择失败");
	mysql_set_charset(DB_CHARSET);
?>