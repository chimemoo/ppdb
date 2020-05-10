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
    return $this->db->get()->result_array();
  }

  function m_confirm($data){
    $this->db->insert('m_confirm', $data);
  }

  function m_pengumuman($user_id){
    return $this->db->query("SELECT * FROM m_confirm INNER JOIN m_registration ON m_confirm.confirm_registration_code = m_registration.registration_code WHERE m_registration.registration_user_id = '$user_id'");
  }

  function m_messages($registration_code){
     return $this->db->select('*')->from('m_notif')->where('notif_reg_id', $registration_code)->get();
  }

  function m_showNews(){
     return $this->db->select('*')->from('m_news')->get();
  }

  function m_showNewsLimit($limitNews){
     return $this->db->select('*')->from('m_news')->limit($limitNews)->get();
  }

  function m_showEvent(){
    return $this->db->select('*')->from('m_event')->get();
  }

  function m_showEventLimit($limitEvent){
    return $this->db->select('*')->from('m_event')->limit($limitEvent)->get();
  }

  function m_detailEvent($event_id){
    return $this->db->select('*')->from('m_event')->where('event_id', $event_id)->get();
  }

  function m_detailNews($news_id){
    return $this->db->select('*')->from('m_news')->where('news_id', $news_id)->get();
  }

  function m_GeneralPeng($limitPengumuman){
    return $this->db->select('*')->from('m_peng')->limit($limitPengumuman)->get();
  }

  function m_loginGetId($uname)
  {
    $this->db->where('user_name');
    return $this->db->get('m_user')->result_array();
  }

  function m_notifStatus($user_id)
  {
    return $this->db->query("SELECT * FROM m_notif WHERE notif_user_id='$user_id' AND notif_read = '0'")->num_rows();
  }

  function m_notifcStatus($user_id)
  {
    return $this->db->query("UPDATE `m_notif` SET `notif_read`='1' WHERE notif_user_id='$user_id'");
  }

}
?>