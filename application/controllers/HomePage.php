<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends CI_Controller {
	function __construct(){
    parent::__construct();

    $this->load->helper(array('form','url', 'psb','text'));
    $this->load->model('m_homepage');
    $this->load->library('session');
    $this->load->database();
    
  }
	public function index()
	{
        $limitEvent = 3;
        $limitNews = 4;
        $limitPengumuman = 5;

        $news = $this->m_homepage->m_showNewsLimit($limitNews);
        $showEvent = $this->m_homepage->m_showEventLimit($limitEvent);
        $pengumuman = $this->m_homepage->m_GeneralPeng($limitPengumuman);
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $data = array(
            'title'         => 'Beranda',
            'nameSchool'    => 'HS HomeSchooling',
            'news'          => $news,
            'event'         => $showEvent,
            'pengumuman'    => $pengumuman,

            'contactWA'     => '087765757747',
            'contactLine'   => '@homeschool',
            'contactIG'     => '@homeschool',
            'contactFB'     => 'HomeSchool',

            'profileSchool' =>  'page/homepage/profile_school',
            'content'       => 'page/homepage/homepage_home',
            'notif'			=> $notif
        );
        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        }
		
	}

    public function profile_school()
    {
        if(isset($this->session->user_id))
        {
            $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
            $data = array(
                'title'         => 'Profile school',
                'content'       => 'page/homepage/profile_school',
                'notif'         => $notif
            );

            if($this->session->userdata('status') != "login"){
                $this->load->view('layout/layout_homepage',$data);
            }
            else {
                $this->load->view('layout/layout_login',$data);
            }
        }
        else {
            $data = array(
                'title'     => 'Profile school',
                'content'   => 'page/homepage/profile_school'
            );
            $this->load->view('layout/layout_homepage', $data);
        }
        
        
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
            $id = $this->m_homepage->cek_login("m_user",$where)->result_array();
			$data_session = array(
                'nama' => $username,
				'status' => "login",
                'user_id'=> $id[0]['user_id']
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("homepage/index"));
 
		}else{
            $this->session->set_flashdata('loginfailed','Maaf username dan password salah!');
			redirect(base_url("homepage/login"));
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
        
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $data = array(
            'title'     => 'PSB',
            'content'   => 'page/homepage/psb',
            'notif'     => $notif
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
        $getId = $this->m_homepage->getUserId($username);
        $getId = $getId[0]['user_id'];

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
            redirect(site_url('homepage/transfer/'.$registration_code));

        }
	}

	function transfer($registration_code){
        // Login Cek
        if($this->session->userdata('status') != "login"){
            redirect("HomePage/login");
        }
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $getPrice = $this->m_homepage->harga($registration_code)->row();
        

        $data = array(
            'title'     => 'Transfer',
            'bank'      => 'BCA',
            'biaya'     => $getPrice,
            'rekening'  => '0898979778866',
            'atasnama'  => 'Fulan',
            'content'   => 'page/homepage/transfer',
            'notif'		=> $notif
        );
		$this->load->view('layout/layout_login', $data);
	}

    function transfer_create($registration_code){
       $username = $this->session->userdata('nama');
        
        
        // Upload Foto
        $kode = kode_daftar();
        $config['upload_path'] = './uploads/Transfer/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = 'Transfer-'.$kode;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config, 'transfer');
        $this->transfer->initialize($config);

        if(!empty($_FILES['confirm_image']['name']))
        {
            if(!$this->transfer->do_upload('confirm_image'))
            {
                $this->transfer->display_errors();
            }  
            else
            {
                $upload_data = $this->transfer->data();
                $transfer = $upload_data['file_name'];
            }
        }


        $confirm_id = $registration_code.'-'.$username;
        $confirm_registration_code = $registration_code;
        $confirm_user_account = $this->input->post('confirm_user_account');;
        $confirm_admin_account = $this->input->post('confirm_admin_account');;
        $confirm_image = $transfer;
        $confirm_price = $this->input->post('confirm_price');

        $data = array(
            'confirm_id'                  => $confirm_id,
            'confirm_registration_code'   => $confirm_registration_code,
            'confirm_admin_account'       => $confirm_admin_account,
            'confirm_user_account'        => $confirm_user_account,
            'confirm_image'               => $confirm_image,
            'confirm_price'               => $confirm_price,
            'confirm_status'              => '0'
            ); 


         if($this->m_homepage->m_confirm($data)){
            $this->session->set_flashdata('add_event_gagal','Data gagal ditambahkan!');
            redirect(base_url('homepage/transfer/'));      
        }
        else{
            
            $this->session->set_flashdata('add_event_success','Data Berhasil Ditambahkan');
            redirect(site_url('homepage/pengumuman/'.$registration_code));
        }
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

 
    function pengumuman(){
       if($this->session->userdata('status') != "login"){
            redirect("HomePage/login");
        }
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $username = $this->session->userdata('nama');
        $getId = $this->m_homepage->getUserId($username);
        $getId = $getId[0]['user_id'];


        $status = $this->m_homepage->m_pengumuman($getId)->result_array();

        $data = array(
            'title'     => 'Pengumuman',
            'status'    => $status,
            'content'   => 'page/homepage/pengumuman',
            'notif'		=> $notif
        );



        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        } 
    }

    function messages($registration_code){
       if($this->session->userdata('status') != "login"){
            redirect("HomePage/login");
        }
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $code = $this->m_homepage->m_messages($registration_code)->row();
        
        $baca = $this->m_homepage->m_notifcStatus($this->session->user_id);

        $read = $this->session->user_id;
        $data = array(
            'title'         => 'Messages',
            'code_regis'    =>  $code,
            'content'       => 'page/homepage/messages',
            'notif'			=> $notif,
            'read'          => $read
        );
       
        if($baca == true){
        		$this->load->view('layout/layout_login',$data); 
        }
        ;
        
    }

    function news(){
        $news = $this->m_homepage->m_showNews();
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $data = array(
            'title'         => 'News',
            'news'          =>  $news,
            'content'       => 'page/homepage/news',
            'notif'			=> $notif
        );

        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        } 
    }


    function event(){
        $showEvent = $this->m_homepage->m_showEvent();
        $notif = $this->m_homepage->m_notifStatus($this->session->user_id);
        $data = array(
            'title'     => 'Event',
            'event'     => $showEvent,
            'content'   => 'page/homepage/event',
            'notif'		=> $notif
        );

        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        }
    }

    function detailEvent($event_id){
        $detail =  $this->m_homepage->m_detailEvent($event_id)->row();
        $data = array(
            'title'     => 'Event',
            'detail'     => $detail,
            'content'   => 'page/homepage/event_detail'
        );

        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        }  
    }

    function detailNews($news_id){
        $detail =  $this->m_homepage->m_detailNews($news_id)->row();
        $data = array(
            'title'     => 'News',
            'detail'     => $detail,
            'content'   => 'page/homepage/news_detail'
        );

        if($this->session->userdata('status') != "login"){
            $this->load->view('layout/layout_homepage',$data);
        }
        else {
            $this->load->view('layout/layout_login',$data);
        }  
    }

}
