<?php
	// ʹ��MyMiniSmarty.class.php
	require_once 'MyMiniSmarty.class.php';
	$myMiniSmarty=new MyMiniSmarty;

	$myMiniSmarty->assign("title","�ҵĵ�һ���ļ�title");
	$myMiniSmarty->assign("content","<font color='red'>�ҵĵ�һ���ļ�����</font>");
	$myMiniSmarty->display("intro.tpl");

?>