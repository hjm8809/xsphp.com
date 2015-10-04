<?php
Class BlogAction extends CommonAction{

	Public function blog(){
        $this->status = 0;//status,0=>新增博客,1=>修改博客.
		$cate = M('cate')->select();
		import('Class.Category',APP_NAME);
		$this->attr = M('attr')->select();
		$this->cate = Category::unlimitedForLevel($cate);
		$this->display();
	}

    /**
     * 修改博客
     * @param
     * @return
     */

    Public function modify() {
        $this->status = 1;//status,0=>新增博客,1=>修改博客.
        $id = $_GET['id'];
        $field = array('id','click','title','summary','content','cid');
        $where = array('id'=>$id);
        $this->blog = D('BlogRelation')->field($field)->relation(true)->where($where)->find();

        $cate = M('cate')->select();
        import('Class.Category',APP_NAME);
        $this->attr = M('attr')->select();
        $this->cate = Category::unlimitedForLevel($cate);
        $this->display('blog');
    }

    Public function index() {
        $this->blog = D('BlogRelation')->getBlog();
        $this->display();
    }

    /**删除文章到回收站
     * 
     */
    Public function toTrach(){
        $id = (int) $_GET['id'];
        $type = (int) $_GET['type'];
        $msg = $type ? '删除' : '还原';
        $update = array(
                'id' => $id,
                'del' => $type,
            );
        if(M('blog')->save($update)){
            $this->success($msg.'成功',U(GROUP_NAME.'/Blog/index'));
        }else{
            $this->error($msg.'失败');
        }
    }

    /**
     * 回收站
     */
    Public function trach() {
        $this->blog = D('BlogRelation')->getBlog(1);
        $this->display('index');
    }

    /**
     * 彻底删除方法
     */
    Public function delete(){
        $id = (int) $_GET['id'];
        if(M('blog')->delete($id)) {
            $where = array(
                        'bid' => $id,
                        );
            M('blog_attr')->where($where)->delete();
            $this->success('删除成功',U(GROUP_NAME.'/Blog/trach'));
        }else{
            $this->error('删除失败');
        }
    }

    /**
     * 添加博客处理方法
     * 
     * 
     */
    Public function addBlog() {
        // D('BlogRelation');
        $data = array(
                'title' => I('title'),
                'content' => $_POST['content'],
                'time' => time(),
                'click' => (int) $_POST['click'],
                'cid' =>(int) $_POST['cid'],
                'summary' => $_POST['summary'],
            );
        $status = (int) $_POST['status'];
        if($status==0){
            if($bid = M('blog')->add($data)) {
            $sql = 'INSERT INTO '.C('DB_PREFIX').'blog_attr (bid,aid) VALUES ';
            foreach($_POST['aid'] as $v ) {
                $sql .='('.$bid.','.$v.'),';
            }
            $sql = rtrim($sql,',');
            M('blog_attr')->query($sql);
            $this->success('插入成功',U(GROUP_NAME.'/Blog/index'));
            }else{
            $this->error('插入失败');
            }
        }else if($status == 1){
            $bid = $_POST['id'];
            $where = array('id'=>$bid);
            if(M('blog')->where($where)->save($data)){
                $sql = 'DELETE FROM '.C('DB_PREFIX').'blog_attr WHERE bid = "'.$bid.'"';
                M('blog_attr')->query($sql);
                $sql = 'INSERT INTO '.C('DB_PREFIX').'blog_attr (bid,aid) VALUES ';
                foreach($_POST['aid'] as $v ) {
                    $sql .='('.$bid.','.$v.'),';
                }
                $sql = rtrim($sql,',');
                M('blog_attr')->query($sql);
                $this->success('更新成功',U(GROUP_NAME.'/Blog/index'));
                }else{
                $this->error('更新失败');
                }

            }
        }
        
    

	/**
     * 图片上传处理
     * @param 
     * @return 
     */
	Public function upload(){
    	import('ORG.Net.UploadFile');
    	$config = array(
			        'autoSub'           =>  true,// 启用子目录保存文件
			        'subType'           =>  'date',// 子目录创建方式 可以使用hash date custom
			        'dateFormat'        =>  'Ymd',
			        'savePath'          =>  './uploads/',// 上传文件保存路径
			        );
    	$upload = new UploadFile($config);
    	if($upload->upload()){
    		$info = $upload->getUploadFileInfo();
            //引入自己写的Imaage类
            import('Class.Image',APP_PATH);
            //实例化水印(water)方法
            Image::water('./uploads/'.$info[0]['savename']);
    		echo json_encode(array(
    				'url' => $info[0]['savename'],
    				'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
    				'original' => $info[0]['name'],
    				'state' => 'SUCCESS',
    			));
    	}else{
    		echo json_encode(array(
    				'state' => $upload->getErrorMsg(),
    			));
    		
    	}
    /**
     * 向浏览器返回数据json数据
     * {
     *   'url'      :'a.jpg',   //保存后的文件路径
     *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
     *   'original' :'b.jpg',   //原始文件名
     *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
     * }
     */
    	}

    
}













?>