<?php
import('TagLib');
/**
 * 自定义标签库
 */
Class TagLibHd extends TagLib {

	Protected $tags = array(
			'nav'	=>	 array('attr'=>'limit,order','close'=>1),
			'hot'	=>	array('attr'=>'limit','close'=>1), 
			'new'	=>	array('attr'=>'limit','close'=>1),
		);

	Public function _nav ($attr, $content) {
		$attr = $this->parseXmlAttr($attr);	
$str = <<<str
<?php
	\$cate = M('cate')->order('{$attr["order"]}')->limit('{$attr["limit"]}')->select();
	import('Class.Category',APP_PATH);
	\$cate = Category::unlimitedForLayer(\$cate);
	foreach ( \$cate as \$v ) :
?>
str;
	$str .=$content;
	$str .=  '<?php endforeach; ?>';
	return $str;
	}

	Public function _hot($attr,$content) {
		$attr = $this->parseXmlAttr($attr);
$str = <<<str
<?php
	\$hots = M('blog')->order('click DESC')->limit('{$attr["limit"]}')->select();
	foreach (\$hots as \$value)  :
?>
str;
	$str .= $content;
	$str .= '<?php endforeach; ?>';
	return $str;
	}

	Public function _new($attr,$content) {
		$attr = $this->parseXmlAttr($attr);
$str = <<<str
<?php
	\$news = M('blog')->order('time DESC')->limit('{$attr["limit"]}')->select();
	foreach (\$news as \$value) :
?>
str;
	$str .= $content;
	$str .= '<?php endforeach; ?>';
		return $str;
	}

}
?>