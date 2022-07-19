<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('admin/_templates/head');
$this->load->view('admin/_templates/header');
$this->load->view('admin/_templates/sidebars/sidebar');

if(is_file('./application/views/'.@$content.'.php')){
    $this->load->view($content);
} else{
    $this->load->view('admin/_templates/blank');
}

$this->load->view('admin/_templates/footer');
