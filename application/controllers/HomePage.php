<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends CI_Controller {
	function __construct(){
    parent::__construct();

    $this->load->helper(array('form','url', 'psb'));
    $this->load->model('m_homepage');
    $this->load->library('session');
    $this->load->database();
    
  }
	public function index()
	{
        $data = array(
            'title'     => 'Beranda',
            'content'   => 'page/homepage/homepage_home'
        );
		$this->load->view('layout/layout_homepage',$data);
	}

	public function login(){
          $data = array(
            'title'     => 'Login',
            'content'   => 'page/homepage/login'
        );
		$this->load->view('layout/layout_homepage', $data);
	}

	public function logined(){
		if($this->session->userdata('status') != "login"){
			redirect("HomePage/login");
		}
		$data = array(
            'title'     => 'Beranda',
            'content'   => 'page/homepage/homepage_home'
        );
		$this->load->view('layout/layout_login',$data);
	}

	function aksi(){    
	    $username = $this->input->post('user_name');
        $password = $this->input->post('user_password');
		$where = array(
            'user_name' => $username,
			'user_password' => $password
			);
		$cek = $this->m_homepage->cek_login("m_user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
                'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("homepage/logined"));
 
		}else{
			echo "Username dan password salah !";
		}
  }

	  function logout(){
	   $this->session->unset_userdata('user_name');
	   $this->session->sess_destroy();
	   redirect('homepage', 'refresh');
	  }

	function register(){
	    if($this->input->post('m_user')){
	        $this->m_homepage->daftar();
	        redirect('homepage/login');
	    }
        $data = array(
            'title'     => 'Register',
            'content'   => 'page/homepage/register'
        );
		$this->load->view('layout/layout_homepage', $data);
	}

	function psb(){
		if($this->session->userdata('status') != "login"){
			redirect("HomePage/login");
		}
        
        
        $data = array(
            'title'     => 'PSB',
            'content'   => 'page/homepage/psb'
        );
		$this->load->view('layout/layout_login', $data);
	}

    function psb_create(){
        $kode = kode_daftar();

        $config['upload_path'] = './uploads/Foto/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = 'Foto1-'.$kode;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config, 'foto1');
        $this->foto1->initialize($config);

        $config['upload_path'] = './uploads/Foto/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = 'Foto2-'.$kode;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config, 'foto2');
        $this->foto2->initialize($config);

        $config['upload_path'] = './uploads/IjazahScan/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = 'Ijazah-'.$kode;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config, 'ijazah');
        $this->ijazah->initialize($config);

        $config['upload_path'] = './uploads/Doc/';//path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = 'Doc-'.$kode;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config, 'doc');
        $this->doc->initialize($config);

        

        if(!empty($_FILES['registration_pict1']['name']))
        {
            if(!$this->foto1->do_upload('registration_pict1'))
            {
                $this->foto1->display_errors();
            }  
            else
            {
                $upload_data = $this->foto1->data();
                $gambar = $upload_data['file_name'];
            }
        }
        if(!empty($_FILES['registration_pict2']['name']))
        {
            if(!$this->foto2->do_upload('registration_pict2'))
            {
                $this->foto2->display_errors();
            }  
            else
            {
                $upload_data = $this->foto2->data();
                $gambar2 = $upload_data['file_name'];
            }
        }
        if(!empty($_FILES['registration_ijasah_scan']['name']))
        {
            if(!$this->ijazah->do_upload('registration_ijasah_scan'))
            {
                $this->ijazah->display_errors();
            }  
            else
            {
                $upload_data = $this->ijazah->data();
                $gambar3 = $upload_data['file_name'];
            }
        }
        if(!empty($_FILES['registration_doc']['name']))
        {
            if(!$this->doc->do_upload('registration_doc'))
            {
                $this->doc->display_errors();
            }  
            else
            {
                $upload_data = $this->doc->data();
                $doc = $upload_data['file_name'];
            }
        }

        $username = $this->session->userdata('nama');
        $getId = $this->m_homepage->getUserId($username)->row()->user_id;

	   	$registration_code = $kode;
	   	$registration_full_name = $this->input->post('registration_full_name');
	   	$registration_place_birthdate = $this->input->post('registration_place_birthdate');
	   	$registration_address = $this->input->post('registration_address');
        $registration_numphone = $this->input->post('registration_numphone');
	   	$registration_father_name = $this->input->post('registration_father_name');
	   	$registration_mother_name = $this->input->post('registration_mother_name');
	   	$registration_edu_level = $this->input->post('registration_edu_level');
	   	$registration_school = $this->input->post('registration_school');
	   	$registration_ijasah_number = $this->input->post('registration_ijasah_number');
	   	$registration_pict1 = $gambar;
	   	$registration_pict2 = $gambar2;
	   	$registration_ijasah_scan = $gambar3;
	   	$registration_doc = $doc;
        $registration_user_id = $this->input->post('registration_user_id');

	   	$data = array(
	   		'registration_code' => $registration_code,
	   		'registration_full_name' => $registration_full_name,
	   		'registration_place_birthdate' => $registration_place_birthdate,
            'registration_address' => $registration_address,
	   		'registration_numphone' => $registration_numphone,
	   		'registration_father_name' => $registration_father_name,
	   		'registration_mother_name' => $registration_mother_name,
	   		'registration_edu_level' => $registration_edu_level,
	   		'registration_school' => $registration_school,
	   		'registration_ijasah_number' => $registration_ijasah_number,
	   		'registration_pict1' => $registration_pict1,
	   		'registration_pict2' => $registration_pict2,
	   		'registration_ijasah_scan' => $registration_ijasah_scan,
	   		'registration_doc' => $registration_doc,
            'registration_user_id' => $getId
	   	);
        if($this->m_homepage->daftar_psb($data))
        {
            $this->session->set_flashdata('add_event_gagal','Data gagal ditambahkan!');
            redirect(base_url('homepage/psb'));
             
        }
        else
        {
            $this->session->set_flashdata('add_event_success','Data Berhasil Ditambahkan');
            redirect(base_url('homepage/transfer'));

        }
	}

	function transfer(){
        $data = array(
            'title'     => 'Transfer',
            'bank'      => 'BCA',
            'rekening'  => '0898979778866',
            'atasnama'  => 'Fulan',
            'content'   => 'page/homepage/transfer'
        );
		$this->load->view('layout/layout_login', $data);
	}

	function preview($registration_code){
        $data['struk'] = $this->m_homepage->struk($registration_code)->row();
        $this->load->view('page/homepage/invoice', $data);
    }

    public function cetak($registration_code){
        ob_start();
        $data['struk'] = $this->m_homepage->struk($registration_code)->row();
        $this->load->view('page/homepage/print', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','Legal','en');
        $pdf->WriteHTML($html);
        $pdf->Output($registration_code.'.pdf', 'D');
    }

}
