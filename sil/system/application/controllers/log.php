<?php

class Log extends Controller {

    function Log() {
        parent::Controller();

        $this->load->helper(array("form", "date"));
        $this->load->library(array("encrypt", "form_validation", "session"));
    }

    function index() {
        if (Current_User::user())
            redirect("error/403");

        $msg = "";
        $info = array(
            "path" => "log/login",
            "button" => "Login",
            "msg" => $msg
        );

        $current['page'] = 'log';

        $html = array();
        $html["page_title"] = "Login";
        $html["title"] = "Login";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("form_login", $info, true);
        $this->load->view('page', $html);
    }

    public function profil($id = 0) {
        if (empty($id))
            $id = Current_User::user()->id;

        $msg = "";

        $current['page'] = 'account';
        $current['id'] = $id;
        $current['user'] = Doctrine::getTable('User')->find($id);

        $html = array();
        $html["page_title"] = "Profil";
        $html["title"] = "Halaman Profil";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("profil", null, true);
        $this->load->view('page', $html);
    }

    public function edit($id = 0) {
        if (empty($id))
            $id = Current_User::user()->id;

        $msg = "";

        $current['page'] = 'account';
        $current['cuid'] = Current_User::user()->id;
        $current['id'] = $id;
        $current['user'] = Doctrine::getTable('User')->find($id);

        $html = array();
        $html["page_title"] = "Profil";
        $html["title"] = "Profil";
        $html["script"] = $this->load->view("script_general", null, true);
        $html["header"] = $this->load->view("header", $current, true);
        $html["content"] = $this->load->view("profil_edit", null, true);
        $this->load->view('page', $html);
    }

    public function edit_password($id = 0) {
        if (empty($id))
            $id = Current_User::user()->id;

        if ($this->input->post("submit")) {
            if ($this->_edit_password_validate() === FALSE) {
                $msg = "Edit Gagal";
//                echo "gagal valid";
            } else {
                if (($u = Doctrine::getTable('User')->find($id))) {
                    // this mutates (encrypts) the input password
                    $u_input = new User();
                    $u_input->password = $this->input->post("oldpassword");

                    // password match (comparing encrypted passwords)
                    if ($u->password == $u_input->password || $id != Current_User::user()->id) {
                        $u->password = $this->input->post("password");
                        $u->save();
                    }
                }
//                echo "berhasil valid";
            }
        }

        redirect('log/profil/' . $id);
    }

    public function edit_info($id = 0) {
        if (empty($id))
            $id = Current_User::user()->id;

        if ($this->input->post("submit")) {
            if ($this->_edit_info_validate() === FALSE) {
                $msg = "Edit Gagal";
            } else {
                $u = Doctrine::getTable('user')->find($id);
                $u->nama = $this->input->post("nama");
                $u->deskripsi = $this->input->post("deskripsi");
                $u->lon = $this->input->post("lon");
                $u->lat = $this->input->post("lat");
                $u->phone_no = $this->input->post("phone_no");
                $u->email = $this->input->post("email");

                $u->save();
            }
        }

        redirect('log/profil/' . $id);
    }

    public function edit_wiki($id = 0) {
        if (empty($id))
            $id = Current_User::user()->id;

        if ($this->input->post("submit")) {
            if (!$this->input->post("wiki")) {
                $msg = "Edit Gagal";
            } else {
                $u = Doctrine::getTable('user')->find($id);

                $wiki = $u->getWiki();
                $wiki->wiki = $this->input->post("wiki");

                try {
                    $wiki->save();
                } catch (Exception $e) {
                }
            }
        }

        redirect('log/profil/' . $id);
    }

    public function login() {
        if ($this->input->post("submit")) {
            if ($this->_login_validate() === FALSE) {
                $msg = "Gagal Login";
                redirect('/log');
            } else {
                $msg = "Berhasil Login";
                if (Current_User::user()) {
                    if (Current_User::user()->role == 2)
                        redirect("/admin");
                    else {
                        redirect('/');
                    }
                } else {
                    redirect('/');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('/');
    }

    private function _login_validate() {

        // validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_authenticate');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_message('required', "Field %s belum Anda isi");
        $this->form_validation->set_message('authenticate', 'Gagal login. Silakan coba lagi.');
        return $this->form_validation->run();
    }

    private function _edit_info_validate() {

        // validation rules
        $this->form_validation->set_rules('nama', 'Nama Kota/Kab', 'required');
        $this->form_validation->set_rules('lon', 'Longitude', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required');

        $this->form_validation->set_message('required', "Field %s belum Anda isi");

        return $this->form_validation->run();
    }

    private function _edit_password_validate() {

        // validation rules

        $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('passconf', 'Konfirm Password Baru', 'required|matches[password]');

        $this->form_validation->set_message('required', "Field %s belum Anda isi");

        return $this->form_validation->run();
    }

    public function authenticate() {
        return Current_User::login($this->input->post('username'), $this->input->post('password'));
    }

}
