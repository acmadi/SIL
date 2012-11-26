<?php

class Info extends Controller {

	function Info()
	{
		parent::Controller();	
        $this->load->helper(array("form", "date"));
        $this->load->library(array("encrypt", "form_validation", "session"));
		$this->load->plugin('ofc2');
        $this->load->library('infolib');
	}
	
	function index(){
		
		
		$html = array();
		$html["page_title"] = "Info Kota/Kabupaten";
		$html["title"] = "Info Kota/Kabupaten";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", null, true);
		$html["content"] = $this->load->view("listkota", null, true);
		
		$this->load->view('page', $html);
	}
	
	function kota($kota=null){
		if (!$kota) redirect('info');
		$mode = null; //mode bar atau pie
		
		$year = null; //khusus pie, data tahun
		$detailtext= null; //khusus untuk pie dalam menampilkan detail info
		
		$yearfrom = null; //khusus bar, data tahun awal
		$yearto = null; //khusus bar, data tahun akhir
		
		$type = null; // nama jenis tipe sesuai tabel
		$typename = null; //nama jenis tipe
		
		$pie_source = null;
		$bar_source = null;
		
		if ($this->input->post("pie")) {
			$year = $this->input->post("yearlist");
			$type = $this->input->post("typelist");
			$mode='pie';
		}
		
		if ($this->input->post("bar")) {
			$yearfrom = $this->input->post("yearfrom");
			$yearto = $this->input->post("yearto");
			$type = $this->input->post("typelist");
			$mode='bar';
		}
			
		$u = Doctrine::getTable('user')->find($kota);
		
		$q = Doctrine_Query::create()
					->select('*')
					->where('kota_id = ?', $kota)
					->from('report');
		$yearlist = $q->execute();
		
		$t = Doctrine_Query::create()
					->select('*')
					->from('jenis_data');
		$typelist = $t->execute();
		
		if($type != ''){
			$tn = Doctrine_Query::create()
						->select('nama')
						->where('nama_tabel = ?', $type)
						->from('jenis_data');
			$typename = $tn->execute();
		}
		
		if($mode=='pie'){
			$d = Doctrine_Query::create()
					->select('id')
					->from('report')
					->where('kota_id = ?', $kota)
					->andwhere('tahun = ?', $year);
			$rowd = $d->execute()->toArray();
			
			$d = Doctrine_Query::create()
						->select('*')
						->where('data_tahun = ?', $rowd[0]['id'])
						->from($type);
			$datareq = $d->execute();
			
			$detailtext = $this->infolib->retrieve_detail($datareq, $type);
			
			$pie_source = site_url('info/get_data_pie/'.$datareq[0]['data_tahun'].'/'.$type.'/'.$typename[0]['nama'].'/'.$u->nama);
		}
		
		if($mode=='bar'){
			$bar_source = site_url('info/get_data_bar/'.$yearfrom.'/'.$yearto.'/'.$type.'/'.$typename[0]['nama'].'/'.$kota);
		}
		
		$info = array();
		$info["yearlist"] = $yearlist;
		$info["typelist"] = $typelist;
		$info["infokota"] = $u;
		
		$info["mode"] = $mode;
		$info["kota"] = $kota;
		$info["year"] = $year;
		$info["yearfrom"] = $yearfrom;
		$info["yearto"] = $yearto;
		$info["type"] = $type;
		$info["typename"] = $typename[0]['nama'];
		
		$info["detailtext"] = $detailtext;
		
		$info["data_pie"] = $pie_source;
		$info["data_pie_height"] = 400;
		$info["data_pie_width"] = '100%';
		$info["data_bar"] = $bar_source;
		$info["data_bar_height"] = 400;
		$info["data_bar_width"] = '100%';
		
		$html = array();
		$html["page_title"] = "Info Kota/Kabupaten";
		$html["title"] = "Info Kota/Kabupaten";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", null, true);
		$html["content"] = $this->load->view("detail", $info, true);
		
		$this->load->view('page', $html);
	}
	
	function get_kota(){
		$page = $this->input->post("page"); // get the requested page
		$limit = $this->input->post("rows");  // get how many rows we want to have into the grid
		$sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
		$sord = $this->input->post("sord");  // get the direction
		if(!$sidx) $sidx =1;
		
		$q = Doctrine_Query::create()
			->select('nama, lon, lat, deskripsi')
			->from('user');

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
			->select('id, nama, lon, lat, deskripsi')
			->from('user')
			->where('role != ?', 2)
			// ->where('status = ?', 1)
			// ->andwhere('report_location = ?', 'Dago')
			->orderby($sidx.' '.$sord)
			->limit($start.' '.$limit);
			
		$row = $q->execute()->toArray();

		$responce->page = $page;
		$responce->total = $total_pages;
		$responce->records = $count;
		$i=0;
		
		foreach($row as $f){
			$responce->rows[$i]['id']=$f["id"];
			$responce->rows[$i]['cell']=array("<a href=\"".base_url()."info/kota/".$f["id"]."\">".$f["nama"]."</a>",$f["lon"],$f["lat"],$f["deskripsi"]);
			$i++;
		}
		echo json_encode($responce);
	}
	
	function coba($id=null){
		
		// $y1 = '2005';
		// $y2 = '2005';
		
		// $yi1 = intval($y1);
		// $yi2 = intval($y2);
		
		// $temp = 0;
		// if($yi1 > $yi2){
			// $yi2 = $temp;
			// $yi2 = $yi1;
			// $yi1 = $temp;
		// }
		
		// $years = array();
		
		// if($yi1 == $yi2){
			// array_push($years, $yi1);
			// array_push($years, $yi1);
		// }else{
			// for($i=0;$i<=$yi2-$yi1;$i++){
				// array_push($years, $yi1+$i);
			// }
		// }
		
		// foreach ($years as $val){
			// echo $val.'<br>';
		// }
		
	
		// $d = Doctrine_Query::create()
						// ->select('*')
						// ->from('use_lahan')
						// ->where('data_tahun = ?', $data_tahun);
						
		// $r = $d->execute()->toArray();
		
		// $use_lahan_label = array(
			// 'pemukiman'=>'Pemukiman',
			// 'jasa'=>'Jasa',
			// 'industri'=>'Industri'
		// );
		
		// foreach($use_lahan_label as $key => $val){	
			// echo $key.' => '.$val;
		// }
	
			// $tn = Doctrine_Query::create()
						// ->select('nama')
						// ->where('nama_tabel = ?', 'use_lahan')
						// ->from('jenis_data');
			// $typename = $tn->execute();
		// echo count($typename);
		// echo "<a href=\"".base_url()."info/kota/id\">".$id."</a>";
		// echo $id;
		// $d = Doctrine_Query::create()
						// ->select('*')
						// ->from('use_lahan')
						// ->where('data_tahun = ?', 98);
						
		// $r = $d->execute()->toArray();
		// $pemukiman = floatval($r[0]['pemukiman']);
		// $jasa = floatval($r[0]['jasa']);
		
		// echo "pemukiman : ".$pemukiman.'<br>';
		// echo "jasa : ".$jasa.'<br>';
		// echo "total = ".($pemukiman+$jasa).'<br>';
		// $datareq = $d->execute();
		
		
		// $r = $q->execute();
        // foreach ($r as $key => $value) {
			// echo $value->tahun;
		// }
		
		// $r = $d->execute()->toArray();
		// echo $r[0]['kota_id'];
		// $r = $q->toArray();
		
	}
	
	function get_data_pie($data_tahun, $type, $typename, $nama_kota)
    {
        $title = new title( 'Data '.$typename.' '.$nama_kota );

		//retrieve data
		$d = Doctrine_Query::create()
				->select('id')
				->from('report')
				->where('kota_id = ?', $kota)
				->andwhere('tahun = ?', $year);
		$rowd = $d->execute()->toArray();
		$d = Doctrine_Query::create()
						->select('*')
						->from($type)
						->where('data_tahun = ?', $data_tahun);
						
		$r = $d->execute()->toArray();
		$label_used = $this->infolib->retrieve_label($type);
		$pie_valueobj = array();
		foreach($label_used as $key => $val){
			$datum = new pie_value(floatval($r[0][$key]),$val);
			array_push($pie_valueobj, $datum);
		}
		
		//generate pie chart		
		$pie = new pie();
		$pie->set_start_angle( 0 );
		$pie->alpha(0.7);
		$pie->set_animate(true );
		$pie->add_animation( new pie_bounce(9) );
		$pie->set_tooltip( '#label#<br>#val# of #total#<br>#percent# of 100%' );
		$pie->set_values( $pie_valueobj);
		$pie->set_colours( array('#ff0000','#00ff00','#0000ff','#ffff00','#ff00ff','#00ffff','#123456'));
		$chart = new open_flash_chart();
		$chart->set_title( $title );
		$chart->add_element( $pie );
		$chart->set_bg_colour('#eeeeee');
		$chart->x_axis = null;

		
        echo $chart->toPrettyString();
    }
	
	public function get_data_bar($yearfrom, $yearto, $type, $typename, $kota)
    {
		$u = Doctrine::getTable('user')->find($kota);
        $title = new title( 'Data '.$typename.' '.$u->nama );

		//retrieve data
		$years = $this->infolib->get_years_between($yearfrom,$yearto);
		
		$bars = array();
		$bars_num = 0;
		foreach( $years as $year ){
			$d = Doctrine_Query::create()
					->select('id')
					->from('report')
					->where('kota_id = ?', $kota)
					->andwhere('tahun = ?', $year);
			$rowd = $d->execute()->toArray();
			if ($rowd){
				$d = Doctrine_Query::create()
						->select('*')
						->from($type)
						->where('data_tahun = ?', $rowd[0]['id']);
				$r = $d->execute()->toArray();
				
				// echo count($r).'<br>';
				if (count($r)>0){		
					$label_used = $this->infolib->retrieve_label($type);
					$bars[$bars_num] = array();
					foreach($label_used as $key => $val){
						$datum = floatval($r[0][$key]);
						array_push($bars[$bars_num], $datum);
					}
					unset($label_used);
					unset($r);
					$bars_num++;
				}
			}
		}
		
		// echo count($bars).' sumbars<br>';
		// echo '<pre>';
		// print_r($bars[0]);
		// echo '</pre>';
		
		//generate pie chart
        $title = new title( 'Data '.$typename.' '.$nama_kota );

		//retrieve data
		
		$d = Doctrine_Query::create()
						->select('*')
						->from('use_lahan')
						->where('data_tahun = ?', 98);
						
		$r = $d->execute()->toArray();
		
		$bar_value_2006 = array(
			floatval($r[0]['pemukiman']),
			floatval($r[0]['jasa']),
			floatval($r[0]['industri']),
			floatval($r[0]['tegalan']),
			floatval($r[0]['sawah_irigasi_teknis']),
			floatval($r[0]['sawah_tadah_hujan']),
			floatval($r[0]['kebun_campuran']),
			floatval($r[0]['perkebunan']),
			floatval($r[0]['hutan']),
			floatval($r[0]['perairan']),
			floatval($r[0]['tambak']),
			floatval($r[0]['tanah_kosong']),
			floatval($r[0]['semak_alang']),
			floatval($r[0]['lain_lain'])
		);
		$bar_value_2007 = array(
			floatval($r[0]['pemukiman'])+rand(0,100),
			floatval($r[0]['jasa'])+rand(0,100),
			floatval($r[0]['industri'])+rand(0,100),
			floatval($r[0]['tegalan'])+rand(0,100),
			floatval($r[0]['sawah_irigasi_teknis'])+rand(0,100),
			floatval($r[0]['sawah_tadah_hujan'])+rand(0,100),
			floatval($r[0]['kebun_campuran'])+rand(0,100),
			floatval($r[0]['perkebunan'])+rand(0,100),
			floatval($r[0]['hutan'])+rand(0,100),
			floatval($r[0]['perairan'])+rand(0,100),
			floatval($r[0]['tambak'])+rand(0,100),
			floatval($r[0]['tanah_kosong'])+rand(0,100),
			floatval($r[0]['semak_alang'])+rand(0,100),
			floatval($r[0]['lain_lain'])+rand(0,100)
		);
		
		
        $bar_2006 = new bar_glass();
        $bar_2006->set_values( $bar_value_2006 );
		$bar_2006->set_colour('#ff0000');
		$bar_2006->key('2006', 12);
		$bar_2006->set_on_show(new bar_on_show('grow-up', 1, 1));
        $bar_2007 = new bar_glass();
        $bar_2007->set_values( $bar_value_2007 );
		$bar_2007->key('2007', 12);
		$bar_2007->set_on_show(new bar_on_show('grow-up', 1, 1));
		
		$x_labels = new x_axis_labels();
		$x_labels->set_vertical();
		$x_labels->set_labels( array('Pemukiman','Jasa','Industri','Tegalan','Sawah Irigasi','Sawah Tadah Hujan','Kebun Campuran', 'Perkebunan', 'Hutan', 'Perairan', 'Tambak', 'Tanah Kosong', 'Semak Alang', 'Lainnya'));

		$x = new x_axis();
		$x->set_labels( $x_labels );
		
		$y = new y_axis();
		$y->set_range(0, 10000, 2000);
		$y->set_label_text( "#val# (ha)" );

        $chart = new open_flash_chart();
        $chart->set_title( $title );
        $chart->add_element( $bar_2006 );
        $chart->add_element( $bar_2007 );
		$chart->set_x_axis( $x );
		$chart->set_y_axis( $y );
		$chart->set_number_format(2, true, true, true );

        echo $chart->toPrettyString();
    }
}
