<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/top_style.css"/>
	<link rel="stylesheet" href="./css/left_style.css"/>
	<title>我的个人博客系统</title>
</head>
<body>
	<div class="top">
		<div class="top_right">
			<?php
				session_start();
				$_SESSION['artId']=$_GET['articleID'];
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
				<li><a href="http://user.qzone.qq.com/527730241/main">关于博主</a></li>
			</ul>
		</div>
	</div>

	<div class="main_body">
		<div class="main_body_left">
			<div class="main_body_left_1">
				<h2>个人资料</h2>
				<div class="personal_file">
					<img src="./images/erha.jpg" alt="博主头像"/>
					<div class="font">攻城狮_宋梦科</div>
					<div class="description">
						原创:100篇  &nbsp;转载:100篇 <br/>
						译文:10篇  &nbsp;&nbsp;评论:65656
					</div>
				</div>
			</div>
			<div class="main_body_left_2">
				<h2>博主简介</h2>
				<div class="details">
					 &nbsp;&nbsp;宋梦科，在阿豆工作室和领航工作室学习过PHP开发和前端开发，参加过全国青年APP大赛和大学生服务外包创新大赛以及ST ARM智能设备创新大赛，在学校举办的第一届移动互联网应用设计大赛中拿过二等奖，现在胡威老师的嵌入式与智能机器人研究室跟项目，与2015年大二暑假期间建立此博客，用来做作为数据库的课程设计内容，博客系统本身有诸多不合理的地方希望浏览者多多指正，但是主要功能还是讨论前沿技术，发挥共享精神，将作者的看法借助博客表达出来。
				</div>
			</div>
			<div class="main_body_left_3">
				<h2>近期文章</h2>
				<div>
					<?php
						$art="SELECT * FROM article_list limit 0,4";
						$result1=mysql_query($art);
						while($myrow1=mysql_fetch_array($result1)){
					?>

						<a href="userCom.php?articleID=<?php echo $myrow1['artId'];?>">
							<?php echo $myrow1['artTitle'];?>
						</a><br/>

					<?php	
						}
					?>
				</div>
			</div>
			<div class="main_body_left_4">
				<h2>近期评论</h2>
			</div>
			<div class="main_body_left_5">
				<h2>文章归档</h2>
				<div class="art_guidang">
					<a href="#">2015年8月&nbsp;(1)</a><br>
					<a href="#">2014年2月&nbsp;(1)</a><br>
					<a href="#">2014年3月&nbsp;(1)</a><br>
					<a href="#">2014年4月&nbsp;(1)</a><br>
					<a href="#">2014年5月&nbsp;(1)</a><br>
					<a href="#">2014年6月&nbsp;(1)</a><br>
					<a href="#">2014年7月&nbsp;(1)</a><br>
					<a href="#">2014年8月&nbsp;(1)</a><br>
					<a href="#">2014年9月&nbsp;(1)</a><br>
					<a href="#">2014年10月&nbsp;(1)</a>
				</div>
			</div>
			<div class="main_body_left_6">
				<h2>分类目录</h2>
			</div>

		</div>

		<div class="main_body_right">
			<?php
				$artId=$_GET['articleID'];
				require_once("config.php");
				require_once("connect.php");
				$sql="SELECT * FROM article_list WHERE artId = '$artId'";
				$result=mysql_query($sql);
				while($myrow=mysql_fetch_array($result)){
			?>
			<div class="main_body_right_2">
				<div class="main_body_right_title">
					<h2>
						<?php
							echo $myrow['artTitle'];
						?>
					</h2>
				</div>

				<div class="main_body_right2_content">
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
					</ul>
				</div>

				<div class="cutline">
				</div>

				<div class="comArea">
					<?php
						$sql1="SELECT * FROM com_list WHERE art_ID = '$artId'";
						$result1=mysql_query($sql1);
						while($myrow1=mysql_fetch_array($result1)){
					?>
					<div class="showComment">
						<?php
							$com_id=$myrow1['comId'];
							$sql6="SELECT * FROM com_list where comId='$com_id'";
							$result6=mysql_query($sql6);
							$myrow6=mysql_fetch_array($result6);
							$uID=$myrow6['user_ID'];
							$comTime=$myrow6['comTime'];

							$sql7="SELECT * FROM user where userId='$uID'";
							$result7=mysql_query($sql7);
							$myrow7=mysql_fetch_array($result7);
							$uNickname=$myrow7['userNickname'];
						?>
						<div class="single_com">
							<?php
								echo "<font color='#186EFC'>".$uNickname."</font>"."于&nbsp;".$comTime."&nbsp;发表"."<br/><br/>";
								//得到评论ID
							?>
							<div class="com_font">	
								<?php
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$myrow1['comCon'];
								?>	
							</div>
							
						</div>
						
						<div class="rep_pros">
							<a href="reply.php?com_id=<?php echo $com_id;?>">回复</a>
							<a href="prosecute.php">举报</a>
						</div>
						<?php
							$sql2="SELECT * FROM reply_list WHERE com_Id = '$com_id'";
							$result2=mysql_query($sql2);
							while($myrow2=mysql_fetch_array($result2)){
								$rc=$myrow2['reply_Cont'];
								$rt=$myrow2['reply_Time'];
						?>
						<div class="showreply">
							<?php
								$r1="SELECT * FROM reply_list WHERE reply_Cont='$rc' AND reply_Time='$rt'";
								$result3=mysql_query($r1);
								$myrow3=mysql_fetch_assoc($result3);
								$userID=$myrow3['user_Id'];
								$b_userID=$myrow3['b_user_Id'];
								

								$r2="SELECT * FROM user WHERE userId='$userID'";
								$result_4=mysql_query($r2);
								$myrow4=mysql_fetch_array($result_4);
								
								$r3="SELECT * FROM user WHERE userId='$b_userID'";
								$result_5=mysql_query($r3);
								$myrow5=mysql_fetch_array($result_5);
								

								echo $myrow4['userNickname']."回复".$myrow5['userNickname']." : "."<br/><br/>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$myrow2['reply_Cont'];
							?>
							<div class="replytime">
								<?php echo "<br/>".$myrow2['reply_Time'];?>
							</div>	
						</div>
						<?php		
							}
						?>
						
					</div>

					<?php
						}
					?>
				</div>
				<div class="makeCom">
					<form action="com_handle.php?art_Id=<?php echo $artId;?>" id="input_form" method="post" name="input_form">

						<div>
							<textarea form="input_form"  name="input_form" class="comInput"/></textarea><br/>
						</div>

						<div class="button">
							<input type="submit" value="发表" />
							<input type="reset" value="重置" />
						</div>
					</form>
				</div>
			</div>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>