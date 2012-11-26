<?php

class Info extends Controller {

    function Info() {
        parent::Controller();
        $this->load->helper(array("form", "date"));
        $this->load->library(array("encrypt", "form_validation", "session"));
        $this->load->plugin('ofc2');
        $this->load->library('infolib');
    }

    //index info -> list_kota.php
    function index() {

        $current['page'] = 'info';

        $html = array();
        $html["page_title"] = "Info Kota/Kabupaten";
        $html["title"] = "Info Kota/Kabupaten";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("list_kota", null, true);

        $this->load->view('page', $html);
    }

    //graphic kota -> detail.php
    function kota($kota = null) {
        if (!$kota)
            redirect('info');
        $mode = null; //mode bar atau pie

        $year = null; //khusus pie, data tahun
        $detailtext = null; //khusus untuk pie dalam menampilkan detail info

        $yearfrom = null; //khusus bar, data tahun awal
        $yearto = null; //khusus bar, data tahun akhir

        $type = null; // nama jenis tipe sesuai tabel
        $typename = null; //nama jenis tipe

        $pie_source = null;
        $bar_source = null;

        if ($this->input->post("pie")) {
            $year = $this->input->post("yearlist");
            $type = $this->input->post("typelist");
            $mode = 'pie';
        }

        if ($this->input->post("bar")) {
            $yearfrom = $this->input->post("yearfrom");
            $yearto = $this->input->post("yearto");
            $type = $this->input->post("typelist");
            $mode = 'bar';
        }

        $u = Doctrine::getTable('user')->find($kota);

        $q = Doctrine_Query::create()
                ->select('*')
                ->where('kota_id = ?', $kota)
                ->from('report')
                ->orderBy("tahun DESC");
        $yearlist = $q->execute();

        $typelist = $this->infolib->retrieve_type();

        if ($type != '') {
            $tn = Doctrine_Query::create()
                    ->select('nama')
                    ->where('nama_tabel = ?', $type)
                    ->from('jenis_data');
            $typename = $tn->execute();
        }

        if ($mode == 'pie') {
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

            $pie_source = site_url('info/get_data_pie/' . $datareq[0]['data_tahun'] . '/' . $type);
        }

        if ($mode == 'bar') {
            $bar_source = site_url('info/get_data_bar/' . $yearfrom . '/' . $yearto . '/' . $type . '/' . $kota);
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

        $current['page'] = 'info';

        $html = array();
        $html["page_title"] = "Info Kota/Kabupaten";
        $html["title"] = "Info Kota/Kabupaten";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("detail", $info, true);

        $this->load->view('page', $html);
    }

    //other function//
    //data jqgrid di listkota.php
    function get_kota() {
        $page = $this->input->post("page"); // get the requested page
        $limit = $this->input->post("rows");  // get how many rows we want to have into the grid
        $sidx = $this->input->post("sidx");  // get index row - i.e. user click to sort
        $sord = $this->input->post("sord");  // get the direction
        if (!$sidx)
            $sidx = 1;

        $q = Doctrine_Query::create()
                ->select('nama, lon, lat, deskripsi')
                ->from('user');

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
                ->select('id, nama, lon, lat, deskripsi')
                ->from('user')
                ->where('role != ?', 2)
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
            $responce->rows[$i]['id'] = $f["id"];
            $responce->rows[$i]['cell'] = array("<a href=\"" . base_url() . "info/kota/" . $f["id"] . "\">" . $f["nama"] . "</a>", $f["lon"], $f["lat"], $f["deskripsi"]);
            $i++;
        }
        echo json_encode($responce);
    }

    function _coba($id = null) {

        // $s = Doctrine::getTable('jenis_data')->findOneByNama_tabel('use_lahan');
        // echo $s->satuan;
        echo $this->infolib->get_satuan_type('use_lahan');
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

    //data graphic pie
    function get_data_pie($data_tahun, $type) {//, $typename, $nama_kota){
        $title = new title('Data ' . $this->infolib->get_nama_type($type) . ' dalam ' . $this->infolib->get_satuan_type($type));

        //retrieve data
        $d = Doctrine_Query::create()
                ->select('*')
                ->from($type)
                ->where('data_tahun = ?', $data_tahun);

        $r = $d->execute()->toArray();
        $label_used = $this->infolib->retrieve_label($type);
        $pie_valueobj = array();
        foreach ($label_used as $key => $val) {
            $datum = new pie_value(floatval($r[0][$key]), $val);
            array_push($pie_valueobj, $datum);
        }

        //generate pie chart		
        $pie = new pie();
        $pie->set_start_angle(0);
        $pie->alpha(0.7);
        $pie->set_animate(true);
        $pie->add_animation(new pie_bounce(9));
        $pie->set_tooltip('#label#<br>#val# of #total#<br>#percent# of 100%');
        $pie->set_values($pie_valueobj);
        $pie->set_colours(array('#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff', '#123456'));
        $chart = new open_flash_chart();
        $chart->set_bg_colour("#FFFFFF");
        $chart->set_title($title);
        $chart->add_element($pie);
        $chart->x_axis = null;


        echo $chart->toPrettyString();
    }

    //data graphic bar
    function get_data_bar($yearfrom, $yearto, $type, $kota) {
        $u = Doctrine::getTable('user')->find($kota);
        $title = new title('Data ' . $this->infolib->get_nama_type($type) . ' ' . $u->nama);

        /////retrieve data/////
        $years = $this->infolib->get_years_between($yearfrom, $yearto);
        $label_used = $this->infolib->retrieve_label($type);

        //prepare bar chart
        $chart = new open_flash_chart();
        $chart->set_bg_colour("#FFFFFF");

        //prepare bar x_axis label
        $bar_labels = array();
        foreach ($label_used as $key => $val) {
            array_push($bar_labels, $val);
        }

        $x_labels = new x_axis_labels();
        $x_labels->set_vertical();
        $x_labels->set_labels($bar_labels);

        $x = new x_axis();
        $x->set_labels($x_labels);
        $chart->set_title($title);
        $chart->set_x_axis($x);

        //prepare bar value
        $color_picker = array('#ff0240', '#99fc50', '#0530ff', '#2C7F0D', '#ff00ff', '#00ffff', '#123456', '#474733', '#345678', '#112233', '#441166', '#994411', '#45d444');
        $bars = array();
        $bars_num = 0;
        $sum_value = array();
        $sum_num = 0;
        foreach ($years as $year) {
            $d = Doctrine_Query::create()
                    ->select('id')
                    ->from('report')
                    ->where('kota_id = ?', $kota)
                    ->andwhere('tahun = ?', $year);
            $rowd = $d->execute()->toArray();
            if ($rowd) {
                $d = Doctrine_Query::create()
                        ->select('*')
                        ->from($type)
                        ->where('data_tahun = ?', $rowd[0]['id']);
                $r = $d->execute()->toArray();

                if (count($r) > 0) {
                    //generate each bar value
                    $sum_value[$sum_num] = 0;
                    $bar_value = array();
                    foreach ($label_used as $key => $val) {
                        $datum = floatval($r[0][$key]);
                        array_push($bar_value, $datum);
                        $sum_value[$sum_num] += floatval($r[0][$key]);
                    }
                    //generate each bar config
                    $bars[$bars_num] = new bar_glass();
                    $bars[$bars_num]->set_values($bar_value);
                    $bars[$bars_num]->colour($color_picker[$bars_num]);
                    $bars[$bars_num]->key($year, 12);
                    $bars[$bars_num]->set_on_show(new bar_on_show('grow-up', 1, 1));

                    $chart->add_element($bars[$bars_num]);
                    unset($bar_value);
                    unset($r);

                    $bars_num++;
                    $sum_num++;
                }
            }
        }

        //prepare bar y_axis label
        $sum_used = max($sum_value);
        $sum_used = max($sum_value);
        $y = new y_axis();
        $y->set_range(0, $sum_used, round($sum_used / 5));
        $y->set_label_text("#val# " . $this->infolib->get_satuan_type($type));
        $chart->set_y_axis($y);
        $chart->set_number_format(0, true, true, true);

        // echo count($bars).' sumbars<br>';
        // echo '<pre>';
        // print_r($bars[0]);
        // echo '</pre>';

        echo $chart->toPrettyString();
    }

}
