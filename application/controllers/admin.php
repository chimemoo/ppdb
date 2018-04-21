<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		
	}

	public function index()
	{
        $data = array(
            'title'     => 'Beranda',
            'content'   => 'page/admin/dashboard/dashboard_home',
            'l_dash'    => 'active'
        );
		$this->load->view('layout/layout_homepage',$data);
	}

	public function mlebu(){
		$this->load->view('layout/admin/login');
	}
}
