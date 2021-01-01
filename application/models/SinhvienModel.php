<?php 
	class SinhvienModel extends CI_Model {
		
		public function is($data){
			$this->db->insert('tbl_sinhvien', $data);
			return $this->db->affected_rows();
		}
		public function get_Sinhvien(){
			$this->db->select('sv.*');
			$this->db->from('tbl_sinhvien AS sv');
			$result = $this->db->get()->result_array();
			return $result;
		}
		public function deleteSv($ma_sv){
			$this->db->where('ma_sv',$ma_sv);
			$this->db->delete('tbl_sinhvien');
			return $this->db->affected_rows();
		}
		public function get_SvById($ma_sv){
			$this->db->select('tbl_sinhvien.*');
			$this->db->where('ma_sv',$ma_sv);
			return $this->db->get('tbl_sinhvien')->row_array();
		}	
		public function update_Sv($data){
			$this->db->where('ma_sv',$data['ma_sv']);
			$this->db->update('tbl_sinhvien',$data);
			return $this->db->affected_rows();
			/*return $this->db->last_query();*/
			// print_r($result);
			// exit();
		}
		public function get_taikhoan($user,$pwd){
			$this->db->where('ten_tk',$user);
			$this->db->where('mk_tk',$pwd);
			return $this->db->get('tbl_taikhoan')->row_array();
		}
		// public function get_cbByid($ma_cb){
		// 	$this->db->where('ma_cb',$ma_cb);
		// 	$this->db->select('tbl_canbo');
		// 	return $this->db->get('tbl_canbo')->row_array();
		// }
		public function get_Listmh(){
			$this->db->select('mh.ten_mh,mh.madm_mh');
			$this->db->from('dm_monhoc AS mh');
			$result = $this->db->get()->result_array();
			return $result;
		}
		public function is_canbo_monhoc($data){
			$this->db->insert_batch('tbl_canbo_monhoc', $data);
			return $this->db->affected_rows();
		}
		public function dl_canbo_monhoc($ma_cb,$mh_cb1){
			$this->db->where('ma_cb',$ma_cb);
			$this->db->where_in('madm_mh',$mh_cb1);
			$this->db->delete('tbl_canbo_monhoc');
			return $this->db->affected_rows();
		}
		public function lay_mon_canbo($ma_cb){
			$this->db->join('dm_monhoc','tbl_canbo_monhoc.madm_mh = dm_monhoc.madm_mh');
			$this->db->where('ma_cb',$ma_cb);
			return $this->db->get('tbl_canbo_monhoc')->result_array();
		}
		public function lay_mon_canbo1($ma_cb){
			$this->db->select('tbl_canbo_monhoc.madm_mh');
			$this->db->where('ma_cb',$ma_cb);
			return $this->db->get('tbl_canbo_monhoc')->result_array();
		}
	}
 ?>
