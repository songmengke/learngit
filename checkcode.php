<?php
	session_start();

	$rand="";
	for($i=0;$i<4;$i++){
		$rand.=dechex(rand(1,15));
	}
	$_SESSION['checkpic']=$rand;
	$im=imagecreatetruecolor(100, 30);
	$bg=imagecolorallocate($im, 0, 0, 0);
	$te=imagecolorallocate($im, 255, 255, 255);

	imagestring($im, rand(1,5), rand(3,70), rand(0,16), $rand, $te);
	header("Content-type:image/jpeg");
	imagejpeg($im);
?>