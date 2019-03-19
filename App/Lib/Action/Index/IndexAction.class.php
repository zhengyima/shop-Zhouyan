<?php
/**
 * 首页跳转控制器
 * by hfr
 */

class IndexAction extends Action {
	public function index(){

		
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}
	public function signup(){
		$this->display();
	}
	public function insertsignup(){
		$insertflag = M()->execute("insert into users values(null,'%s','%s','%s','123','123')",I('mobile'),I('passwd'),I('addr'));

		if($insertflag){
			$data["status"] = 1;
		}else{
			
			$data["status"] = 0;
		}

		$this->ajaxReturn($data,'json');
	}


	public function signupsuccess(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}
	public function bypageshow(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->books = M()->query("select * from books limit 25");
		$this->display();
	}

	public function login(){
		$this->display();
	}


	public function insertlogin(){
		$usernumber = I('logname');
		$password = I('logpasswd');
		$susermodel = new Model();
		$suser = $susermodel->query("select * from users where umobile = '%s' and upasswd = '%s'", $usernumber, $password);
		if(count($suser) == 1)
		{
				$data['status']=1;
				session('uid', $usernumber);
				session('uname', $suser[0]['uname']);
				$this->ajaxReturn($data,'json');
		}else{
			$data['status'] = 0;
			$this->ajaxReturn($data,'json');
		}
	}
	public function quit(){
		session('uid',null);
		session('uname',null);
		header("Location: http://localhost/shop/index.php/index/index/index.html"); 
	}


	public function lookorderform(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}	
	public function result(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}	public function server(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}	public function showdetail(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}
	public function lookshoppingcar(){
		$this->uname = session('uname');
		$this->uid = session('uid');
		$this->display();
	}
    
}