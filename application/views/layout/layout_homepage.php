<?php

    $this->load->view('layout/homepage/header');
    $this->load->view('page/homepage/homepage_home');
    $this->load->view($content);
    $this->load->view('layout/homepage/footer');

?>