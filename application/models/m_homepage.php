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

   function daftar_psb($data){
   	$this->db->insert('m_registration', $data);
   }

   function struk($registration_code){
    $this->db->select('*');
    $this->db->from('m_registration');
    $this->db->where('registration_code', $registration_code);
    return $this->db->get();
  }

  function harga($registration_code){
   $this->db->select('*');
    $this->db->from('m_registration');
    $this->db->where('registration_code', $registration_code);
    return $this->db->get(); 
  }

  function getUserId($username){
    $this->db->select('*');
    $this->db->from('m_user');
    $this->db->where('user_name', $username);
    return $this->db->get();
  }

  function m_confirm($data){
    $this->db->insert('m_confirm', $data);
  }

  function m_pengumuman($username){
    $this->db->select('*');
    $this->db->from('m_confirm');
    $this->db->where('confirm_user_account', $username);
    return $this->db->get(); 
  }


}
?>