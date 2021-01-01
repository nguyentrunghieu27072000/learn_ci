<?php 
	class loginController extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('SinhvienModel');
		}
		public function index(){
			$temp['data']='';
			$temp['template']='frmLogin';
			$this->load->view('master/layout',$temp);

			if($this->input->post('login')){
				$this->checklogin();
			}
		// 	$data= array(
		// 		'user'=>'diem',
		// 		'pw'=>'123456',
		// 		'quyen'=>'teacher'
		// 	);
		// 	// $this->session->set_userdata('teacher',$data);
		// 	if($this->session->has_userdata('teacher')){
		// 		echo'TT';
		// 	}else{
		// 		echo'ko';
		// 	}
		// 	$mang = $this->session->userdata('teacher');
		// 	// echo'<pre>';
		// 	// print_r($mang);
		// 	// echo'<pre>';
		// 	// $this->logout();
		// }
			
		// public function logout(){
		// 	$this->session->sess_destroy();
		}
		public function checklogin(){
			$user =$this->input->post('user');
			$pwd= $this->input->post('pwd');
			// echo($user);
			// echo"<br>";
			// echo($pwd);
			// exit;
			$data= $this->SinhvienModel->get_taikhoan($user,$pwd);
			// print_r($data);
			// exit();
			if(!empty($data)){
				$session= array(
					'ten_tk'=>'user',
					'mk_tk'=>'pwd'
				);
				$this->session->set_userdata('user',$session);
				return redirect('sinhvien');
				// echo"tc";
			}else{
				return redirect('dangnhap');
			}
		}

			

		
	}
 ?>		
