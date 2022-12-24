<?php
	//�������������ĵ�ģ������,��רҵphp����Ա����.
	class MyMiniSmarty {
		// var��public���ǹ����ģ�4.0����ǰʶ��var��ģ���ļ���·��
		var $template_dir="./templates/";
		// ָ��һ��ģ���ļ����滻����ļ�,���Ƹ�ʽcom_��Ӧ��tpl.php
		var $compile_dir="./templates_c/";
		// ��ű�����ֵ
		var $tpl_vars=array();

	/*	public function __construct($template_dir="./templates", $compile_dir="./templates_c"){
			$this->template_dir=rtrim($template_dir,"/").'/';
			$this->compile_dir=rtrim($compile_dir, "/").'/';
		}*/

		public function assign($tpl_var_name, $value=null){
			if($tpl_var_name!="") $this->tpl_vars[$tpl_var_name]=$value;
		}

		public function display($fileName){ // ��ȡģ�壬�滻�ɿ�������php(�����)�ļ�������
			$tplFile=$this->template_dir.$fileName;

			if(!file_exists($tplFile)) return false;

		/*	$fpl_file_con=file_get_contents($tplFile);
			echo '??$fpl_file_con : '."\r\n\r\n".$fpl_file_con;
			die("\r\n\r\n".$tplFile); */

			// ������Ĺ��� tpl->php�ļ�; ��php�����ʹ��������ʽ

			$comFileName=$this->compile_dir."com_".$fileName.".php"; // �������ļ�·��
		
		//	die($tplFile." -- ".$comFileName);
		//	�����ڻ��漼����ֻ�и���ģ���Ÿ��±����ļ�
			if(!file_exists($comFileName) || filemtime($comFileName) < filemtime($tplFile)){
				$repContent=$this->tpl_replace(file_get_contents($tplFile));
				file_put_contents($comFileName, $repContent);	
			}
			include $comFileName; //�����ļ�
		}

		//������Ҫʹ�õ�������ʽ֪ʶ <{$title}>   <{ $title  }> 
		private function tpl_replace($content){
				$pattern=array('/\<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}\>/i');  // ��Ҫ�޸� { } ��������css��ͻ body{}

				$replacement=array('<?php echo $this->tpl_vars["${1}"]; ?>');
			
				$repContent=preg_replace($pattern, $replacement, $content);

				return $repContent;
		}
	}
?>