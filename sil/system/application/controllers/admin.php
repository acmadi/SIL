<?php

class Admin extends Controller {

    function Admin() {
        parent::Controller();

        $this->load->helper(array("form", "date"));
        $this->load->library(array("encrypt", "form_validation", "session"));
    }

    function index() {
        if (Current_User::user()) {
            if (Current_User::user()->role != 2)
                redirect("error/403");
        }else
            redirect("error/403");

        $current['page'] = 'admin';

        $html = array();
        $html["page_title"] = "Manajemen User";
        $html["title"] = "Manajemen User";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("admin", null, true);
        $this->load->view('page', $html);
    }

    public function edit($id) {
        $msg = "";
        if ($this->input->post("submit")) {
            if ($this->_edit_validate() === FALSE) {
                $msg = "Edit Gagal";
            } else {
                $datetime = date('Y-m-d H:i:s');
                $u = Doctrine::getTable('report')->find($id);
                $u->valid_status = $this->input->post("valid_status");
                $u->response_status = $this->input->post("respon_status");
                $u->response_desc = $this->input->post("respon_desc");
                $u->response_date = $datetime;

                $u->save();
            }
        }

        $q = Doctrine::getTable('report')->find($id);
        $u = Doctrine::getTable('user')->find($q->user_id);

        $info["detail"] = $q;
        $info["user"] = $u;
        $info["path"] = "admin/edit/" . $id;

        $html = array();
        $html["page_title"] = "Respon Pengaduan";
        $html["title"] = "Respon Pengaduan";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", null, true);
        $html["content"] = $this->load->view("admin_edit", $info, true);
        $this->load->view('page', $html);
    }

    private function _edit_validate() {

        // validation rules
        $this->form_validation->set_rules('valid_status', 'Status Valid', 'required');

        $this->form_validation->set_rules('respon_status', 'Status Respon', 'required');

        $this->form_validation->set_rules('respon_desc', 'Respon Pengaduan', 'required');

        $this->form_validation->set_message('required', "Field %s belum Anda isi");

        return $this->form_validation->run();
    }

    function edit_kota() {
        if ($this->input->post("nama")) {
            $u = null;
            if ($this->input->post("id") != "_empty") {
                $u = Doctrine::getTable('user')->find($this->input->post("id"));
            } else {
                $u = new User();
            }
            $u->username = $this->input->post("nama");
            $u->nama = $this->input->post("nama");
            $u->password = time();
            $u->lon = $this->input->post("lon");
            $u->lat = $this->input->post("lat");
            $u->deskripsi = $this->input->post("deskripsi");
            $u->phone_no = $this->input->post("phone_no");
            $u->email = $this->input->post("email");
            $u->status = $this->input->post("status");
            $u->role = 1;
            $u->save();
        }
    }

    function get_kota() {
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
                ->from('user')
                ->where('role != ?', 2);

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
                ->select('id, nama, password, lon, lat, status, deskripsi, phone_no, email')
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
            $status = '';
            if ($f["status"] == 1) {
                $status = 'Aktif';
            } else {
                $status = 'Non Aktif';
            }

            $responce->rows[$i]['id'] = $f["id"];
            $responce->rows[$i]['cell'] = array($f["nama"], $status, $f["lon"], $f["lat"], $f["deskripsi"], $f['phone_no'], $f['email']);
            $i++;
        }
        echo json_encode($responce);
    }

}
