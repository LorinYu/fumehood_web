<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends Controller {
        public function index() {
                if (IS_POST) {
    	        $username = I('post.username');
		$password = I('post.password');
		$map['user_name'] = array("eq",$username);
	        $user_password = M('user') -> where($map) -> getField('user_password');
		   //dump($user_password);
		   if ($password == $user_password) {
		                session('name',$username);
				$this -> redirect('/Home/Index/machine');
		       } else {
				echo "<script charset='UTF-8'>alert('Password Incorrect !');location.assign('/index.php?m=Home&c=Index&a=index');</script>";
			}
		} else {
    		$this -> display();
		}
        }
	
	public function login() {
		$this->display();
	}
	
	public function data() {
	        $machine_id =  I('machine_id');
	        //$count = M('data')  -> where('machine_id='.$machine_id) -> count();
		//$Page = new \Think\Page($count, 5);
		//$show = $Page -> show();
		//$this -> assign('_page', $show);
		//$data = M('data') ->limit($Page -> firstRow . ',' . $Page -> listRows) -> where('machine_id='.$machine_id) -> select();
		//$data = M('data') -> where('machine_id='.$machine_id) -> order('id desc') -> find();
		$this -> assign('machine_id', $machine_id);
		//$this -> assign('data', $data);
		$this -> display();
	}
        public function getdata() {
                if (IS_POST) {
                        $machine_id = I('post.machine_id','');
                        //$data = M('data') -> where('machine_id='.$machine_id) -> order('id desc') -> find();
                        $data = M('data') -> where('machine_id=2') -> order('id desc') -> find();
                        $this -> ajaxReturn($data);
                }
        }
        
        public function takephoto() {
                if (IS_POST) {
                        
                        $takephotostatus = I('post.takephotostatus',''); 
                        if ($takephotostatus == 1) {
                                exec("python C:\\Users\\lorin\\test.py");
                                $re['status'] = 1;
                                $this -> ajaxReturn($re);      
                        }       
                }                
        }
        
	public function control() {
		$this -> display();
        }       
                
	public function history() {
	        $count = M('history')  -> count();
                $Page = new \Think\Page($count, 20);
                $show = $Page -> show();
                $this -> assign('_page', $show);
                $data = M('history') ->limit($Page -> firstRow . ',' . $Page -> listRows)  -> order('id desc') -> select();
                foreach($data as $key => &$val ) {
                        //$val['iid'] = intval($val['id']);
                        //$val['type'] = gettype($val['iid']);
                        $val['period'] = date("d天 G时 m分 s秒", $val[last_time]);
                        $val['machine_name'] = M('machine')  -> where('id='.$val['machine_id']) -> getField('name');
                        //$val[period] = "test";
                }
                $this -> assign('data', $data);
		$this -> display();
	}
        
        public function timer() {
                $this -> display();
        }
        
        public function machine() {
                $data = M('machine') -> select();
                $this -> assign('data', $data);
                $this -> display();
        }
        public function user() {
                $count = M('user')  -> count();
                $Page = new \Think\Page($count, 10);
                $show = $Page -> show();
                $this -> assign('_page', $show);
                
                $userdata = M('user') ->limit($Page -> firstRow . ',' . $Page -> listRows)  -> select();
                $this -> assign('userdata', $userdata);
                $this -> display();
        }
        
        public function deleteuser() {
                //$data['user_name'] = 'test';
                //M('user') -> add($data);
               $user_id = I('user_id');
               /*$data['user_name'] = $user_id;
               
                M('user') -> add($data);
               */
                
                if(!empty($user_id)) {
                        $r = M('user') -> where('user_id='.$user_id) -> delete();
                        if($r !== false) {
                                $data['status'] = 1;
                                $data['info'] = "删除成功";
                                $this -> ajaxReturn($data,'JSON');
                        } else {
                                $data['status'] = 0;
                                $data['info'] = "删除失败";
                                $this -> ajaxReturn($data,'JSON');
                        }
                } else {
                        $data['status'] = 0;
                        $data['info'] = "删除失败";
                        $this -> ajaxReturn($data,'JSON');
                }
        }
        
        public function edit() {
                $id = I('get.user_id');        
                if(IS_POST){
                        if (!empty($id)) {
                                $data['user_name'] = I('username');
                                $data['user_password'] = I('password');
                                M('user') -> where('user_id='.$id) -> save($data);
                                $this -> success('修改成功',U('/Home/Index/user'));
                        } else {
                                $data['user_name'] = I('username');
                                $data['user_password'] = I('password');
                                M('user') -> add($data);
                                $this -> success('新增成功', U('Home/Index/user'));
                                exit;
                        }
                }else{
                        //$id = I('get.user_id');
                        $where['user_id'] = $id;
                        $userdata = M('user') -> where($where) -> find();
                        $this->assign('userdata',$userdata);
                        $this->display();
                }  
        }     
}