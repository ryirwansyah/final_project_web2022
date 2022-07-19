<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller  {
    public function __construct(){
        parent::__construct();
        $this->load->model('PostModel','posting_model');
        $this->load->model('CategoryModel','kategori_model');
		$this->load->model('BaseModel','base');
		$this->load->library('Image', '');
		
        if($this->session->userdata('status') != "login" AND !$this->session->userdata('username')){
            redirect(base_url("login"));
        }
	}

    public function index()
    {

        $data = [
            'page_title'        => 'Post',
            'li_active'         => 'admin/post/index',
            'uri_segment'       => 'admin/post/',
            'content'           => 'admin/post/index',
            'script'            => 'admin/post/index-js',
        ];

        $this->load->view('admin/_templates/main', $data);
    }

    public function getData()
    {
        $list = $this->posting_model->get_datatables();
        $data = array();
        $no = $_POST['start']; 
        foreach ($list as $field) {

            if($field->status == '1'){
                $status_ditampilkan = '<a href="javascript:;" class="btn btn-link btn-change" data="'.$field->id.'"> di tampilkan </a>';
            }else{
                $status_ditampilkan = '<a href="javascript:;" class="btn btn-link btn-change" data="'.$field->id.'"> di sembunyikan </a>';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->judul;
            $row[] = truncate($field->konten, 100); 
            $row[] = $status_ditampilkan;
            $row[] = $field->nama_kategori;
            $row[] = ' 
                <a href="'.base_url('admin/post/edit/'.$field->id).'" class="btn btn-primary btn-sm tombol_ubah"><i class="ri-edit-line"></i></a>
                <a href="javascript:;" class="btn btn-danger btn-sm btn-delete" data-id="'.$field->id.'"><i class="ri-delete-bin-line"></i></a>
                ';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->posting_model->count_all(),
            "recordsFiltered" => $this->posting_model->count_filtered(),
            "data" => $data,
            "q" => $this->db->last_query()
        );
        echo json_encode($output);
    }

    public function create()
    {
		$data = [
            'page_title'   	=> 'Post',
            'li_active'    	=> 'admin/post/index',
            'uri_segment'  	=> 'admin/post/',
            'content'      	=> 'admin/post/create/index',
            'style'        	=> 'admin/post/create/index-css',
            'script'       	=> 'admin/post/create/index-js',
			'msg'			=> $this->session->userdata('msg'),
        ];

        $this->load->view('admin/_templates/main', $data);
    }

    public function edit($id)
    {
        $data = [
            'page_title'   	=> 'Post',
            'li_active'    	=> 'admin/post/index',
            'uri_segment'  	=> 'admin/post/',
            'content'      	=> 'admin/post/edit/index',
            'style'        	=> 'admin/post/edit/index-css',
            'script'       	=> 'admin/post/edit/index-js',
			'msg'			=> $this->session->userdata('msg'),
            'data'          => $this->base->temukan('posting', ['id'=>$id])
        ];
        $data['kategori'] = $this->posting_model->kategori($data['data']->id);
        $this->load->view('admin/_templates/main', $data);
    }


    public function store(){
        $this->form_validation->set_rules('judul','Nama tidak boleh kosong','required|trim|is_unique[posting.judul]');
        $this->form_validation->set_rules('konten','Deskripsi tidak boleh kodong','required');
        $this->form_validation->set_rules('kategori_id','Kategori tidak boleh kodong','required');
        $this->form_validation->set_message('required', 'Anda melewatkan input, {field}!');
        $this->form_validation->set_message('is_unique', 'Data sudah terdaftar');

        if($this->form_validation->run() != false){
            if($_FILES['file']['size'] > 2000000){
                $this->session->set_flashdata('msg', 'Ukuran Foto terlalu besar');
                redirect(base_url('admin/post/create'),'refresh');
            }else{
                $data = array(
                        'judul'       => $this->input->post('judul'),
                        'konten'      => $this->input->post('konten'),
                        'slug'        => slugify($this->input->post('judul')),
                        'status'      => '0', 
                        'dibuat_pada' => date("Y-m-d H:i:s"),
                        'diterbitkan' => $this->input->post('tanggal_publish'),
                        'diubah_pada' => date("Y-m-d H:i:s"),
                        'pengguna_id' => $this->session->userdata('id_login'),
                        'status'       => '1'
                    );

                $tambah_posting = $this->posting_model->tambah($data);
                $id_posting = $this->db->insert_id();

                // tambah kategori
                $data_kategori = [
                    'kategori_id'  => $this->input->post('kategori_id'),
                    'posting_id'   => $id_posting,
                ];

                //Simpan data kategori posting
                $this->base->tambah('kategori_posting', $data_kategori);

                if($tambah_posting){

					//Upload file
                    $config=[
                        'upload_path'   => $this->posting_model->mdir($id_posting),
                        'file_name'     => $id_posting,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        'max_size'      => 20000,
                    ];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')){
                        $this->session->set_flashdata('msg', 'Gagal Menembahkan');
                        redirect(base_url('admin/post/create'),'refresh');
                    }else{
                        $this->image
                            ->load($this->upload->data('full_path'))
                            ->resize_crop(800, 533)
                            ->set_jpeg_quality(100)
                            ->save_pa($prepend = "", "-thumb", FALSE);
                        $this->session->set_flashdata('msg', 'Data Berhasil Diinputkan');
                        redirect(base_url('admin/post'),'refresh');
                    }

                }
            }
        }else{
			$this->session->set_flashdata('msg', 'Periksa kembali inputan anda');
            redirect(base_url('admin/post/create'),'refresh');   
        }

    }

    public function update($id)
    {
        $json = array();
        $this->form_validation->set_rules('judul','Nama tidak boleh kosong','required|trim');
        $this->form_validation->set_rules('konten','Deskripsi tidak boleh kodong','required');
        $this->form_validation->set_rules('kategori_id','Kategori tidak boleh kodong','required');
        $this->form_validation->set_message('required', 'Anda melewatkan input, {field}!');
        $this->form_validation->set_message('is_unique', 'Data sudah terdaftar');

        if($this->form_validation->run() != false){
            if($_FILES['file']['size'] > 0 AND !empty($_FILES['file']['name'])){
                if($_FILES['file']['size'] > 2000000){
                    $this->session->set_flashdata('pesan', 'Ukuran Foto terlalu besar');
                    redirect(base_url('admin/post/edit/'.$id), 'refresh');
                }else{
                    $data = array(
                            'judul'       => $this->input->post('judul'),
                            'konten'      => $this->input->post('konten'),
                            'slug'        => slugify($this->input->post('judul')),
                            'diubah_pada' => date("Y-m-d H:i:s")
                        ); 
                    $ubah_posting = $this->posting_model->ubah($data, $id);
    
                    // tambah kategori
                    $data_kategori = [
                        'kategori_id'  => $this->input->post('kategori_id'),
                        'posting_id'   => $id,
                    ];

                    //Simpan data kategori posting
                    $this->base->ubah('kategori_posting', $data_kategori, ['posting_id'   => $id]);
    
                    if($ubah_posting){
                        //Hapus Foto
                        $this->posting_model->remdir($id);
                        //Upload file
                        $config=[
                            'upload_path'   => $this->posting_model->mdir($id),
                            'allowed_types' => 'gif|jpg|png|jpeg',
                            'file_name'     => $id,
                            'max_size'      => 20000,
                        ];
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('file')){
                            $this->session->set_flashdata('pesan', 'Gagal Menembahkan');
                            redirect(base_url('admin/post/edit/'.$id),'refresh');
                        }else{
                            $this->image
                                ->load($this->upload->data('full_path'))
                                ->resize_crop(800, 533)
                                ->set_jpeg_quality(100)
                                ->save_pa($prepend = "", "-thumb", FALSE);
                            $this->session->set_flashdata('pesan', 'Data Berhasil Diperbarui');
                            redirect(base_url('admin/post/'),'refresh');
                        }
                    }
                }
            }else{
                $data = array(
                        'judul'       => $this->input->post('judul'),
                        'konten'      => $this->input->post('konten'),
                        'slug'        => slugify($this->input->post('judul')),
                        'diubah_pada' => date("Y-m-d H:i:s")
                    ); 
                $ubah_posting = $this->posting_model->ubah($data, $id);

                // tambah kategori
                $data_kategori = [
                    'kategori_id'  => $this->input->post('kategori_id'),
                    'posting_id'   => $id,
                ];
                //Simpan data kategori posting
                $this->base->ubah('kategori_posting', $data_kategori, ['posting_id'   => $id]);

                if($ubah_posting){
                    $this->session->set_flashdata('pesan', 'Data Berhasil Diperbarui');
					redirect(base_url('admin/post/'),'refresh');
                }
            }
        }else{
			redirect(base_url('admin/post/'),'refresh');  
        }
    }

    public function hapus()
    {
        $id =  $this->input->post('id');
        $soft_delete = $this->posting_model->softDelete(['dihapus_pada' => date("Y-m-d H:i:s")], $id);
        if($soft_delete){
            $this->posting_model->remdir($id."/"."crop/");
            $this->posting_model->remdir($id);
            $response = ['status' => true, 'mssg' => 'Berhasil menghapus data'];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
        
    }

    public function ubahStatus()
    {
        $get_data = $this->posting_model->temukan($this->input->post('id'));
        $status = '0';
        $diterbitkan = NULL;
        if($get_data->status == '0'){
            $status = '1';
            $diterbitkan = date("Y-m-d H:i:s");
        }
        $ubah_status = $this->posting_model->ubah(['status' => $status, 'diterbitkan' => $diterbitkan], $this->input->post('id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($ubah_status));
    }

    public function getCategory()
    {
        $get_kategori = $this->kategori_model->tampilkan(['aktif' => '1']);
        $this->output->set_content_type('application/json')->set_output(json_encode($get_kategori));
    }

    

}
