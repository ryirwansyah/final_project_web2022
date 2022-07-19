<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('portal/_templates/head');
$this->load->view('portal/_templates/header');
$this->load->view('portal/_templates/sidebars/sidebar');

if(is_file('./application/views/'.@$content.'.php')){
    $this->load->view($content);
} else{
    $this->load->view('portal/_templates/blank');
}

$this->load->view('portal/_templates/footer');
