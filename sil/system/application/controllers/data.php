<?php

class Data extends Controller {

    function Data() {
        parent::Controller();
        $this->load->helper(array("form", "date"));
        $this->load->library(array("form_validation", "session", "infolib"));
    }

    //------------------------------PAGE---------------------------------//
    //As User Biasa
    //Manajemen report tahunan, edit info report -> list_report.php
    function index() {
        if (Current_User::user()) {
            if (Current_User::user()->role == 2) {
                redirect("data/kota");
            }
        } else {
            redirect("error/403");
        }
        $current['page'] = 'data';

        $html = array();
        $html["page_title"] = "Data Management";
        $html["title"] = "Data Management";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("list_report", null, true);
        $this->load->view('page', $html);
    }

    //As Admin//
    //Manajemen report tahunan, lock/unlock -> data_admin.php
    function kota($kota = null) {
        if (Current_User::user()) {
            if (Current_User::user()->role != 2) {
                redirect("data");
            }
        } else {
            redirect("error/403");
        }

        $current['page'] = 'data';
        $info['kota'] = $kota;

        $html = array();
        $html["page_title"] = "Data Management";
        $html["title"] = "Data Management";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("data_admin", $info, true);
        $this->load->view('page', $html);
    }

    //As Admin//
    //View laporan by tahun dan jenis data -> laporan.php
    function laporan() {
        $typelist = $this->infolib->retrieve_type();

        $q = Doctrine_Query::create()
                ->select('DISTINCT (tahun) as distinctyear')
                ->from('report')
                ->orderBy("tahun DESC");
        $yearlist = $q->execute()->toArray();

        $year = null;
        $type = null;

        if ($this->input->post("laporan")) {
            $year = $this->input->post("yearlist");
            $type = $this->input->post("typelist");
        }

        $info = array();
        $info["yearlist"] = $yearlist;
        $info["typelist"] = $typelist;
        $info["year"] = $year;
        $info["type"] = $type;
        $info["title"] = "Review " . $this->infolib->get_nama_type($type) . " Tahun " . $year;

        $current['page'] = 'laporan';

        $html = array();
        $html["page_title"] = "Laporan Kota/Kabupaten";
        $html["title"] = "Laporan Kota/Kabupaten";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("laporan", $info, true);

        $this->load->view('page', $html);
    }

    //As User Biasa
    //Form Edit Data Tahunan -> view_year.php
    function year_edit($data_tahun = null) {

        if (Current_User::user()) {
//            if (Current_User::user()->role == 2) {
//                redirect("data/kota");
//            }
        } else {
            redirect("error/403");
        }
        $y = Doctrine::getTable('report')->find($data_tahun);

        if ($y->lock_status == 1)
            redirect("data");
        $typelist = $this->infolib->retrieve_type();

        $data = array();
        foreach ($typelist as $key => $value) {
            $data[$value['nama_tabel']] = Doctrine::getTable($value['nama_tabel'])->findOneByData_Tahun($data_tahun);
        }

        $info['u'] = Doctrine::getTable("user")->find($y->kota_id);
        $info['typelist'] = $typelist;
        $info['all_data'] = $data;
        $info['data_tahun'] = $data_tahun;
        $info['year'] = $y->tahun;

        $current['page'] = 'data';

        $html = array();
        $html["page_title"] = "Data Management";
        $html["title"] = "Data Management";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("view_year", $info, true);
        $this->load->view('page', $html);
    }

    //AS Admin
    // tampil detil report tahunan using tab -> data_report.php
    function yearly($data_tahun) {

        $r = Doctrine::getTable('report')->find($data_tahun);
        $k = Doctrine::getTable('user')->find($r->kota_id);
        $t = $this->infolib->retrieve_type();

        $info['data_tahun'] = $data_tahun;
        $info['report'] = $r;
        $info['infokota'] = $k;
        $info['typelist'] = $t;

        $current['page'] = 'data';

        $html = array();
        $html["page_title"] = "Data Management";
        $html["title"] = "Data Management";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("data_report", $info, true);
        $this->load->view('page', $html);
    }

    // dipanggil oleh function yearly($sata_tahun) -> data_report.php 
    function show_report($data_tahun = null, $type = null, $typename = null) {

        $d = Doctrine_Query::create()
                ->select('*')
                ->where('data_tahun = ?', $data_tahun)
                ->from($type);
        $datareq = $d->execute();

        $detailtext = $this->infolib->retrieve_detail($datareq, $type);
        echo $detailtext;
    }

    //------------------------------Fungsi Lain---------------------------------//
    //URL data jqgrid get year di data/ As User Biasa -> list_report.php
    function get_year_kota($kota = null) {
        $page = $this->input->post("page"); // get the requested page
        $limit = $this->input->post("rows");  // get how many rows we want to have into the grid
        $sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
        $sord = $this->input->post("sord");  // get the direction
        if (!$sidx)
            $sidx = 1;

        if (!$kota)
            $kota = Current_User::user()->id;

        $q = Doctrine_Query::create()
                ->select('id')
                ->from('report')
                ->where('kota_id = ?', $kota);

        $row = $q->execute()->toArray();
        $count = count($row);
        // echo $count;
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit; // do not put $limit*($page - 1)
        $q = Doctrine_Query::create()
                ->select('id, tahun, lock_status, notes')
                ->from('report')
                ->where('kota_id = ?', $kota)
                // ->where('status = ?', 1)
                // ->andwhere('report_location = ?', 'Dago')
                ->orderby($sidx . ' ' . $sord)
                ->offset($start)
                ->limit($limit);

        $row = $q->execute()->toArray();

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i = 0;

        foreach ($row as $f) {
            $status = '';
            if ($f["lock_status"] == 1) {
                $status = 'Terkunci';
                $menu = 'view';
            } else {
                $status = 'Dapat diedit';
                $menu = "<a href=\"" . base_url() . "data/year_edit/" . $f["id"] . "\">Edit</a>";
            }

            $responce->rows[$i]['id'] = $f["id"];
            $responce->rows[$i]['cell'] = array($f["tahun"], $status, $menu, $f["notes"]);
            $i++;
        }
        echo json_encode($responce);
    }

    //URL edit jqgrid di data/ As User Biasa -> list_report.php
    function edit_report() {
        if ($this->input->post("oper") == "add") {

            $year = $this->input->post("tahun");
            $notes = $this->input->post("notes");
            $kota = Current_User::user()->id;

            $this->infolib->add_report($kota, $year, $notes);
        } else if ($this->input->post("oper") == "del") {

            $rid = $this->input->post("id");
            $this->infolib->delete_report($rid);
        }
    }

    //URL data jqgrid di data/kota/ As Admin -> data_admin.php
    function get_year_kota_admin() {
        $page = $this->input->post("page"); // get the requested page
        $limit = $this->input->post("rows");  // get how many rows we want to have into the grid
        $sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
        $sord = $this->input->post("sord");  // get the direction
        if (!$sidx)
            $sidx = 1;

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

        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit; // do not put $limit*($page - 1)
        $q = Doctrine_Query::create()
                ->select('id, kota_id, tahun, lock_status, notes')
                ->from('report');

        // if ($this->input->post("_search") == 'true') {$q->$where;}
        // ->where('status = ?', 1)
        // ->andwhere('report_location = ?', 'Dago')
        $q->orderby($sidx . ' ' . $sord)
                ->offset($start)
                ->limit($limit);

        $row = $q->execute()->toArray();

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i = 0;

        foreach ($row as $f) {
            $status = '';
            if ($f["lock_status"] == 1) {
                $status = 'Terkunci';
            } else {
                $status = 'Dapat Diedit';
            }

            $menu = "<a title='View Info' href=\"" . base_url() . "data/yearly/" . $f["id"] . "\">View Info</a> | ";
            $menu .= "<a title='Edit' href=\"" . base_url() . "data/year_edit/" . $f["id"] . "\">Edit</a>";
            $q = Doctrine::getTable('user')->find($f["kota_id"]);

            $responce->rows[$i]['id'] = $f["id"];
            $responce->rows[$i]['cell'] = array($q->nama, $f["tahun"], $status, $menu, $f["notes"]);
            $i++;
        }
        echo json_encode($responce);
    }

    //URL edit jqgrid di data/kota/ As Admin -> data_admin.php
    function edit_report_admin() {
        if ($this->input->post("oper") == "edit") {

            $lock = $this->input->post("lock_status");
            $notes = $this->input->post("notes");
            $id = $this->input->post("id");

            $u = Doctrine::getTable('report')->find($id);
            $u->notes = $notes;
            $u->lock_status = $lock;
            $u->save();
        }
    }

    //URL data jqgrid di data/laporan As Admin -> laporan.php
    function get_laporan($year, $type) {
        if (Current_User::user()) {
            if (Current_User::user()->role != 2)
                redirect("error/403");
        }else
            redirect("error/403");

        $page = $this->input->post("page"); // get the requested page
        $limit = $this->input->post("rows");  // get how many rows we want to have into the grid
        $sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
        $sord = $this->input->post("sord");  // get the direction
        if (!$sidx)
            $sidx = 1;

        $q = Doctrine_Query::create()
                ->select('id')
                ->from('report')
                ->where('tahun = ?', $year);

        $row = $q->execute()->toArray();
        $count = count($row);


        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $start = $limit * $page - $limit; // do not put $limit*($page - 1)
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
        $i = 0;

        $label_used = $this->infolib->retrieve_label($type);

        foreach ($row as $f) {
            $item = Doctrine::getTable($type)->findOneByData_Tahun($f->id);
            $kota = Doctrine::getTable('user')->find($f->kota_id);

            $responce->rows[$i]['id'] = $item["id"];
            $sum = 0;

            //// start of row ////
            $data_rows = array();
            array_push($data_rows, $kota->nama);

            foreach ($label_used as $key => $val) {
                array_push($data_rows, $item["$key"]);
                $sum += floatval($item["$key"]);
            }
            array_push($data_rows, $sum);
            $responce->rows[$i]['cell'] = $data_rows;
            //// end of row ////

            unset($data_rows);
            $i++;
        }

        // $this->infolib->view_r($responce);
        echo json_encode($responce);
    }

    //URL edit untuk Form Edit Tahunan As User Biasa -> view_year.php
    function edit_data() {
        $typelist = $this->infolib->retrieve_type();
        $i = 0;
        foreach ($typelist as $typekey => $typeval) {
            $label_used = $this->infolib->retrieve_label($typeval['nama_tabel']);
            $data_tahun = $this->input->post('data_tahun');

            // echo "masuk ".$typeval['nama_tabel'].$data_tahun;
            $u = Doctrine::getTable($typeval['nama_tabel'])->findOneByData_Tahun($data_tahun);

            foreach ($label_used as $key => $val) {
                // echo $key.' '.$val.'<br>';
                $entry = $this->input->post($i . "_" . $key);
                if ($entry == '')
                    $entry = 0;

                $u->$key = $entry;
                $u->save();

                // echo $key.'='.$entry.' updated<br>';
            }
            unset($label_used);
            unset($u);
            $i++;
        }
        redirect("data/year_edit/" . $data_tahun);
    }

}