<?php
	// ������php��ʹ��������ʽ
	$str="1234kfldsakfl;sakfd;9000 lafkj;lsakf;lsa8900";

/*	// Ҫ���ǰ����ŵ��ĸ����滻�ɳɺ�
	$pattern="/\d\d\d\d/i";
	$newStr=preg_replace($pattern,"�ɺ�",$str);
	echo $newStr;	*/

	// Ҫ���ǰ����ŵ��ĸ����滻�� <��php echo $this->tpl['num']��>
	$pattern=('/(\d\d\d\d)/i');
	$replace=('<?php echo $this->tpl["${1}"];?>');	//{1}��������
	$newStr2=preg_replace($pattern,$replace,$str);
	echo $newStr2;
?>