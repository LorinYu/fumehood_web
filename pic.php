<?php
        header("Content-Type:text/html; charset=utf-8");
	      $picname='pic.png';

	      if(file_exists($picname)){unlink($picname);}

        $pic = $_FILES['pic'];
        move_uploaded_file($pic['tmp_name'],'./Public/pic/pic.png');
?>