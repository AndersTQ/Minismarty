<?php
	// 怎样在php中使用正则表达式
	$str="1234kfldsakfl;sakfd;9000 lafkj;lsakf;lsa8900";

/*	// 要求是把连着的四个数替换成成浩
	$pattern="/\d\d\d\d/i";
	$newStr=preg_replace($pattern,"成浩",$str);
	echo $newStr;	*/

	// 要求是把连着的四个数替换成 <？php echo $this->tpl['num']？>
	$pattern=('/(\d\d\d\d)/i');
	$replace=('<?php echo $this->tpl["${1}"];?>');	//{1}反向引用
	$newStr2=preg_replace($pattern,$replace,$str);
	echo $newStr2;
?>