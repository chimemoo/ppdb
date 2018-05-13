<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_adm_payment extends CI_Model
{

    //DATATABLES
    var $table = 'm_confirm'; 
    var $column_order = array(null, 'confirm_registration_code','confirm_user_account','confirm_admin_account','confirm_price','confirm_status'); 
    var $column_search = array('confirm_registration_code','confirm_user_account','confirm_admin_account','confirm_price','confirm_status'); 
    var $order = array('confirm_id' => 'desc');  
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    //DATATABLES

    public function drop_payment($id)
    {
        return $this->db->delete('m_confirm', array('confirm_id'=>$id));
    }

    public function data_reg($code)
    {
        $this->db->where('registration_code',$code);
        return $this->db->get('m_registration');
    }

    public function activate_reg($code,$status)
    {
        $data = ['registration_status' => $status];
        $this->db->where('registration_code',$code);
        return $this->db->update('m_registration', $data);
    }

    public function activate_conf($id,$status)
    {
        $data = ['confirm_status' => $status];
        $this->db->where('confirm_id',$id);
        return $this->db->update('m_confirm', $data);
    }

    public function send_announce($data)
    {
        return $this->db->insert('m_notif', $data);
    }

    public function detail_payment($id)
    {
        $this->db->where('confirm_id',$id);
        return $this->db->get('m_confirm')->result_array();
    }
}
?>