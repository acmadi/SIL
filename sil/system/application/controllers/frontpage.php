<?php

class Frontpage extends Controller {

	function Frontpage(){
		parent::Controller();	
        $this->load->helper(array("form", "date"));
	}
	
	function index(){
		$html = array();
		$html["page_title"] = "BPLHD";
		
		$q = Doctrine_Query::create()
			->select('id, nama, deskripsi, lon, lat, file_logo')
			->where('status = ?', 1)
			->from('user');

		$info["kota"] = json_encode($q->execute()->toArray());

		$current['page']='home';
		
		$html["title"] = "";
		$html["script"] = $this->load->view("script_map", null, true);
		$html["header"] = $this->load->view("header",  $current, true);
		$html["content"] = $this->load->view("map", $info, true);
		
		$this->load->view('page', $html);
	}
	
	function faq(){

		$current['page']='home';
		
		$html = array();
		$html["page_title"] = "Frequently Asked Question | BPLHD";
		$html["title"] = "Frequently Asked Question ";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header",  $current, true);
		$html["content"] = $this->load->view("faq", null, true);
		
		$this->load->view('page', $html);
	}
	
	public function cek_sesi(){
		echo '<pre>';
		print_r(Current_User::user());
		echo '</pre>';
	}
	
	public function php_info(){
		echo phpinfo();
	}
	
	function get_kota(){
		$q = Doctrine_Query::create()
			->select('id, nama, deskripsi, lon, lat')
			->where('status = ?', 1)
			->from('user');

		echo json_encode($q->execute()->toArray());
	}
}

/* End of file frontpage.php */
/* Location: ./system/application/controllers/frontpage.php */