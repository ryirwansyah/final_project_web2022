<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MuridModel', 'query');
    }

    public function index()
    {

        $data = [
            'page_title'        => 'Tambah Murid',
            'li_active'         => 'admin/murid/index',
            'uri_segment'       => 'admin/murid/index',
            'content'           => 'admin/murid/home',
            'script'            => 'admin/murid/home_js',
        ];

        $this->load->view('admin/_templates/main', $data);
    }

    public function form_tambah()
    {
        $data = [
            'page_title'        => 'Tambah Murid',
            'li_active'         => 'referensi/murid/index',
            'uri_segment'       => 'referensi/murid/index',
            'content'           => 'admin/murid/tambah',
            'kelas'             => $this->db->select('*')->get('ref_kelas')->result()
        ];
        $this->load->view('admin/_templates/main', $data);
    }

    public function form_ubah($id = null)
    {
        $data = [
            'page_title'        => 'Ubah Murid',
            'li_active'         => 'referensi/murid/index',
            'uri_segment'       => 'referensi/murid/index',
            'content'           => 'admin/murid/ubah',
            'kelas'             => $this->db->select('*')->get('ref_kelas')->result(),
            'data'              => $this->db->select('*')->where('id', $id)->get('murid')->row()
        ];
        $this->load->view('admin/_templates/main', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "Kolom dengan tanda * harus diisi.");
            redirect('admin/murid/index/');
        } else {
            $kelas = $this->db->select('*')->where('id', $this->input->post('id_kelas', true))->get('ref_kelas')->row();

            $data_insert = [
                'nis' => str_replace(" ", "", trim($this->input->post('nis', true))),
                'nama' => $this->input->post('nama', true),
                'no_hp' => $this->input->post('no_hp', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'id_kelas' => $kelas->id,
                'kelas' => $kelas->tingkatan . $kelas->nama,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('murid', $data_insert);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('failed', 'Gagal menambahkan data.');
            }
        }

        redirect('admin/murid/index/');
    }

    public function update()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $id = $this->input->post('id', true);

        if (!$id) {
            $this->session->set_flashdata('failed', 'Data gagal diperbaharui.');
            redirect('admin/murid/index/');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('failed', "Kolom dengan tanda * harus diisi.");
                redirect('admin/murid/index/');
            } else {
                $kelas = $this->db->select('*')->where('id', $this->input->post('id_kelas', true))->get('ref_kelas')->row();

                $data_insert = [
                    'nis' => str_replace(" ", "", trim($this->input->post('nis', true))),
                    'nama' => $this->input->post('nama', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'tempat_lahir' => $this->input->post('tempat_lahir', true),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'alamat' => $this->input->post('alamat', true),
                    'id_kelas' => $kelas->id,
                    'kelas' => $kelas->tingkatan . $kelas->nama,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $this->db->where('id', $id)->update('murid', $data_insert);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Berhasil diperbarui');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal memperbarui data.');
                }
            }
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui.');
            redirect('admin/murid/index/');
        }
    }

    function hapus()
    {
        $id = $this->input->get('id');
        $this->db->where(['id' => $id], 'murid')->update('murid', ['deleted_at' => date('Y-m-d h:i:s')]);
        if ($this->db->affected_rows() > 0) {
            $response = ['status' => true, 'pesan' => 'Berhasil menghapus data'];
        } else {
            $response = ['status' => false, 'pesan' => 'Gagal menghapus data'];
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
            $row[] = $field->nama . '<br><small class="text-info">(NIS: ' . $field->nis . '), ' . $field->jenis_kelamin . '</small>';
            $row[] = $field->tempat_lahir . ', ' . $field->tanggal_lahir;
            $row[] = $field->kelas;
            $row[] = $field->no_hp;
            $row[] = $field->alamat;

            $btn = '';
            $btn .= '<a href="' . base_url('admin/murid/form_ubah/' . $field->id) . '" class="btn btn-sm btn-warning" type="button"><i class="fa fa-pencil"></i> Ubah</a>&nbsp;';
            $btn .= '<button class="btn btn-sm btn-danger" type="button" data-id="' . $field->id . '" onclick="hapus(this)"> <i class="si si-trash"></i> Hapus</button>&nbsp;';

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
}
