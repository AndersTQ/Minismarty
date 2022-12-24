<?php
	// 使用MyMiniSmarty.class.php
	require_once 'MyMiniSmarty.class.php';
	$myMiniSmarty=new MyMiniSmarty;

	$myMiniSmarty->assign("title","我的第一个文件title");
	$myMiniSmarty->assign("content","<font color='red'>我的第一个文件内容</font>");
	$myMiniSmarty->display("intro.tpl");

?>