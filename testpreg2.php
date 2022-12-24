<?php
	// 怎样在php中使用正则表达式 -- 操作文件
	// 读取文件
	$tpl_file_con=file_get_contents("./templates/intro.tpl"); //字符串

	// *多个 \s--匹配任何空白字符, 空格、制表符等；\w[a-zA-Z0-9_]
	$pattern=array('/\<\{\s*\$(\w[a-zA-Z0-9_]*)\s*\}\>/i');

//	$pattern=array('/\<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}\>/i'); 
	
	$replace=('<?php echo $this->tpl["${1}"];?>');	//{1}反向引用
	$new_str=preg_replace($pattern,$replace,$tpl_file_con);

	file_put_contents("./templates_c/com_intro2.tpl.php",$new_str);
	echo "OK!";
//	include "";	// 引入文件
?>