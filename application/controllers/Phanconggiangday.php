<?php  
	class Phanconggiangday extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('SinhvienModel');
		}
		public function index(){
			$ma_cb = 'mcb0741003';
			$ds_mon_cb = $this->SinhvienModel->lay_mon_canbo($ma_cb);
			$arr_mh_cb = array();
			foreach ($ds_mon_cb as $key => $value) {
				$arr_mh_cb[$value['madm_mh']] = $value['madm_mh'];
			}
			if($this->input->post('allsbleft')){
				$temp['data']['mh']= $this->allsbleft();
			}
			
			if($this->input->post('capnhat')){
				$this->is_monhoc_canbo();
			}

			$temp['data']['mon_canbo'] = $arr_mh_cb;
			
			$temp['data']['monhoc']= $this->SinhvienModel->get_Listmh();
			$temp['template']='PhancongView';
			$this->load->view('master/layout',$temp);
			// if($this->input->get('ma_cb')){
			// 	$temp['data']['cb']=$this->get_canbo();
			// }
			// $this->timkiem_ten();
			
		}
		/* public function is_monhoc_canbo(){
			$ma_cb = 'mcb0741000';
			$mon_hoc= $this->input->post('monhoc');
			$ds_mon_cb = $this->SinhvienModel->lay_mon_canbo1($ma_cb);
			$mh_cb = array_column($ds_mon_cb, 'madm_mh');

            $mangmoi    = $this->input->post('monhoc');
            $ds_mon_cb = $this->SinhvienModel->lay_mon_canbo1($ma_cb);
            $mangcu = array();
			$mangcu = array_column($ds_mon_cb, 'madm_mh');

            $del_mon_cb = (empty($mangmoi)) ? $mangcu : array_diff($mangcu,$mangmoi);
            
            $add_mon_cb = array_diff($mangmoi,$mangcu);

            if($del_mon_cb != array()){
                $this->SinhvienModel->dl_canbo_monhoc($ma_cb,$del_mon_cb);
            }
            if($add_mon_cb != array()){
                foreach($add_mon_cb as $ma_mh){
                    $insert_mon_cb[] = array(
                        'madm_mh' => $ma_mh,
                        'ma_cb'  => $ma_cb,
                    );
                }
                $this->SinhvienModel->is_canbo_monhoc($insert_mon_cb);
            }
            header('location:'. base_url().'phancong');
		} */
		public function is_monhoc_canbo(){
			$mon_hoc= $this->input->post('monhoc');
			end($mon_hoc);
			$key=key($mon_hoc);
			$ma_cb = 'mcb0741000';
			$ds_mon_cb = $this->SinhvienModel->lay_mon_canbo1($ma_cb);
			end($ds_mon_cb);
			$key1=key($ds_mon_cb);
			$mh_cb = array_column($ds_mon_cb, 'madm_mh');
			if($key>$key1){
			foreach($mon_hoc as $key => $value) {
				$check = true;
				foreach ($mh_cb as $k => $v) {
					if ($v == $value) {

						$check = false;
					}
				}
				if($check)
					$data[] =array(
						'ma_cb'=>'mcb0741000',
					    'madm_mh'=>$value,
					);
				}
				$row=$this->SinhvienModel->is_canbo_monhoc($data);
				if($row >0){
					return redirect('phancong');
				}else{
					echo'them ko tc';
				}
			}else{
				foreach($mh_cb as $key => $value) {
				$check = true;
				foreach ($mon_hoc as $k => $v) {
					if ($v == $value) {

						$check = false;
					}
				}
				if($check)
					$data1[] =array(
						// 'ma_cb'=>'mcb0741000',
						'madm_mh'=>$value,
					);
					// $ma_cb='mcb0741000';
					// $ma_mh=$value;
			}
				// pr($data1);
				$mh_cb1 = array_column($data1,'madm_mh');
				$ma_cb='mcb0741000';
				// pr($mh_cb1);
				// pr($ma_cb);
				// pr($ma_mh);
				$row1= $this->SinhvienModel->dl_canbo_monhoc($ma_cb,$mh_cb1);
				// pr($row1);
	 			if($row1 >0){
			 		return redirect('phancong');
			 	}else{
			 		return redirect('phancong');
			 	}
			}

			// pr($ten_mh);
		}

		// public function get_canbo(){
		// 	$ma_cb=$this->input->get('ma_cb');
		// 	$data = $this->SinhvienModel->get_cbByid($ma_cb);
		// 	print_r($data);
		// 	exit();
		// }
	}
?>
