<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function _construct(){
		parent:: __construct();
		echo"chay truoc index";
	}

	public function index()
	{
		
		$data=array(
			'hoten'=> 'diem',
			'namsinh'=>2001,
			'quequan'=>'thai binh'
		);
		$data['so']=22;
		$this->load->view('show',$data);
	}

	public function chuyenmuc()
	{
		echo'day la chuyen muc';
	}
	public function sanpham(){
		echo ' day laf san pham';
	}
	public function hocsinh($mahocsinh)
	{
		echo'day la hoc sinh'.($mahocsinh);
	}


        public function shoes()
        {
                echo 'day la:'.$this->input->get('shoes');
        }
}
?>