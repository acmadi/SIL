<?php

class File extends Controller {

    var $form_fields;
    var $form_fields_nullable;
    var $process_msg;

    public function __construct() {
        parent::Controller();

        $this->load->helper(array("form", "date", "url"));

        $this->load->library(array("form_validation"));
        $this->form_validation->set_message("required", "Data <i>%s</i> harus diisi.");
        $this->form_validation->set_message("numeric", "Data <i>%s</i> hanya dapat diisi dengan karakter angka (numeric).");
        $this->form_validation->set_message("matches", "Data <i>%s</i> tidak sesuai dengan data <i>%s</i>.");

        $this->form_fields_nullable = array();
    }

    function index() {
        $this->upload();
    }

    function upload_process() {
//        if (!CurrentUser::user())
//            redirect("error/403");

        $data = array();
		$msg ="";
		
		$html = array();
		$html["page_title"] = "Upload";
		$html["title"] = "Upload Foto";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", null, true);
		$info = array(
            "path" => "file/upload_process",
            "button" => "Upload",
			"msg" => $msg,
			'error' => ' '
        );
		$html["content"] = $this->load->view("form_upload", $info, true);
		
		$this->load->view('page', $html);
    }

    function upload() {
       if (!Current_User::user())
           redirect("error/403");
		
		//yg belom :
		//pengaman kalo foto kosong
		
		$msg ="";
		$html = array();

		if ($this->input->post("submit")) {
            if ($this->_upload_validate() === FALSE)
                {echo "Data yang dimasukkan kurang lengkap ";}
            else {
				$config["file_name"] = date('Y_m_d_H_i_s_'.Current_User::user()->id);
				$config['upload_path'] = 'upload';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '2000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload())
				{
					//GAGAL UPLOAD
					echo "Gagal Upload. Perhatikan ukuran gambar (Max. 1024x768 px), ukuran file (Max. 2 Mb), dan tipe gambar ( Hanya diperbolehkan gif, jpg, dan png )";
				}
				else
				{
					//SUKSES UPLOAD
					$data = $this->upload->data();
					$exif = exif_read_data($data["full_path"], 0, true);
					$datetime = date('Y-m-d H:i:s'); 
					
					//create thumbnail
					$this->_create_thumbnail($data["file_name"]);
					$this->_create_medium_thumbnail($data["file_name"]);
					
					//send mail notification
					$this->load->helper('file');
					$this->load->plugin('phpmailer');
					
					/* baca template html */
					$recipient = Current_User::user()->email;
					$subject = "Notifikasi pengaduan aplikasi BPLHD Jawa Barat : ".$this->input->post("reporttitle");
					$ver_code = md5($this->input->post("email").$this->input->post("fullname"));
					
					$content = read_file('template/t_upload.html');
					$content = str_replace("#x1#",$this->input->post("reporttitle"),$content);
					$content = str_replace("#x2#",$datetime,$content);
					$content = str_replace("#x3#",$this->input->post("desc"),$content);
					
					//Send mail process
					try {
						send_email($recipient, $subject, $content);
						$msg = "Pengaduan telah berhasil, silakan mengecek email Anda untuk melihat notifikasinya";
					} catch (Exception $e) {
						$msg = "Penngaduan telah berhasil, gagal mengirimkan email notifikasi";
					}
					
					//insert record to model
					$u = new Report();
					$u->report_title = $this->input->post("reporttitle");
					$u->filename = $data["file_name"];
					list($u->lon, $u->lat) = $this->_get_lon_lat($exif);
					$u->report_location = $this->input->post("location");
					$u->report_desc = $this->input->post("desc");
					$u->report_source = $this->input->post("source");
					$u->upload_time = $datetime;
					$u->create_time = str_replace(":", "-", $exif["GPS"]["GPSDateStamp"]);
					$u->user_id = Current_User::user()->id;
					$u->save();
				}
			}
		}
			
		$html["page_title"] = "Upload";
		$html["title"] = "Upload Foto";
		$html["script"] = $this->load->view("script_general", null, true);
		$html["header"] = $this->load->view("header", null, true);
		$info = array(
            "path" => "file/upload_process",
            "button" => "Upload",
			"msg" => $msg,
			'error' => ' '
        );
		$html["content"] = $this->load->view("form_upload", $info, true);
		
		$this->load->view('page', $html);
		
		
    }
	
	function coba(){
		$datetime = date('Y_m_d_H_i_s_'.Current_User::user()->id); 
		echo $datetime;
	}
	
	function _create_thumbnail($fileName) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'upload/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 210; //640;
		$config['height'] = 160; //480;
		$config['thumb_marker'] = '';
		$config['new_image'] = 'upload/thumb/thumb_'.$fileName;
		
		// echo "#".$config['source_image']."#".$config['new_image'];
		
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()) 
			 echo $this->image_lib->display_errors();

	}
	
	function _create_medium_thumbnail($fileName) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'upload/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 640;
		$config['height'] = 480;
		$config['thumb_marker'] = '';
		$config['new_image'] = 'upload/medium/med_'.$fileName;
		
		// echo "#".$config['source_image']."#".$config['new_image'];
		
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()) 
			 echo $this->image_lib->display_errors();

	 }	

    function download_process() {
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
    
    function _get_lon_lat($exif) {
        $lat_sec = explode("/", $exif["GPS"]["GPSLatitude"][2]);
        $a = floatval($lat_sec[0]/$lat_sec[1])/3600;
        //echo "a = ".$a."<br/>";
        $lon_sec = explode("/", $exif["GPS"]["GPSLongitude"][2]);
        $b = floatval($lon_sec[0]/$lon_sec[1])/3600;
        //echo "b = ".$b."<br/>";

        $lat_min = explode("/", $exif["GPS"]["GPSLatitude"][1]);
        $c = floatval($lat_min[0]/$lat_min[1])/60;
        //echo "c = ".$c."<br/>";
        $lon_min = explode("/", $exif["GPS"]["GPSLongitude"][1]);
        $d = floatval($lon_min[0]/$lon_min[1])/60;
        //echo "d = ".$d."<br/>";

        $lat_deg = explode("/", $exif["GPS"]["GPSLatitude"][0]);
        $e = floatval($lat_deg[0]/$lat_deg[1]);
        //echo "e = ".$e."<br/>";
        $lon_deg = explode("/", $exif["GPS"]["GPSLongitude"][0]);
        $f = floatval($lon_deg[0]/$lon_deg[1]);
        //echo "f = ".$f."<br/>";

        //$lat = intval($exif["GPS"]["GPSLatitude"][0]) + ((intval($exif["GPS"]["GPSLatitude"][1]) + ($lat_sec[0] / $lat_sec[1] / 60)) / 60);
        //$lon = intval($exif["GPS"]["GPSLongitude"][0]) + ((intval($exif["GPS"]["GPSLongitude"][1]) + ($lon_sec[0] / $lon_sec[1] / 60)) / 60);

        $lat = $a+$c+$e;
        $lon = $b+$d+$f;

        $lat_direction = $exif["GPS"]["GPSLatitudeRef"];
        $lng_direction = $exif["GPS"]["GPSLongitudeRef"];
        if($lat_direction == "S"){
            $lat = $lat*-1;
        }
        if($lng_direction == "W"){
            $lon = $lon*-1;
        }
        //echo "lat = $lat<br />";
        //echo "lon = $lon";
        return array($lon, $lat);
    }

	function _upload_validate() {
		// validation rules
		$this->form_validation->set_rules('reporttitle', 'Judul Pengaduan','required');

		$this->form_validation->set_rules('location', 'Lokasi','required');

		$this->form_validation->set_rules('source', 'Sumber Informasi','required');

		$this->form_validation->set_rules('desc', 'Deskripsi Pengaduan','required');
			
		// $this->form_validation->set_rules('userfile', 'File Upload','required');

		$this->form_validation->set_message('required', "Field %s belum Anda isi");
		
		return $this->form_validation->run();
	}
	
}
