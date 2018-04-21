<?php
class m_homepage extends CI_Model{
  function __construct(){
    $this->load->database();
  }

  
  function cek_login($table,$where){		
	return $this->db->get_where($table,$where);
  }

  function daftar() {
    $user_name = $this->input->post('user_name');
    $user_email = $this->input->post('user_email');
    $user_password = $this->input->post('user_password');
    $data = array (
        'user_name' => $user_name,
        'user_email' => $user_email,
        'user_password'=> $user_password
    );  
    $this->db->insert('m_user',$data);
   }

}
?>