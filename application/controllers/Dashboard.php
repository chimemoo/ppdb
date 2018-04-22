<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->model('m_adm_user');
        $this->load->model('m_adm_event');
	}
	
    //DASHBOARD FUNCTION

	public function index()
	{
        $data = array(
            'title'     => 'Admin Dashboard',
            'content'   => 'page/admin/dashboard/dashboard_home',
            'l_dash'    => 'active',
            'datatable' => 'component/admin/js/get_user_data'
        );
		$this->load->view('layout/layout-adm',$data);
	}

	function user_get_data()
	{
		$list = $this->m_adm_user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->user_name;
            $row[] = $field->user_email;
            $row[] = '<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_vendor('."'".$field->user_id."'".')"><i class="fa fa-trash"></i></a>
        			';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_user->count_all(),
            "recordsFiltered" => $this->m_adm_user->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    //DASHBOARD FUNCTION


    //EVENT FUNCTION

    public function event(){
        $data = array(
            'title'     => 'Admin Dashboard - Event',
            'content'   => 'page/admin/dashboard/dashboard_event',
            'l_item'    => 'active',
            'datatable' => 'component/admin/js/get_event_data'
        );
        $this->load->view('layout/layout-adm',$data);
    }

    function event_get_data()
    {
        $list = $this->m_adm_event->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->event_name;
            $row[] = $field->event_date;
            $row[] = $field->event_detail;
            $row[] = '<a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" onclick="update_event('."'".$field->event_id."'".')" title="Edit"><i class="fa fa-pencil"></i></a><a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_event('."'".$field->event_id."'".')"><i class="fa fa-trash"></i></a>
                    ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_user->count_all(),
            "recordsFiltered" => $this->m_adm_user->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function event_create(){
        $nmfile = "event_".time().rand(1,255);
        $config['upload_path'] = './uploads/images/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config);


        if(!empty($_FILES['event_picture']['name']))
        {
            if(!$this->upload->do_upload('event_picture'))
            {
                $this->upload->display_errors();
            }  
            else
            {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        }

        $title = $this->input->post('event_name');
        $date = $this->input->post('event_date');
        $content = $this->input->post('event_detail');
        $picture = $gambar;

        $ex = explode("/", $date);
        $date = $ex[2]."-".$ex[1]."-".$ex[0];
        $array = array(
            'event_name' => $title,
            'event_date' => $date,
            'event_detail' => $content,
            'event_img' => $picture
        );
        if($this->m_adm_event->add_event($array))
        {
            $this->session->set_flashdata('add_event_gagal','Data gagal ditambahkan!');
            redirect(base_url('dashboard/event'));
             
        }
        else
        {
            $this->session->set_flashdata('add_event_success','Data Berhasil Ditambahkan');
            redirect(base_url('dashboard/event'));

        }
    }

    function event_drop(){
        $id = $this->input->get('id');
        if($this->m_adm_event->drop_event($id))
        {
            redirect(base_url('dashboard/event'));
        }
    }

    function event_update_get()
    {

        $id = $this->input->get('id');
        $get = $this->m_adm_event->update_get_event($id);
        $date = explode("-", $get[0]['event_date']);
        $get[0]['event_date'] = $date[2]."/".$date[1]."/".$date[0];
        echo json_encode($get);
        
    }

    function event_update_set(){
        $id = $this->input->get('id');

        $nmfile = "event_".time().rand(1,255);
        $config['upload_path'] = './uploads/images/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config);


        if(!empty($_FILES['event_picture']['name']))
        {
            if(!$this->upload->do_upload('event_picture'))
            {
                $this->upload->display_errors();
            }  
            else
            {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        }

        $title = $this->input->post('event_name');
        $date = $this->input->post('event_date');
        $content = $this->input->post('event_detail');
        $picture = $gambar;

        $ex = explode("/", $date);
        $date = $ex[2]."-".$ex[1]."-".$ex[0];
        $array = array(
            'event_name' => $title,
            'event_date' => $date,
            'event_detail' => $content,
            'event_img' => $picture
        );
        if($this->m_adm_event->update_set_event($array,$id))
        {
            $this->session->set_flashdata('add_event_gagal','Data gagal ditambahkan!');
            redirect(base_url('dashboard/event'));
             
        }
        else
        {
            $this->session->set_flashdata('add_event_success','Data Berhasil Ditambahkan');
            redirect(base_url('dashboard/event'));

        }
    }






}
