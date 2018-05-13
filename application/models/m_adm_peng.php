<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_adm_peng extends CI_Model
{

    //DATATABLES
    var $table = 'm_peng'; 
    var $column_order = array(null, 'peng_name','peng_date','peng_detail'); 
    var $column_search = array('peng_name','peng_date'); 
    var $order = array('peng_id' => 'desc');  
 
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

    public function add_peng($array)
    {
        return $this->db->insert('m_peng', $array);
    }

    public function update_get_peng($id)
    {
        $this->db->where('peng_id',$id);
        return $this->db->get('m_peng')->result_array();
    }

    public function update_set_peng($array,$id)
    {
        $this->db->where('peng_id',$id);
        return $this->db->update('m_peng',$array); 
    }

    public function drop_peng($id)
    {
        return $this->db->delete('m_peng', array('peng_id'=>$id));
    }

    public function ceklaporan($tanggal)
    {
        $date1 = $tanggal['thn1'].'-'.$tanggal['bln1'].'-'.$tanggal['tgl1'];
        $date2 = $tanggal['thn2'].'-'.$tanggal['bln2'].'-'.$tanggal['tgl2'];
        $this->db->where('peng_date >=', $date1);
        $this->db->where('peng_date <=', $date2);
        return $this->db->get('m_peng')->result_array();
    }

}
?>