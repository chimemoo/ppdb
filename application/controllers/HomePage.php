<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends CI_Controller {
	function __construct(){
    parent::__construct();

    $this->load->helper(array('form','url'));
    $this->load->model('m_homepage');
    $this->load->library('session');
    $this->load->database();
    
  }
	public function index()
	{
        $data = array(
            'title'     => 'Beranda',
            'content'   => 'page/admin/dashboard/dashboard_home',
            'content'   => 'page/homepage/homepage_home',
            'l_dash'    => 'active'
        );
		$this->load->view('layout/layout_homepage',$data);
	}

	public function login(){
		$this->load->view('layout/homepage/login');
	}

	public function logined(){
		if($this->session->userdata('status') != "login"){
			redirect("HomePage/login");
		}
		$data = array(
            'title'     => 'Beranda',
            'content'   => 'page/admin/dashboard/dashboard_home',
            'content'   => 'page/homepage/homepage_home',
            'l_dash'    => 'active'
        );
		$this->load->view('layout/layout_homepage2',$data);
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
		$this->load->view('layout/homepage/register');
	}
}
