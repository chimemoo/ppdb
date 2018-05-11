<?php

function kode_daftar()
{
    $date = date("mdY");
    $CI=& get_instance();
    $chek=$CI->db->query("select registration_code from m_registration order by registration_code DESC");
    if($chek->num_rows()>0){
        $chek=$chek->row_array();
        $lastKode=$chek['registration_code'];
        $ambil=  substr($lastKode, 3)+1;
        $newCode=  "PSB".sprintf("%01s",$ambil)."-".$date;
        return $newCode;
    }
    else{
        return 'PSB1'."-".$date;
    }
}

?>