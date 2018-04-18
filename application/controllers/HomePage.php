<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends CI_Controller {
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

	public function Login(){
		$this->load->view('layout/homepage/login');
	}

	public function Register(){
		$this->load->view('layout/homepage/register');
	}
}
