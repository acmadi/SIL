<?php

class Tables extends Controller {
	
	function Tables(){
		parent::Controller();	
        $this->load->library(array("infolib"));
	}
	
    function index() {
        echo 'Reminder: Make sure the tables do not exist already.<br />
		<form action="" method="POST">
		<input type="submit" name="action" value="Create Tables"><br /><br />';

        if ($this->input->post('action')) {
            $this->load->helper("url");
            Doctrine::createTablesFromModels();
			$tables = $this->infolib->retrieve_type();
			$tabnames = array();
			foreach($tables as $tabrow){
				array_push($tabnames,$tabrow['nama_tabel']);
				// echo $tabrow['nama_tabel'].'<br>';
			}
			$this->make_dummy($tabnames);
            echo "Done!<br />";
        }
    }

    function make_dummy($arr_table=null) {
		$arr_table = array('use_lahan','use_hutan');
        // $reports = Doctrine::getTable('report')->findAll()->toArray();
        $reports = Doctrine::getTable('report')->findAll();
		foreach($arr_table as $tab){
			foreach($reports as $report){
				$x = Doctrine::getTable($tab)->findOneByData_Tahun($report->id);
				// echo $x->id;
				// if(Doctrine::getTable($tab)->findOneByData_Tahun($report->id)){
					// echo $tab.' '.$report->kota_id.' '.$report->id.'<br>';
					$u = new $tab();
					$u->kota_id = $report->kota_id;
					$u->data_tahun = $report->id;
					$u->save();
				// }
			}
			// echo $tab.' : dummy created';
		}
		// $this->infolib->view_r($u);
    }

    function backup_fixtures() {
        echo 'This will back up all existing data!<br />
		<form action="" method="POST">
		<input type="submit" name="action" value="Back Up Fixtures"><br /><br />';

        if ($this->input->post('action')) {
            $this->load->helper("url");

            Doctrine_Manager::connection()->execute(
                    'SET FOREIGN_KEY_CHECKS = 0');

            Doctrine::dumpData(APPPATH . '/fixtures', true);
            echo "Done!<br />";
        }
    }
	
	function coba($type=null){
            // $user = new $type();
            // $user->username = 'test';
            // $user->password = 'test';
            // $user->nama = 'Administrator';
            // $user->status = 2;
            // $user->role = 1;
            // $user->save();
			
		// echo max(array(2.1212, 4.1313, 4.2222)); // 5	
		// echo $this->infolib->add_report(2,2019);
		// $this->infolib->delete_report(121);
		
		for($i=1;$i<=26;$i++){
			$this->infolib->add_report($i,2008);
			// $this->infolib->delete_report($i);
		}
		
		// $this->infolib->view_r($this->infolib->retrieve_type());
					// $newr = new use_lahan();
					// $newr->kota_id = 2;
					// $newr->save();
			
				// $q = Doctrine_Query::create()
					// ->select('id')
					// ->where('kota_id = ?', 2)
					// ->andwhere('tahun = ?', 2020)
					// ->from('report');
				// // $report = $q->execute()->toArray();
				// if($q->execute()->){
					// echo 'ada';
				// }else{
					// echo 'ga ada';
				// }
	}
	
	
	function import_kota(){
        $array = $this->parseCsvFile('listuser.csv', true);

        foreach ($array as $key => $value) {
            $user = new user();
            $user->username = $value["nama"];
            $user->password = $value["nama"];
            $user->nama = $value["nama"];
            $user->lon = $value["lon"];
            $user->lat = $value["lat"];
            $user->deskripsi = $value["deskripsi"];
            $user->file_logo = $value["file_logo"];
            $user->status = 1;
            $user->role = 1;
            $user->save();
        }
	}
	
	function import_use_lahan($year){
        $array = $this->parseCsvFile('uselahan.csv', true);
		
		echo "IMPORT USE LAHAN<br><br>";
		
        foreach ($array as $key => $value) {
		
			if ($u = Doctrine::getTable('User')->findOneByUsername($value["kabupaten"])) {
				
				$reportExist = false;
				
				$q = Doctrine_Query::create()
					->select('id')
					->where('kota_id = ?', $u->id)
					->andwhere('tahun = ?', $year)
					->from('report');

				$r = $q->execute()->toArray();
		
				if (count($r)==0) {
					$newr = new report();
					$newr->kota_id = $u->id;
					$newr->tahun = $year;
					$newr->lock_status = 1;
					$newr->save();
					
					$q = Doctrine_Query::create()
						->select('id')
						->where('kota_id = ?', $u->id)
						->andwhere('tahun = ?', $year)
						->from('report');

					$r = $q->execute()->toArray();
					echo '*report : '.$value["kabupaten"].' and '.$year.' created<br>';
				}else{
				
					echo '# report : '.$value["kabupaten"].' and '.$year.' exist<br>';
				}
				
				// if (count($r)==0) {
					$newdata = new use_lahan();
					
					if($value['pemukiman'] == '') $value['pemukiman']='0';
					$newdata->pemukiman = $value["pemukiman"];
					
					if($value['jasa'] == '') $value['jasa']='0';
					$newdata->jasa = $value["jasa"];
					
					if($value['industri'] == '') $value['industri']='0';
					$newdata->industri = $value["industri"];
					
					if($value['tegalan'] == '') $value['tegalan']='0';
					$newdata->tegalan = $value["tegalan"];
					
					if($value['sawah_irigasi_teknis'] == '') $value['sawah_irigasi_teknis']='0';
					$newdata->sawah_irigasi_teknis = $value["sawah_irigasi_teknis"];
					
					if($value['sawah_tadah_hujan'] == '') $value['sawah_tadah_hujan']='0';
					$newdata->sawah_tadah_hujan = $value["sawah_tadah_hujan"];
					
					if($value['kebun_campuran'] == '') $value['kebun_campuran']='0';
					$newdata->kebun_campuran = $value["kebun_campuran"];
					
					if($value['perkebunan'] == '') $value['perkebunan']='0';
					$newdata->perkebunan = $value["perkebunan"];
					
					if($value['hutan'] == '') $value['hutan']='0';
					$newdata->hutan = $value["hutan"];
					
					if($value['perairan'] == '') $value['perairan']='0';
					$newdata->perairan = $value["perairan"];
					
					if($value['tambak'] == '') $value['tambak']='0';
					$newdata->tambak = $value["tambak"];
					
					if($value['tanah_kosong'] == '') $value['tanah_kosong']='0';
					$newdata->tanah_kosong = $value["tanah_kosong"];
					
					if($value['semak_alang'] == '') $value['semak_alang']='0';
					$newdata->semak_alang = $value["semak_alang"];
					
					if($value['lain_lain'] == '') $value['lain_lain']='0';
					$newdata->lain_lain = $value["lain_lain"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->'.$value["kabupaten"]." added<br>";
				// }
			}else{
				echo '$$$->'.$value["kabupaten"]." not added<br>";
			}
        }
	}

	function import_use_hutan($year){
        $array = $this->parseCsvFile('usehutan.csv', true);
		
		echo "IMPORT USE HUTAN<br><br>";
		
        foreach ($array as $key => $value) {
		
			if ($u = Doctrine::getTable('User')->findOneByUsername($value["nama"])) {
				
				$reportExist = false;
				
				$q = Doctrine_Query::create()
					->select('id')
					->where('kota_id = ?', $u->id)
					->andwhere('tahun = ?', $year)
					->from('report');

				$r = $q->execute()->toArray();
		
				if (count($r)==0) {
					$newr = new report();
					$newr->kota_id = $u->id;
					$newr->tahun = $year;
					$newr->lock_status = 1;
					$newr->save();
					
					$q = Doctrine_Query::create()
						->select('id')
						->where('kota_id = ?', $u->id)
						->andwhere('tahun = ?', $year)
						->from('report');

					$r = $q->execute()->toArray();
					echo '*report : '.$value["nama"].' and '.$year.' created<br>';
					
					$newdata = new use_hutan();
					
					if($value['cagar_alam'] == '') $value['cagar_alam']='0';
					$newdata->cagar_alam = $value["cagar_alam"];
					
					if($value['suaka_margasatwa'] == '') $value['suaka_margasatwa']='0';
					$newdata->suaka_margasatwa = $value["suaka_margasatwa"];
					
					if($value['taman_wisata'] == '') $value['taman_wisata']='0';
					$newdata->taman_wisata = $value["taman_wisata"];
					
					if($value['taman_buru'] == '') $value['taman_buru']='0';
					$newdata->taman_buru = $value["taman_buru"];
					
					if($value['taman_nasional'] == '') $value['taman_nasional']='0';
					$newdata->taman_nasional = $value["taman_nasional"];
					
					if($value['taman_hutan_raya'] == '') $value['taman_hutan_raya']='0';
					$newdata->taman_hutan_raya = $value["taman_hutan_raya"];
					
					if($value['hutan_lindung'] == '') $value['hutan_lindung']='0';
					$newdata->hutan_lindung = $value["hutan_lindung"];
					
					if($value['hutan_produksi'] == '') $value['hutan_produksi']='0';
					$newdata->hutan_produksi = $value["hutan_produksi"];
					
					if($value['hutan_produksi_terbatas'] == '') $value['hutan_produksi_terbatas']='0';
					$newdata->hutan_produksi_terbatas = $value["hutan_produksi_terbatas"];
					
					if($value['hutan_kota'] == '') $value['hutan_kota']='0';
					$newdata->hutan_kota = $value["hutan_kota"];
					
					if($value['lain_lain'] == '') $value['lain_lain']='0';
					$newdata->lain_lain = $value["lain_lain"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data hutan'.$value["nama"]." added<br>";
				}else{
				
					echo '# report : '.$value["nama"].' and '.$year.' exist<br>';
					
					
					$newdata = new use_hutan();
					
					if($value['cagar_alam'] == '') $value['cagar_alam']='0';
					$newdata->cagar_alam = $value["cagar_alam"];
					
					if($value['suaka_margasatwa'] == '') $value['suaka_margasatwa']='0';
					$newdata->suaka_margasatwa = $value["suaka_margasatwa"];
					
					if($value['taman_wisata'] == '') $value['taman_wisata']='0';
					$newdata->taman_wisata = $value["taman_wisata"];
					
					if($value['taman_buru'] == '') $value['taman_buru']='0';
					$newdata->taman_buru = $value["taman_buru"];
					
					if($value['taman_nasional'] == '') $value['taman_nasional']='0';
					$newdata->taman_nasional = $value["taman_nasional"];
					
					if($value['taman_hutan_raya'] == '') $value['taman_hutan_raya']='0';
					$newdata->taman_hutan_raya = $value["taman_hutan_raya"];
					
					if($value['hutan_lindung'] == '') $value['hutan_lindung']='0';
					$newdata->hutan_lindung = $value["hutan_lindung"];
					
					if($value['hutan_produksi'] == '') $value['hutan_produksi']='0';
					$newdata->hutan_produksi = $value["hutan_produksi"];
					
					if($value['hutan_produksi_terbatas'] == '') $value['hutan_produksi_terbatas']='0';
					$newdata->hutan_produksi_terbatas = $value["hutan_produksi_terbatas"];
					
					if($value['hutan_kota'] == '') $value['hutan_kota']='0';
					$newdata->hutan_kota = $value["hutan_kota"];
					
					if($value['lain_lain'] == '') $value['lain_lain']='0';
					$newdata->lain_lain = $value["lain_lain"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data hutan'.$value["nama"]." added<br>";
				}
				
				// if (count($r)==0) {
					
				// }
			}else{
				echo '$$$->'.$value["kabupaten"]." not added<br>";
			}
        }
	}
	
	function import_kebutuhan_air_industri($year){
        $array = $this->parseCsvFile('kebutuhan_air_industri.csv', true);
		
		echo "IMPORT USE  kebutuhan_air_industri<br><br>";
		
        foreach ($array as $key => $value) {
		
			if ($u = Doctrine::getTable('User')->findOneByUsername($value["nama"])) {
				
				$reportExist = false;
				
				$q = Doctrine_Query::create()
					->select('id')
					->where('kota_id = ?', $u->id)
					->andwhere('tahun = ?', $year)
					->from('report');

				$r = $q->execute()->toArray();
		
				if (count($r)==0) {
					$newr = new report();
					$newr->kota_id = $u->id;
					$newr->tahun = $year;
					$newr->lock_status = 1;
					$newr->save();
					
					$q = Doctrine_Query::create()
						->select('id')
						->where('kota_id = ?', $u->id)
						->andwhere('tahun = ?', $year)
						->from('report');

					$r = $q->execute()->toArray();
					echo '*report : '.$value["nama"].' and '.$year.' created<br>';
					
					
					$newdata = new kebutuhan_air_industri();
					
					$newdata->jumlah_perusahaan = $value["jumlah_perusahaan"];
					$newdata->kebutuhan_air_industri = $value["kebutuhan_air_industri"];
					$newdata->pertanian = $value["pertanian"];
					$newdata->kebutuhan_air_niaga = $value["kebutuhan_air_niaga"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data '.$value["nama"]." added<br>";
				}else{
				
					echo '# report : '.$value["nama"].' and '.$year.' exist<br>';
					
					
					$newdata = new kebutuhan_air_industri();
					
					$newdata->jumlah_perusahaan = $value["jumlah_perusahaan"];
					$newdata->kebutuhan_air_industri = $value["kebutuhan_air_industri"];
					$newdata->pertanian = $value["pertanian"];
					$newdata->kebutuhan_air_niaga = $value["kebutuhan_air_niaga"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data '.$value["nama"]." added<br>";
				}
			}else{
				echo '$$$->'.$value["nama"]." not added<br>";
			}
        }
	}
	
	function import_lahan_kritis($year){
        $array = $this->parseCsvFile('lahan_kritis.csv', true);
		
		echo "IMPORT USE  lahan_kritis<br><br>";
		
        foreach ($array as $key => $value) {
		
			if ($u = Doctrine::getTable('User')->findOneByUsername($value["nama"])) {
				
				$reportExist = false;
				
				$q = Doctrine_Query::create()
					->select('id')
					->where('kota_id = ?', $u->id)
					->andwhere('tahun = ?', $year)
					->from('report');

				$r = $q->execute()->toArray();
		
				if (count($r)==0) {
					$newr = new report();
					$newr->kota_id = $u->id;
					$newr->tahun = $year;
					$newr->lock_status = 1;
					$newr->save();
					
					$q = Doctrine_Query::create()
						->select('id')
						->where('kota_id = ?', $u->id)
						->andwhere('tahun = ?', $year)
						->from('report');

					$r = $q->execute()->toArray();
					echo '*report : '.$value["nama"].' and '.$year.' created<br>';
					
					
					$newdata = new lahan_kritis();
					
					$newdata->dalam_kawasan_hutan = $value["dalam_kawasan_hutan"];
					$newdata->luar_kawasan_hutan = $value["luar_kawasan_hutan"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data '.$value["nama"]." added<br>";
				}else{
				
					echo '# report : '.$value["nama"].' and '.$year.' exist<br>';
					
					
					$newdata = new lahan_kritis();
					$newdata->dalam_kawasan_hutan = $value["dalam_kawasan_hutan"];
					$newdata->luar_kawasan_hutan = $value["luar_kawasan_hutan"];
					
					$newdata->kota_id = $u->id;
					$newdata->data_tahun = $r[0]['id'];
					$newdata->save();
					
					echo 'OK->data '.$value["nama"]." added<br>";
				}
			}else{
				echo '$$$->'.$value["nama"]." not added<br>";
			}
        }
	}
	
	function import_flexible($year, $type){
        $array = $this->parseCsvFile($type.'_'.$year.'.csv', true);
		$label_used = $this->infolib->retrieve_label($type);
		
		echo "IMPORT >>> ".$type."<br><br>";
		//for each kota, check if they exist
        foreach ($array as $key => $value) {
			// check if the user(kota) exist
			if ($u = Doctrine::getTable('User')->findOneByUsername($value["nama"])) {
				$kota_id = $u->id;
				$data_tahun = 0;
				// check if the record for that year exist
				$q = Doctrine_Query::create()
					->select('id')
					->where('kota_id = ?', $kota_id)
					->andwhere('tahun = ?', $year)
					->from('report');
				$report = $q->execute();
		
				if (count($report) > 0) {
					$data_tahun = $report[0]->id;
					echo '> report : '.$value["nama"].' and '.$year.' exists with $data_tahun : '.$data_tahun.'<br>';
				}else{
					$data_tahun = $this->infolib->add_report($kota_id,$year);
					echo '> report : '.$value["nama"].' and '.$year.' created with new $data_tahun : '.$data_tahun.'<br>';
				}
				
				//check if record for that type and for that record exists or not
				
				$q = Doctrine_Query::create()
					->select('*')
					->from($type)
					->where('data_tahun = ?', $data_tahun);
				$data = $q->execute();
				if (count($data) == 0){
					//if data isn't exist, then data is added
					$newdata = new $type();
					
					foreach($label_used as $key => $val){
						if($value[$key] == '') $value[$key]='0';
						$newdata->$key = $value[$key];
						echo '---'.$key.'='.$value[$key].' added<br>';
					}
					$newdata->kota_id = $kota_id;
					$newdata->data_tahun = $data_tahun;
					$newdata->save();
					
					// $this->infolib->view_r($newdata->toArray());
					
					echo 'OK->data '.$value["nama"]." added<br>";
					unset($newdata);
				}else{
					//if data is exist, then data is updated
					foreach($label_used as $key => $val){
						if($value[$key] == '') $value[$key]='0';
						$data[0]->$key = $value[$key];
						echo '---'.$key.'='.$value[$key].' updated<br>';
					}
					$data->save();
					echo 'OK->data ( '.$value["nama"].' and '.$year.' ) for this type is exists in row :'.$data[0]->id.', and updated<br>';
				}
				unset($data);
			}else{
				echo '$$$->'.$value["nama"]." not added<br>";
			}
        }
	}
	
	
	
    function parseCsvFile($file, $columnheadings = false, $delimiter = ',', $enclosure = "\"") {
        $row = 1;
        $rows = array();
        $handle = fopen($file, 'r');

        while (($data = fgetcsv($handle, 1000, $delimiter, $enclosure)) !== FALSE) {

            if (!($columnheadings == false) && ($row == 1)) {
                $headingTexts = $data;
            } elseif (!($columnheadings == false)) {
                foreach ($data as $key => $value) {
                    unset($data[$key]);
                    $data[$headingTexts[$key]] = $value;
                }
                $rows[] = $data;
            } else {
                $rows[] = $data;
            }
            $row++;
        }

        fclose($handle);
        return $rows;
    }

}
