<?php
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BaseModel','base');
        $this->load->model('PostModel','posting');
    }

    public function index()
    {
        $data = array(
            'page_title'    => 'Halaman Utama',
            'uri_root'      => '/',
            'content'       => 'portal/home/index',
            'news_header'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(10)->get('posting')->result(),
            'recent_post'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(3)->get('posting')->result(),
            'news'          => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(4)->get('posting')->result(),
            'category'      => $this->base->tampilkan('kategori', ['aktif' => '1', 'dihapus_pada' => NULL]),
        );

        $this->load->view("portal/_templates/main", $data);
    }

    public function berita()
    {
        $data = array(
            'page_title'    => 'Halaman Berita',
            'uri_root'      => '/',
            'content'       => 'portal/home/berita',
            'news_header'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(10)->get('posting')->result(),
            'recent_post'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(3)->get('posting')->result(),
            'news'          => $this->db->select('posting.*, users.name')->join('users', 'posting.pengguna_id = users.id')->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(4)->get('posting')->result(),
            'category'      => $this->base->tampilkan('kategori', ['aktif' => '1', 'dihapus_pada' => NULL]),
        );

        $this->load->view("portal/_templates/main", $data);
    }

    public function detail($slug)
    {
        $data = array(
            'page_title'    => 'Halaman Utama',
            'uri_root'      => '/',
            'content'       => 'portal/home/detail',
            'news_header'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(10)->get('posting')->result(),
            'recent_post'   => $this->db->where(['status'=>'1', 'dihapus_pada' => NULL])->order_by('diterbitkan', 'desc')->limit(3)->get('posting')->result(),
            'news'          => $this->base->temukan('posting', ['slug' => $slug]),
            'news'          => $this->db->select('posting.*, users.name')->join('users', 'posting.pengguna_id = users.id')->where(['slug'=>$slug])->get('posting')->row(),
            'category'      => $this->base->tampilkan('kategori', ['aktif' => '1', 'dihapus_pada' => NULL]),
        );

        // header('Content-Type: application/json');
        // echo json_encode($data['news']);exit();
        $this->load->view("portal/_templates/main", $data);
    }
}
