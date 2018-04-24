<?php

    $this->load->view('layout/admin/header');
    if($title != "Admin Dashboard - Login")
    {
    	$this->load->view('layout/admin/navigation');
    }
    $this->load->view($content);
    $this->load->view('layout/admin/footer');

?>