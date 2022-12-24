<?php
	//这个就是最最核心的模板引擎,由专业php程序员开发.
	class MyMiniSmarty {
		// var和public都是公开的，4.0及以前识别var；模板文件的路径
		var $template_dir="./templates/";
		// 指定一个模板文件被替换后的文件,名称格式com_对应的tpl.php
		var $compile_dir="./templates_c/";
		// 存放变量的值
		var $tpl_vars=array();

	/*	public function __construct($template_dir="./templates", $compile_dir="./templates_c"){
			$this->template_dir=rtrim($template_dir,"/").'/';
			$this->compile_dir=rtrim($compile_dir, "/").'/';
		}*/

		public function assign($tpl_var_name, $value=null){
			if($tpl_var_name!="") $this->tpl_vars[$tpl_var_name]=$value;
		}

		public function display($fileName){ // 读取模板，替换成可以运行php(编译后)文件。。。
			$tplFile=$this->template_dir.$fileName;

			if(!file_exists($tplFile)) return false;

		/*	$fpl_file_con=file_get_contents($tplFile);
			echo '??$fpl_file_con : '."\r\n\r\n".$fpl_file_con;
			die("\r\n\r\n".$tplFile); */

			// 这里核心工作 tpl->php文件; 补php中如何使用正则表达式

			$comFileName=$this->compile_dir."com_".$fileName.".php"; // 编译后的文件路径
		
		//	die($tplFile." -- ".$comFileName);
		//	类似于缓存技术，只有更新模版后才更新编译文件
			if(!file_exists($comFileName) || filemtime($comFileName) < filemtime($tplFile)){
				$repContent=$this->tpl_replace(file_get_contents($tplFile));
				file_put_contents($comFileName, $repContent);	
			}
			include $comFileName; //引入文件
		}

		//这里需要使用到正则表达式知识 <{$title}>   <{ $title  }> 
		private function tpl_replace($content){
				$pattern=array('/\<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}\>/i');  // 需要修改 { } 易与内联css冲突 body{}

				$replacement=array('<?php echo $this->tpl_vars["${1}"]; ?>');
			
				$repContent=preg_replace($pattern, $replacement, $content);

				return $repContent;
		}
	}
?>