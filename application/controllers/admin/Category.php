<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel', 'query');
    }

    public function index()
    {

        $data = [
            'page_title'        => 'Category',
            'li_active'         => 'admin/category/index',
            'uri_segment'       => 'admin/category/',
            'content'           => 'admin/category/index',
            'script'            => 'admin/category/index-js',
        ];

        $this->load->view('admin/_templates/main', $data);
    }

    public function store()
    {
		$json = array();
		$id = $this->input->post('id');

		
		if($id == null){
			$this->form_validation->set_rules('nama','Nama','required|is_unique[kategori.nama]',
				array(
					'required'      => 'Nama tidak boleh kosong %s.',
					'is_unique'     => '%s kategori sudah digunakan.'
				)
			);
		}
        // $this->form_validation->set_rules('deskripsi','Deskripsi tidak boleh kodong','required');
        $this->form_validation->set_rules('aktif','Status Ditampilkan tidak boleh kodong','required');
        $this->form_validation->set_message('required', 'Anda melewatkan input, {field}!');
        // $this->form_validation->set_message('is_unique', 'Data sudah terdaftar');

        if($this->form_validation->run() != false){
            $data = array(
                    'nama'        => $this->input->post('nama'),
                    'slug'        => slugify($this->input->post('nama')),
                    'deskripsi'   => $this->input->post('deskripsi'),
                    'aktif'       => $this->input->post('aktif'), 
                    'tipe'        => 'informasi', 
                    'dibuat_pada' => date("Y-m-d H:i:s"),
                    'diubah_pada' => date("Y-m-d H:i:s")
                ); 

			if($id == null){
				$proses = $this->query->add($data);
			}else{
				$proses = $this->query->update($data, $id);
			}

            if($proses){
                $json = array('status' => true, 'data' => $proses, 'id' => $this->db->insert_id());
                $this->output->set_content_type('application/json')->set_output(json_encode($json));
            }else{
                $json = array('status' => false, 'message' => 'Terjadi kesalahan');
                $this->output->set_content_type('application/json')->set_output(json_encode($json));
            }
        }else{
            $json = array(
                'status'    => false,
                'nama'      => form_error('nama', '<p class="text-danger">', '</p>'),
                // 'deskripsi' => form_error('deskripsi', '<p class="text-danger">', '</p>'),
                'aktif'     => form_error('aktif', '<p class="text-danger">', '</p>'),
            );
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
        }
    }

    function destroy()
    {
        $id = $this->input->post('id');
        $this->db->where(['id' => $id], 'kategori')->update('kategori', ['dihapus_pada' => date('Y-m-d h:i:s')]);
        if ($this->db->affected_rows() > 0) {
            $response = ['status' => true, 'mssg' => 'Berhasil menghapus data'];
        } else {
            $response = ['status' => false, 'mssg' => 'Gagal menghapus data'];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function get_data_table()
    {
        $list = $this->query->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;

			if($field->aktif == '1'){
                $status_ditampilkan = '<a href="javascript:;" class="btn btn-link btn-change" data="'.$field->id.'"> di tampilkan </a>';
            }else{
                $status_ditampilkan = '<a href="javascript:;" class="btn btn-link btn-change" data="'.$field->id.'"> di sembunyikan </a>';
            }

            $row[] = $field->nama;
            $row[] = $field->deskripsi;
            $row[] = $status_ditampilkan;

            $btn = '';
            $btn .= '<button class="btn btn-sm btn-info btn-edit" type="button" data-id="' . $field->id . '"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
            $btn .= '<button class="btn btn-sm btn-danger btn-delete" type="button" data-id="' . $field->id . '"> <i class="si si-trash"></i> Hapus</button>&nbsp;';

            $row[] = $btn;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->query->count_all(),
            "recordsFiltered" => $this->query->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	public function changeStatus()
    {
        $get_data = $this->query->find($this->input->post('id'));
        $status = '0';
        if($get_data->aktif == '0'){
            $status = '1';
        }
        $ubah_status = $this->query->update(['aktif' => $status], $this->input->post('id'));
        $this->output->set_content_type('application/json')->set_output(json_encode($ubah_status));
    }
}
