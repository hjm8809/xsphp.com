<?php
/*无限级分类类*/

Class Category {
	/**
	 * 无限级分类-按level分类
	 *<scene>
	 *分类列表树状结构显示
	 *</scene>
	 * @param  array $cate 传入要处理的数组
	 * @param string $html 	分隔符
	 * @param integer $pid  父ID,默认从0开始
	 * @param integer $level 分类等级
	 * @return array
	 */
	
	Static Public function unlimitedForLevel($cate,$html = '--', $pid = 0, $level = 0){
		$arr = array();
		foreach ($cate as $v){
			if($v['pid'] == $pid) {
				$v['level'] = $level +1;
				$v['html'] = str_repeat($html,$level);
				$arr[] = $v;
				$arr = array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level +1));
			}
		}
		return $arr;
	}

	/**
	 * 传入一维数组及相关参数,返回按分类重排的多维数组
	 *<scene>
	 *菜单栏无限级分类
	 *</scene>
	 *  @param $cate 二维数组
	 *  @param $name 被压入数组的键名
	 *  @param $pid 传入数组的父id,默认从0开始
	 *  @return array 
	 */
	Static Public function unlimitedForLayer ($cate,$name='child', $pid=0){
		$arr = array();
		foreach ($cate as $v) {
			if($v['pid'] == $pid) {
				$v[$name] = self::unlimitedForLayer($cate,$name,$v['id']);
				$arr[] = $v;
			}
		}
		return $arr;
	}

	/**
	 * 传递一个ID,返回该ID的父类全集
	 * <scene>
	 *面包屑导航  首页>>女鞋>>凉鞋
	 * <scene>
	 * @param array $cate
	 * @param integer $id
	 * @return array
	 */

	Static Public function getParents ($cate, $id) {
		$arr = array();
		foreach ( $cate as $v ) {
			if ( $v['id'] == $id){
				$arr[]  = $v;
				$arr = array_merge(self::getParents($cate,$v['pid']),$arr);
			}
		}return $arr ;
	}
	
	/**
	 * 传递父分类ID,返回所有子分类ID
	 * <scene>
	 * 用于列表页,给出父ID,使用IN条件查找父ID下的所有数据,罗列出来
	 * </scene>
	 * @param array $cate 分类表取出的数组
	 * @param integer $pid 父类的ID
	 * @return array 返回子集ID数组
	 */

	Static Public function getChildsId ($cate, $pid) {
		$arr = array();
		foreach ($cate as $v){
			if( $v['pid'] == $pid){
				$arr[] =$v['id'];
				$arr = array_merge($arr,self::getChildsId($cate,$v['id']));
			}
		}return $arr;
	}
}
?>