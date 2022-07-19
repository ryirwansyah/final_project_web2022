<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = [
            'page_title'        => 'Dashboard',
            'detail_page_title' => 'List Data',
            'li_active'         => 'dashboard',
            'uri_segment'       => 'backend/admin/dashboard/',
            'content'           => 'admin/home/index',
        ];

		$this->load->view('admin/_templates/main', $data);
	}

}
