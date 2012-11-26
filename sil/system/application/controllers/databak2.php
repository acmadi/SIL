<?php

class Data extends Controller {

	function Data(){
		parent::Controller();	
        $this->load->helper(array("form", "date"));
        $this->load->library(array("form_validation", "session", "infolib"));
	}
	
	//kalau user kota
	function index(){
		if(Current_User::user()){ 
			if(Current_User::user()->role == 2){
				redirect("data/kota");
			}
		}else{
			redirect("error/403");
		}
		$current['page']='data';
	
		$html = array();
		$html["page_title"] = "Data Management";
		$html["title"] = "Data Management";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", $current, true);
		$html["content"] = $this->load->view("listreport", null, true);
		$this->load->view('page', $html);
	}
	
	//Kalau Admin
	function kota($kota=null){
		if(Current_User::user()){ 
			if(Current_User::user()->role != 2){
				redirect("data");
			}
		}else{
			redirect("error/403");
		}
		
		$current['page']='data';
		$info['kota']=$kota;
	
		$html = array();
		$html["page_title"] = "Data Management";
		$html["title"] = "Data Management";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", $current, true);
		$html["content"] = $this->load->view("data_admin", $info, true);
		$this->load->view('page', $html);
	}
	
	function laporan(){
		
		$t = Doctrine_Query::create()
				->select('*')
				->from('jenis_data');
		$typelist = $t->execute();
		
		$q = Doctrine_Query::create()
					->select('DISTINCT (tahun) as distinctyear')
					->from('report');
		$yearlist = $q->execute()->toArray();
		
		$year = null;
		$type = null;
		
		if($this->input->post("laporan")){
			$year = $this->input->post("yearlist");
			$type = $this->input->post("typelist");
		}
		
		$info = array();
		$info["yearlist"] = $yearlist;
		$info["typelist"] = $typelist;
		$info["year"] = $year;
		$info["type"] = $type;
		$info["title"] = "Review ".$this->infolib->get_nama_type($type)." Tahun ".$year;
		
		$current['page']='laporan';
		
		$html = array();
		$html["page_title"] = "Laporan Kota/Kabupaten";
		$html["title"] = "Laporan Kota/Kabupaten";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", $current, true);
		$html["content"] = $this->load->view("laporan", $info, true);
		
		$this->load->view('page', $html);
	}
	
	//Form Edit Data Tahunan user kota
	function year_edit($data_tahun=null){
		
		if(Current_User::user()){ 
			if(Current_User::user()->role == 2){
				redirect("data/kota");
			}
		}else{
			redirect("error/403");
		}
		$y = Doctrine::getTable('report')->find($data_tahun);
		
		if($y->lock_status == 1) redirect("data");
		
		$t = Doctrine_Query::create()
					->select('*')
					->from('jenis_data');
		$typelist = $t->execute()->toArray();
		
		$data = array();
		
		foreach( $typelist as $key => $value ){
			$data[$value['nama_tabel']] = Doctrine::getTable($value['nama_tabel'])->findOneByData_Tahun($data_tahun)->toArray();
		}
		
		$info['all_data'] = $data;
		$info['data_tahun'] = $data_tahun;
		$info['year'] = $y->tahun;
	
		$current['page']='data';
		
		$html = array();
		$html["page_title"] = "Data Management";
		$html["title"] = "Data Management";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", $current, true);
		$html["content"] = $this->load->view("view_year", $info, true);
		$this->load->view('page', $html);
	}
	
	//tampil detil report tahunan
	function yearly($data_tahun){
		
		$r = Doctrine::getTable('report')->find($data_tahun);
		$k = Doctrine::getTable('user')->find($r->kota_id);
		$t = Doctrine::getTable('jenis_data')->findAll();
		
		$info['data_tahun']=$data_tahun;
		$info['report']=$r;
		$info['infokota']=$k;
		$info['typelist']=$t;
		
		$current['page']='data';
		
		$html = array();
		$html["page_title"] = "Data Management";
		$html["title"] = "Data Management";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", $current, true);
		$html["content"] = $this->load->view("data_report", $info, true);
		$this->load->view('page', $html);
	}
	
	function show_report($data_tahun=null, $type=null,$typename=null){
		
		$d = Doctrine_Query::create()
						->select('*')
						->where('data_tahun = ?', $data_tahun)
						->from($type);
		$datareq = $d->execute();
		
		$detailtext = $this->infolib->retrieve_detail($datareq, $type);
		echo $detailtext;
	}
	
	//Fungsi Lain
	function get_year_kota($kota=null){
		$page = $this->input->post("page"); // get the requested page
		$limit = $this->input->post("rows");  // get how many rows we want to have into the grid
		$sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
		$sord = $this->input->post("sord");  // get the direction
		if(!$sidx) $sidx =1;
		
		if(!$kota) $kota = Current_User::user()->id;
		
		$q = Doctrine_Query::create()
			->select('id')
			->from('report')
			->where('kota_id = ?', $kota);

		$row = $q->execute()->toArray();
		$count = count($row);
		// echo $count;
		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$q = Doctrine_Query::create()
			->select('id, tahun, lock_status, notes')
			->from('report')
			->where('kota_id = ?', $kota)
			// ->where('status = ?', 1)
			// ->andwhere('report_location = ?', 'Dago')
			->orderby($sidx.' '.$sord)
			->offset($start)
			->limit($limit);
			
		$row = $q->execute()->toArray();

		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		
		foreach($row as $f){
			$status='';
			if($f["lock_status"] == 1){
				$status='Terkunci';
				$menu = 'view';
			}else{
				$status='Dapat diedit';
				$menu = "<a href=\"".base_url()."data/year_edit/".$f["id"]."\">view</a>";
			}
			
			$responce->rows[$i]['id']=$f["id"];
			$responce->rows[$i]['cell']=array($f["tahun"],$status,$menu,$f["notes"]);
			$i++;
		}
		echo json_encode($responce);
	}
	
	function get_year_kota_admin(){
		$page = $this->input->post("page"); // get the requested page
		$limit = $this->input->post("rows");  // get how many rows we want to have into the grid
		$sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
		$sord = $this->input->post("sord");  // get the direction
		if(!$sidx) $sidx =1;
		
		// //array to translate the search type
		// $ops = array(
			// 'eq'=>'=', //equal
			// 'ne'=>'<>',//not equal
			// 'lt'=>'<', //less than
			// 'le'=>'<=',//less than or equal
			// 'gt'=>'>', //greater than
			// 'ge'=>'>=',//greater than or equal
			// 'bw'=>'LIKE', //begins with
			// 'bn'=>'NOT LIKE', //doesn't begin with
			// 'in'=>'LIKE', //is in
			// 'ni'=>'NOT LIKE', //is not in
			// 'ew'=>'LIKE', //ends with
			// 'en'=>'NOT LIKE', //doesn't end with
			// 'cn'=>'LIKE', // contains
			// 'nc'=>'NOT LIKE'  //doesn't contain
		// );
		
		// // function getWhereClause($col, $oper, $val){
			// // global $ops;
			// // if($oper == 'bw' || $oper == 'bn') $val .= '%';
			// // if($oper == 'ew' || $oper == 'en' ) $val = '%'.$val;
			// // if($oper == 'cn' || $oper == 'nc' || $oper == 'in' || $oper == 'ni') $val = '%'.$val.'%';
			// // return " WHERE $col {$ops[$oper]} '$val' ";
		// // }
		// $where = Doctrine_Query::create(); //if there is no search request sent by jqgrid, $where should be empty
		// $searchField = null;
		// $searchOper =  null;
		// $searchString =  null;
		
		// if($this->input->post("searchField")) $searchField = $this->input->post("searchField"); else $searchField = false;
		// if($this->input->post("searchOper")) $searchOper = $this->input->post("searchOper"); else $searchOper = false;
		// if($this->input->post("searchString")) $searchString = $this->input->post("searchString"); else $searchString = false;
		
		// if ($this->input->post("_search") == 'true') {
			// // $where = getWhereClause($searchField,$searchOper,$searchString);
			// $col = $searchField;
			// $oper = $searchOper;
			// $val = $searchString;
			// if($oper == 'bw' || $oper == 'bn') $val .= '%';
			// if($oper == 'ew' || $oper == 'en' ) $val = '%'.$val;
			// if($oper == 'cn' || $oper == 'nc' || $oper == 'in' || $oper == 'ni') $val = '%'.$val.'%';
			// $where->where($col.' '.$ops[$oper].' ?', $val);
		// }
		
		$q = Doctrine_Query::create()
			->select('id')
			->from('report');
			
		// if ($this->input->post("_search") == 'true') {$q->$where;}
		
		
		$row = $q->execute()->toArray();
		$count = count($row);
		
		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$q = Doctrine_Query::create()
			->select('id, kota_id, tahun, lock_status, notes')
			->from('report');
			
		// if ($this->input->post("_search") == 'true') {$q->$where;}
			// ->where('status = ?', 1)
			// ->andwhere('report_location = ?', 'Dago')
		$q	->orderby($sidx.' '.$sord)
			->offset($start)
			->limit($limit);
			
		$row = $q->execute()->toArray();

		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		
		foreach($row as $f){
			$status='';
			if($f["lock_status"] == 1){
				$status='Terkunci';
			}else{
				$status='Dapat Diedit';
			}
			
			$menu = "<a href=\"".base_url()."data/yearly/".$f["id"]."\">view info</a>";
			$q = Doctrine::getTable('user')->find($f["kota_id"]);
			
			$responce->rows[$i]['id']=$f["id"];
			$responce->rows[$i]['cell']=array($q->nama,$f["tahun"],$status,$menu,$f["notes"]);
			$i++;
		}
		echo json_encode($responce);
	}
	
	function get_laporan($year,$type){
       if (Current_User::user()){if(Current_User::user()->role != 2) redirect("error/403");}else redirect("error/403");
		
		$page = $this->input->post("page"); // get the requested page
		$limit = $this->input->post("rows");  // get how many rows we want to have into the grid
		$sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
		$sord = $this->input->post("sord");  // get the direction
		if(!$sidx) $sidx =1;
		
		$q = Doctrine_Query::create()
			->select('id')
			->from('report')
			->where('tahun = ?', $year);
	
		$row = $q->execute()->toArray();
		$count = count($row);

		
		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$q = Doctrine_Query::create()
			->select('id')
			->from('report')
			->where('tahun = ?', $year)
			// ->where('status = ?', 1)
			// ->andwhere('report_location = ?', 'Dago')
			// ->orderby($sidx.' '.$sord)
			->offset($start)
			->limit($limit);
			
		$row = $q->execute();
		
		// $row = $q->execute()->toArray();
		// $this->infolib->view_r($row);
		
		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		
		$label_used = $this->infolib->retrieve_label($type);
		
		foreach($row as $f){
			$item = Doctrine::getTable($type)->findOneByData_Tahun($f->id);	
			$kota = Doctrine::getTable('user')->find($f->kota_id);
			
			$responce->rows[$i]['id']=$item["id"];
			
			//// start of row ////
			$data_rows = array();
			array_push($data_rows, $kota->nama);
			
			foreach($label_used as $key => $val){
				array_push($data_rows, $item["$key"]);
			}
			$responce->rows[$i]['cell'] = $data_rows;
			//// end of row ////
			
			unset($data_rows);
			$i++;
		}
		
		// $this->infolib->view_r($responce);
		echo json_encode($responce);
	}
	
	function edit_report(){
		if($this->input->post("tahun")){
		
			$year = $this->input->post("tahun");
			$notes = $this->input->post("notes");
			$kota = Current_User::user()->id;
		
		
			// $u = null;
			// if($this->input->post("id")){
				// $u = Doctrine::getTable('report')->find($this->input->post("id"));
			// }else{
			// }
			
			$d = Doctrine_Query::create()
					->select('id')
					->from('report')
					->where('kota_id = ?', $kota)
					->andwhere('tahun = ?', $year);
			$rowd = $d->execute()->toArray();
			
			if (count($rowd)==0){
				
				$u = new Report();
				$u->tahun = $year;
				$u->notes = $notes;
				$u->kota_id = $kota;
				$u->lock_status = 0;
				$u->save();
				
				//TAMBAH null data
					
				$d = Doctrine_Query::create()
						->select('id')
						->from('report')
						->where('kota_id = ?', $kota)
						->andwhere('tahun = ?', $year);
				$rowd = $d->execute();
				$d = array();
				
				$d[0] = new Kebutuhan_Air_Industri();
				$d[1] = new Lahan_Kritis();
				$d[2] = new Use_Hutan();
				$d[3] = new Use_Lahan();
				
				foreach($d as $val){
					$val->kota_id = $kota;
					$val->data_tahun = $rowd[0]['id'];
					$val->save();
				}
				unset($d);
			}
			
		}
	}
	
	function edit_report_admin(){
		if($this->input->post("id")){
		
			$lock = $this->input->post("lock_status");
			$notes = $this->input->post("notes");
			$id = $this->input->post("id");
		
			$u = Doctrine::getTable('report')->find($id);
			$u->notes = $notes;
			$u->lock_status = $id;
			$u->save();
		}
	}
	
	function _delete_report($rid){
		$u = Doctrine::getTable('report')->find($rid);
		if($u) {$u->delete();echo 'rdelete';}
		
		$d = array();
		$d[0] = Doctrine::getTable('kebutuhan_air_industri')->find($rid);
		$d[1] = Doctrine::getTable('lahan_kritis')->find($rid);
		$d[2] = Doctrine::getTable('use_hutan')->find($rid);
		$d[3] = Doctrine::getTable('use_lahan')->find($rid);
		
		foreach($d as $val){
				if($val) $val->delete();
		}
		
		unset($d);
	}
	
	function edit_data(){
		$t = Doctrine_Query::create()
				->select('*')
				->from('jenis_data');
		$typelist = $t->execute()->toArray();
		
		foreach($typelist as $typekey => $typeval){	
			$label_used = $this->infolib->retrieve_label($typeval['nama_tabel']);
			$data_tahun = $this->input->post('data_tahun');
			
			// echo "masuk ".$typeval['nama_tabel'].$data_tahun;
			$u = Doctrine::getTable($typeval['nama_tabel'])->findOneByData_Tahun($data_tahun);
			
			foreach($label_used as $key => $val){
				// echo $key.' '.$val.'<br>';
				$entry = $this->input->post($key);
				if($entry == '') $entry = 0;
				
				$u->$key = $entry;
				$u->save();
				
				// echo $key.'='.$entry.' updated<br>';
			}
			unset($label_used);
			unset($u);
		}
		redirect("data/year/".$data_tahun);
	}
}