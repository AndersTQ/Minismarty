<?php
	// ������php��ʹ��������ʽ -- �����ļ�
	// ��ȡ�ļ�
	$tpl_file_con=file_get_contents("./templates/intro.tpl"); //�ַ���

	// *��� \s--ƥ���κοհ��ַ�, �ո��Ʊ���ȣ�\w[a-zA-Z0-9_]
	$pattern=array('/\<\{\s*\$(\w[a-zA-Z0-9_]*)\s*\}\>/i');

//	$pattern=array('/\<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}\>/i'); 
	
	$replace=('<?php echo $this->tpl["${1}"];?>');	//{1}��������
	$new_str=preg_replace($pattern,$replace,$tpl_file_con);

	file_put_contents("./templates_c/com_intro2.tpl.php",$new_str);
	echo "OK!";
//	include "";	// �����ļ�
?>