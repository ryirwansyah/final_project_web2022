<?php
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('AuthModel','auth');
    }
    
    public function index()
    {
        $data = array(
                'title'    => 'Halaman Login',
                'uri_root' => 'login/',
            );
        if($this->auth->is_logged_in() == true){
            $this->load->view("login/index",$data);
        }else{
            redirect(base_url("admin/home/"));       
        }
        
    }

    public function find(){
        $json = array();
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password','required');
        $this->form_validation->set_message('required', 'Anda melewatka input input {field}!');

        if($this->form_validation->run() != false){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $uname = array('username' => $username);
            $cek_user = $this->auth->find($uname)->num_rows();
            if ($cek_user > 0) {
                $upass = array('password' => sha1($password));
                $cek_upass = $this->auth->find($upass)->num_rows();
                if ($cek_upass > 0) {
                    $where = array(
                        'username' => $username,
                        'password' => sha1($password),
                        );
                    $cek = $this->auth->find($where)->num_rows();
                    $cekdua = $this->auth->find($where);
                    if($cek == 1){
                            $data_session = array(
                                'username' =>  $cekdua->row()->username,
                                'id_login' =>  $cekdua->row()->id,
                                'status'   => "login",
                                );
                            $this->session->set_userdata($data_session);
                            $data = $this->session->userdata;
                            $json = array(
                                    'status'    => TRUE,
                                    'data'      => base_url().'admin/home',
                                );
                    }else{
                        $json = array(
                                'status'    => FALSE,
                                'username'  => '',
                                'password'  => '',
                                'status'    => '<p class="mt-3 text-danger">Anda gagal login</p>'
                            );
                    }
                }else{
                    $json = array(
                            'status'    => FALSE,
                            'username'  => '',
                            'password'  => '<p class="mt-3 text-danger">Password salah</p>',
                            'status'    => ''
                        );
                }
            }else{
                $json = array(
                        'status'    => FALSE,
                        'username'  => '<p class="mt-3 text-danger">Username tidak terdaftar</p>',
                        'password'  => '',
                        'status'    => ''
                    );
            }
        }else{
            $json = array(
                    'status'    => FALSE,
                    'username'  => form_error('username', '<p class="mt-3 text-danger">', '</p>'),
                    'password'  => form_error('password', '<p class="mt-3 text-danger">', '</p>')
                );
        }
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
                  
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }

}
