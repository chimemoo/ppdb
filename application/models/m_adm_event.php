<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_adm_event extends CI_Model
{
	//DATATABLES
    var $table = 'm_event'; 
    var $column_order = array(null, 'event_name','event_date','event_detail'); 
    var $column_search = array('event_name','event_date'); 
    var $order = array('event_id' => 'desc');  
 
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

    public function add_event($array)
    {
        return $this->db->insert('m_event', $array);
    }

    public function drop_event($id)
    {
        return $this->db->delete('m_event', array('event_id'=>$id));
    }

    public function update_get_event($id)
    {
        $this->db->where('event_id',$id);
        return $this->db->get('m_event')->result_array();
    }

    public function update_set_event($array,$id)
    {
        $this->db->where('event_id',$id);
        return $this->db->update('m_event',$array); 
    }

    public function ceklaporan($tanggal)
    {
        $date1 = $tanggal['thn1'].'-'.$tanggal['bln1'].'-'.$tanggal['tgl1'];
        $date2 = $tanggal['thn2'].'-'.$tanggal['bln2'].'-'.$tanggal['tgl2'];
        $this->db->where('event_date >=', $date1);
        $this->db->where('event_date <=', $date2);
        return $this->db->get('m_event')->result_array();
    }

}
?>