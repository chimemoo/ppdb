<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $dbm = array('m_adm_user','m_adm_admin','m_adm_event','m_adm_news','m_adm_siswa','m_adm_payment','m_adm_peng');
        $this->load->model($dbm);
	}
	
    //DASHBOARD FUNCTION

    public function login()
    {
        $data = array(
            'title'     => 'Admin Dashboard - Login',
            'content'   => 'page/admin/dashboard/dashboard_login'
        );
        $this->load->view('layout/layout-adm',$data);
    }

    public function loginprocess()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'admin_email' => $username,
            'admin_password' => $password
            );
        $cek = $this->m_adm_admin->cek_login("m_admin",$where)->num_rows();
        if($cek > 0){
            $data = $this->m_adm_admin->cek_login("m_admin",$where)->result_array();
            $data_session = array(
                'admin_email' => $username,
                'status' => "login",
                'admin_name' => $data[0]['admin_name']
                );
 
            $this->session->set_userdata($data_session);
 
            redirect(base_url("dashboard"));
 
        }else{
            $status_login = array(
                "failed"=>"Maaf username/password anda salah"
            );
            $this->session->set_flashdata($status_login);
            redirect(base_url('dashboard/login'));
        }
    }

	public function index()
	{
        $this->save();
        $data = array(
            'title'     => 'Admin Dashboard',
            'content'   => 'page/admin/dashboard/dashboard_home',
            'l_dash'    => 'active',
            'datatable' => 'component/admin/js/get_user_data',
            'datatable2' => 'component/admin/js/get_admin_data',
            'datatable3' => 'component/admin/js/get_news_data'
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


    function admin_get_data()
    {
        $list = $this->m_adm_admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->admin_name;
            $row[] = $field->admin_email;
            $row[] = '<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_vendor('."'".$field->admin_id."'".')"><i class="fa fa-trash"></i></a>
                    ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_admin->count_all(),
            "recordsFiltered" => $this->m_adm_admin->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function admin_create()
    {
        $uname = $this->input->post('username');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $array = array(
            'admin_name' => $uname,
            'admin_email' => $email,
            'admin_password' => $pass
        );

        if($this->m_adm_admin->add_admin($array))
        {
            redirect(base_url('dashboard'));
        }
    }

    function news_create()
    {
        $title = $this->input->post('news_title');
        $content = $this->input->post('news_content');
        $date = date('Y-m-d');
        echo $content;
        $array = array(
            'news_title' => $title,
            'news_content' => $content,
            'news_datestamp' => $date
        );

        if($this->m_adm_news->add_news($array))
        {
            redirect(base_url());
        }

    }

    function news_get_data()
    {
        $this->save();
        $list = $this->m_adm_news->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->news_title;
            $row[] = $field->news_datestamp;
            $row[] = '<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_news('."'".$field->news_id."'".')"><i class="fa fa-trash"></i></a>
                    ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_news->count_all(),
            "recordsFiltered" => $this->m_adm_news->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function news_drop(){
        $id = $this->input->get('id');
        if($this->m_adm_news->drop_news($id))
        {
            redirect(base_url('dashboard/event'));
        }
    }

    //DASHBOARD FUNCTION

    //SETTING FUNCTION

    public function setting()
    {
        $this->save();
        if(isset($this->session->admin_name))
        {
            $where = array(
                'admin_name' => $this->session->admin_name,
                'admin_email' => $this->session->admin_email
            );
            $cek = $this->m_adm_admin->cek_login('m_admin',$where)->result_array();
            $data = array(
                'title'     => 'Admin Dashboard - Setting',
                'content'   => 'page/admin/dashboard/dashboard_setting',
                'profile' => $cek
            );
            $this->load->view('layout/layout-adm',$data);
        }
        else {
            redirect(base_url('homepage'));
        }
        
    }

    //SETTING FUNCTION


    //PROFILE FUNCTION

    public function profile()
    {
        if(isset($this->session->admin_name))
        {
            $where = array(
                'admin_name' => $this->session->admin_name,
                'admin_email' => $this->session->admin_email
            );
            $cek = $this->m_adm_admin->cek_login('m_admin',$where)->result_array();
            $data = array(
                'title'     => 'Admin Dashboard - Profile',
                'content'   => 'page/admin/dashboard/dashboard_profile',
                'profile' => $cek
            );
            $this->load->view('layout/layout-adm',$data);
        }
        else {
            redirect(base_url('homepage'));
        }
    }

    //PROFILE FUNCTION

    //EVENT FUNCTION

    public function event(){
        $this->save();
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
            $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
            redirect(base_url('dashboard/event'));
            
             
        }
        else
        {
            $this->session->set_flashdata('failed','Data gagal ditambahkan!');
            redirect(base_url('dashboard/event'));

        }
    }

    function event_report()
    {
        $do = $this->input->get('do');
        if($do == 'down')
        {
            ob_start();
            $tanggal = array(
                    'tgl1' => $this->input->get('tgl1'),
                    'tgl2' => $this->input->get('tgl2'),
                    'bln1' => $this->input->get('bln1'),
                    'bln2' => $this->input->get('bln2'),
                    'thn1' => $this->input->get('thn1'),
                    'thn2' => $this->input->get('thn2')
                );
            $data['link'] = 'tgl1='.$this->input->get('tgl1').'&&bln1='.$this->input->get('bln1').'&&thn1='.$this->input->get('thn1').'&&tgl2='.$this->input->get('tgl2').'&&bln2='.$this->input->get('bln2').'&&thn2='.$this->input->get('thn2');
            $cek = $this->m_adm_event->ceklaporan($tanggal);  
            $data = [ 'cek' => $cek ];
            $this->load->view('page/export/report_event', $data);
            $html = ob_get_contents();
            ob_end_clean();

            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','Legal','en');
            $pdf->WriteHTML($html);
            $pdf->Output('LaporanEvent'.'.pdf', 'D');
        }
        else {
            $tanggal = array(
                    'tgl1' => $this->input->get('tgl1'),
                    'tgl2' => $this->input->get('tgl2'),
                    'bln1' => $this->input->get('bln1'),
                    'bln2' => $this->input->get('bln2'),
                    'thn1' => $this->input->get('thn1'),
                    'thn2' => $this->input->get('thn2')
                );
            $data['link'] = 'tgl1='.$this->input->get('tgl1').'&&bln1='.$this->input->get('bln1').'&&thn1='.$this->input->get('thn1').'&&tgl2='.$this->input->get('tgl2').'&&bln2='.$this->input->get('bln2').'&&thn2='.$this->input->get('thn2');
            $cek = $this->m_adm_event->ceklaporan($tanggal);
            echo json_encode($cek);
        }
    }

    //EVENT FUNCTION

    //SISWA FUNCTION
    function siswa()
    {
        $data = array(
            'title'     => 'Admin Dashboard - Daftar Siswa Yang sudah Tervrifikasi',
            'content'   => 'page/admin/dashboard/dashboard_siswa',
            'l_user'    => 'active',
            'datatable' => 'component/admin/js/get_siswa_data'
        );
        $this->load->view('layout/layout-adm',$data);
    }

    function siswa_ver_get_data()
    {
        $list = $this->m_adm_siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            if($field->registration_status == 0)
            {
                $status = "Belum membayar";
            }
            else {
                $status = "Sudah membayar";
            }
            $row = array(); 
            $row[] = $no;
            $row[] = $field->registration_code;
            $row[] = $field->registration_full_name;
            $row[] = $field->registration_edu_level;
            $row[] = $status;
            $row[] = '
            <a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" title="Detail" onclick="detail_siswa('."'".$field->registration_id."','".$field->registration_code."'".')"><i class="fa fa-info-circle"></i></a> 
            <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_siswa('."'".$field->registration_id."'".')"><i class="fa fa-trash"></i></a>
                        ';
     
                $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_siswa->count_all(),
            "recordsFiltered" => $this->m_adm_siswa->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    

    function siswa_report()
    {
        $do = $this->input->get('do');
        if($do == 'down')
        {
            ob_start();
            $tp = $this->input->get('tp');
            $status = $this->input->get('status');
            if($status == "verified")
            {
                $status = 1;
            }
            else {
                $status = 0;
            }
            $cek = $this->m_adm_siswa->ceklaporan($tp,$status);
            $data = ['cek' => $cek];
            $this->load->view('page/export/report_siswa', $data);
            $html = ob_get_contents();
            ob_end_clean();

            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','Legal','en');
            $pdf->WriteHTML($html);
            $pdf->Output('LaporanSiswa'.'.pdf', 'D');
        }
        else {
            $tp = $this->input->get('tp');
            $status = $this->input->get('status');
            if($status == "verified")
            {
                $status = 1;
            }
            else {
                $status = 0;
            }
            $cek = $this->m_adm_siswa->ceklaporan($tp,$status);
            echo json_encode($cek);
        }
    }

    function siswa_drop(){
        $id = $this->input->get('id');
        if($this->m_adm_siswa->drop_siswa($id))
        {
            redirect(base_url('dashboard/siswa'));
        }
    }

    function siswa_data()
    {
        $id = $this->input->get('id');
        $data = $this->m_adm_siswa->siswa_data($id);
        echo json_encode($data);
    }

    //FUNCTION PEMBAYARAN
    function payment(){
        $this->save();
        $data = array(
            'title'     => 'Admin Dashboard - Daftar Payment',
            'content'   => 'page/admin/dashboard/dashboard_payment',
            'l_pay'    => 'active',
            'datatable' => 'component/admin/js/get_payment_data'
        );
        $this->load->view('layout/layout-adm',$data);
    }

    function payment_get_data()
    {
        $list = $this->m_adm_payment->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 
            if($field->confirm_status == 0)
            {
                $field->confirm_status = ' Belum Diverifikasi';
                $active = "Konfirmasi!";
                $icon = "fa-check-circle";
                $con = 1;
            }
            else {
                $field->confirm_status = 'Sudah Diverifikasi';
                $active = "Batalkan!";
                $icon = "fa-ban";
                $con = 0;
            }

            $row[] = $no;
            $row[] = $field->confirm_registration_code;
            $row[] = $field->confirm_user_account;
            $row[] = $field->confirm_admin_account;
            $row[] = 'Rp. '.number_format($field->confirm_price,0,",",".");
            $row[] = $field->confirm_status;
            $row[] = '<a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" title="'.$active.'" onclick="confirm_payment('."'".$field->confirm_id."','".$con."','".$field->confirm_registration_code."'".')"><i class="fa '.$icon.'"></i></a>
                <a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" title="Detail" onclick="detail_confirm('."'".$field->confirm_id."'".')"><i class="fa fa-info-circle"></i></a> 
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_payment('."'".$field->confirm_id."'".')"><i class="fa fa-trash"></i></a>
                        ';
     
                $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_payment->count_all(),
            "recordsFiltered" => $this->m_adm_payment->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function payment_drop(){
        $id = $this->input->get('id');
        if($this->m_adm_payment->drop_payment($id))
        {
            redirect(base_url('dashboard/payment'));
        }
    }

    function payment_reg_data()
    {
        $code = $this->input->get('code');
        $data = $this->m_adm_payment->data_reg($code)->result_array();
        echo json_encode($data);

    }

    function change_status()
    {
        $status = $this->input->get('status');
        $code = $this->input->get('code');
        $id = $this->input->get('id');
        if($this->m_adm_payment->activate_reg($code,$status))
        {
            if($this->m_adm_payment->activate_conf($id,$status))
            {
                redirect(base_url('dashboard/payment'));
            }
        }
    }

    function detail_payment()
    {
        $id = $this->input->get('id');
        $data = $this->m_adm_payment->detail_payment($id);
        echo json_encode($data);
    }

    function announce_send()
    {
        $user_id = $this->input->get('user_id');
        $code = $this->input->post('kodetransaksi');
        $title= $this->input->post('judul');
        $pesan= $this->input->post('pesan');

        $data = [
            "notif_user_id" => $user_id,
            "notif_reg_id"  => $code,
            "notif_title"   => $title,
            "notif_message" => $pesan
        ];
        if($this->m_adm_payment->send_announce($data))
        {
            redirect(base_url('dashboard/payment'));
        }
    }

    function logout()
    {
        $this->session->unset_userdata('admin_email','status','admin_name');
        $this->session->sess_destroy();
           redirect('dashboard/login', 'refresh');
    }

    function save()
    {
        if(!isset($this->session->admin_email))
        {
            redirect(base_url('dashboard/login'));
        }
    }

    function pengumuman()
    {
        $data = array(
            'title' => 'Admin Dashboard - Data Pengumuman',
            'content' => 'page/admin/dashboard/dashboard_pengumuman',
            'l_peng' => 'active',
            'datatable' => 'component/admin/js/get_peng_data'

        );

        $this->load->view('layout/layout-adm', $data);
    }

    function peng_get_data()
    {
        $list = $this->m_adm_peng->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 

            $row[] = $no;
            $row[] = $field->peng_name;
            $row[] = $field->peng_date;
            $row[] = $field->peng_detail;
            $row[] = '<a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" onclick="update_peng('."'".$field->peng_id."'".')" title="Edit"><i class="fa fa-pencil"></i></a><a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="delete" onclick="delete_peng('."'".$field->peng_id."'".')"><i class="fa fa-trash"></i></a>
                    ';
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_adm_peng->count_all(),
            "recordsFiltered" => $this->m_adm_peng->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function peng_create(){
        $nmfile = "peng_".time().rand(1,255);
        $config['upload_path'] = './uploads/images/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config);


        if(!empty($_FILES['peng_picture']['name']))
        {
            if(!$this->upload->do_upload('peng_picture'))
            {
                $this->upload->display_errors();
            }  
            else
            {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        }

        $title = $this->input->post('peng_name');
        $date = date('Y-m-d');
        $content = $this->input->post('peng_detail');
        $picture = $gambar;
        $array = array(
            'peng_name' => $title,
            'peng_date' => $date,
            'peng_detail' => $content,
            'peng_img' => $picture
        );
        if($this->m_adm_peng->add_peng($array))
        {
             $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
            redirect(base_url('dashboard/pengumuman'));
            
             
        }
        else
        {
           $this->session->set_flashdata('failed','Data gagal ditambahkan!');
            redirect(base_url('dashboard/pengumuman'));

        }
    }

    function peng_update_get()
    {

        $id = $this->input->get('id');
        $get = $this->m_adm_peng->update_get_peng($id);
        echo json_encode($get);
        
    }

     function peng_update_set(){
        $id = $this->input->get('id');

        $nmfile = "peng_".time().rand(1,255);
        $config['upload_path'] = './uploads/images/';//path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile;
        $config['remove_spaces'] = true;
        $this->load->library('upload',$config);


        if(!empty($_FILES['peng_picture']['name']))
        {
            if(!$this->upload->do_upload('peng_picture'))
            {
                $this->upload->display_errors();
            }  
            else
            {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
        }

        $title = $this->input->post('peng_name');
        $date = date('Y-m-d');
        $content = $this->input->post('peng_detail');
        $picture = $gambar;

        $array = array(
            'peng_name' => $title,
            'peng_date' => $date,
            'peng_detail' => $content,
            'peng_img' => $picture
        );
        if($this->m_adm_peng->update_set_peng($array,$id))
        {
            $this->session->set_flashdata('sukses','Data Berhasil Ditambahkan');
            redirect(base_url('dashboard/pengumuman'));
             
        }
        else
        {
            $this->session->set_flashdata('failed','Data gagal ditambahkan!');
            redirect(base_url('dashboard/pengumuman'));

        }
    }

    function peng_drop(){
        $id = $this->input->get('id');
        if($this->m_adm_peng->drop_peng($id))
        {
            redirect(base_url('dashboard/peng'));
        }
    }

    function peng_report()
    {
        $do = $this->input->get('do');
        if($do == 'down')
        {
            ob_start();
            $tanggal = array(
                    'tgl1' => $this->input->get('tgl1'),
                    'tgl2' => $this->input->get('tgl2'),
                    'bln1' => $this->input->get('bln1'),
                    'bln2' => $this->input->get('bln2'),
                    'thn1' => $this->input->get('thn1'),
                    'thn2' => $this->input->get('thn2')
                );
            $data['link'] = 'tgl1='.$this->input->get('tgl1').'&&bln1='.$this->input->get('bln1').'&&thn1='.$this->input->get('thn1').'&&tgl2='.$this->input->get('tgl2').'&&bln2='.$this->input->get('bln2').'&&thn2='.$this->input->get('thn2');
            $cek = $this->m_adm_peng->ceklaporan($tanggal);  
            $data = [ 'cek' => $cek ];
            $this->load->view('page/export/report_peng', $data);
            $html = ob_get_contents();
            ob_end_clean();

            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','Legal','en');
            $pdf->WriteHTML($html);
            $pdf->Output('LaporanPengumuman'.'.pdf', 'D');
        }
        else {
            $tanggal = array(
                    'tgl1' => $this->input->get('tgl1'),
                    'tgl2' => $this->input->get('tgl2'),
                    'bln1' => $this->input->get('bln1'),
                    'bln2' => $this->input->get('bln2'),
                    'thn1' => $this->input->get('thn1'),
                    'thn2' => $this->input->get('thn2')
                );
            $data['link'] = 'tgl1='.$this->input->get('tgl1').'&&bln1='.$this->input->get('bln1').'&&thn1='.$this->input->get('thn1').'&&tgl2='.$this->input->get('tgl2').'&&bln2='.$this->input->get('bln2').'&&thn2='.$this->input->get('thn2');
            $cek = $this->m_adm_peng->ceklaporan($tanggal);  
            echo json_encode($cek);
        }
    }










}
