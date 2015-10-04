<?php
	function p($array){
		dump($array,true,'<pre>',false);
	}

	function replace_phiz($content){
		/*
		$phiz = array(
			zhuakuang=>"抓狂",
			baobao=>"抱抱",
			haixiu=>"害羞",
			ku=>"酷",
			xixi=>"嘻嘻",
			taikaixin=>"太开心",
			touxiao=>"偷笑",
			qian=>"钱",
			huaxin=>"花心",
			jiyan=>"挤眼"
			);
		*/
		// str_replace(正则,img模式,$content);
		//循环$content,再逐个匹配
		preg_match_all('/\[.*?\]/is',$content,$arr);

		/* arr的打印结果,是多维数组
		// p($arr);die;
		array(
			0=>array(
				0=>"抱抱",
				1=>"抓狂"	
				)	
			);	
		*/
		
		// str_replace('/\[.*?\]/','',$content);
		if($arr[0]){
			$phiz = F('phiz','','./Data/');
			// return p($phiz);
			foreach($arr[0] as $k=>$v){
				foreach($phiz as $key=>$value){
					if($v == '['.$value.']'){
						$content = str_replace($v,'<img src="'.__ROOT__.'/Public/Images/phiz/'.$key.'.gif" alt="'.$value.'" />',$content);
					}
				}
			}
		}
		return $content;


		// <img src="/wish2/Public/Images/phiz/zhuakuang.gif" alt="抓狂" />
		
	}
?>