<?php

class SinhvienControllres extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('SinhvienModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$temp['data']['sinhvien']= $this->SinhvienModel->get_Sinhvien();
		if($this->input->post('update')){
			$this->update();
		}
		if($this->input->post('them')){
			$this->insert();
		}
		if($this->input->get('ma_sv')){
			$temp['data']['sv'] = $this->update();
		}
		if($this->input->post('update')){
			$this->update1();
		}
		if($this->input->post('xoa')){
			$this->delete();	
		}
		$temp['template'] = 'Sinhvienview';
		$this->load->view('master/layout',$temp);
	}

	public function insert(){
		$this->form_validation->set_rules('masv','Ma_SV','trim|required');
		$this->form_validation->set_rules('tensv','Ten_SV','trim|required');
		$this->form_validation->set_rules('gtsv','GT_SV','required');
		$this->form_validation->set_rules('nssv','NS_SV','trim|required|numeric');
		$this->form_validation->set_rules('qqsv','QQ_SV','trim|required');
		if($this->form_validation->run() != FALSE){
			// print_r(1);exit();
			$data= array(
				'ten_sv' => $this->input->post('tensv'),
				'gioitinh_sv' => $this->input->post('gtsv'),
			    'namsinh_sv' => $this->input->post('nssv'),
				'quequan_sv' => $this->input->post('qqsv')
			);
			pr($data);
			$row= $this->SinhvienModel->is($data);
			if($row >0){
				return redirect('sinhvien');
			}else{
				echo'them ko tc';
			}
		}else{
			// print_r(2);exit();
			return redirect('sinhvien');
		}
		
	}
	 public function delete(){
	 	$ma_sv=$this->input->post('xoa');
	 	$row= $this->SinhvienModel->deleteSv($ma_sv);
	 	if($row >0){
	 		return redirect('sinhvien');
	 	}else{
	 		return redirect('sinhvien');
	 	}
	}

	public function update(){
		// echo"1";
		$ma_sv=$this->input->get('ma_sv');
		$data = $this->SinhvienModel->get_SvById($ma_sv);
		// print_r($data);
		// exit();
		return $data;
		// $row= $this->SinhvienModel->update_Sv($ma_sv);
		// return $row;
	}
	public function update1(){
		$data= array(
			'ma_sv'=>$this->input->post('update'),
			'ten_sv'=>$this->input->post('tensv'),
			'gioitinh_sv'=>$this->input->post('gtsv'),
			'namsinh_sv'=>$this->input->post('nssv'),
			'quequan_sv'=>$this->input->post('qqsv'),
		);
		$row= $this->SinhvienModel->update_Sv($data);
		// print_r($row);
		// exit();
		if($row>0){
			return redirect('sinhvien');
		}else{
			return redirect('sinhvien');
		}
	}
}
?>