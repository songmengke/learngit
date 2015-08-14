<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/top_style.css"/>
	<title>我的个人博客系统</title>
</head>
<body>
	<div class="top">
		<div class="top_right">
			<?php
				session_start();
				define("ROOT",dirname(__FILE__));    
				set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
				require_once("config.php");
				require_once("connect.php");
				$sel="SELECT * FROM user where loginFlag ='1'";
				$res=mysql_query($sel);
				if(!mysql_fetch_assoc($res)){
					echo "<a href='login.html'>登录</a><span>|</span><a href='reg.html'>注册</a>";
				}
				else{
					echo"你好，";
					echo $_SESSION['name'];
					echo"欢迎你  ";
					echo "<a href='logout.php'>注销</a>";
				}
			?>
		</div>
	</div>

	<div class="nav">
		<div class="nav_left">
			
		</div>
		<div class="nav_right">
			<ul>
				<li><a href="index.php">主页</a></li>
				<li><a href="#">文章</a></li>
				<li><a href="#">照片</a></li>
				<li><a href="#">关于博主</a></li>
			</ul>
		</div>
	</div>

	<div class="main_body">
		<div class="main_body_left">
			<div class="main_body_left_1">
				<h2>个人资料</h2>
			</div>
			<div class="main_body_left_2">
				<h2>博主简介</h2>
			</div>
			<div class="main_body_left_3">
				<h2>近期文章</h2>
			</div>
			<div class="main_body_left_4">
				<h2>近期评论</h2>
			</div>
			<div class="main_body_left_5">
				<h2>文章归档</h2>
			</div>
			<div class="main_body_left_6">
				<h2>分类目录</h2>
			</div>

		</div>

		<div class="main_body_right">
			<?php
				/*define("ROOT",dirname(__FILE__));    
				set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());*/
				require_once("config.php");
				require_once("connect.php");
				$result=mysql_query("select * from article_list order by artId");
				while($myrow=mysql_fetch_array($result)){
			?>
			<div class="main_body_right_1">
				<div class="main_body_right_title">
					<h2>
						<?php
							echo $myrow['artTitle'];
						?>
					</h2>
				</div>

				<div class="main_body_right_content">
					<h4>
						<?php
							echo $myrow['artContent'];
						?>
					</h4>
				</div>

				<div class="main_body_right_btm">
					<ul>
						<li class="date">
							<?php
								echo $myrow['pubDate'];
							?>
						</li>
				
						<li class="readNum">
							<font color="#336699">
								<a href="artCont.php">
									阅读
								</a>
								
							</font>
							<?php
								echo "（".$myrow['readNum']."）";
							?>
						</li>
						
						<li class="comNum">
							<font color="#336699">
								<a href="userCom.php?articleID=<?php echo $myrow['artId'];?>">
									评论
								</a>
								
							</font>
							<?php
								echo "（".$myrow['comNum']."）";
							?>
						</li>
					</ul>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>