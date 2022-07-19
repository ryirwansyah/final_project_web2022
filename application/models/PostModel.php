<?php
class PostModel extends CI_Model {
    var $lokasi        = "assets/uploads/images/posting/";
	var $table         = 'posting'; //nama tabel dari database
    var $column_order  = array(null,'posting.id', 'posting.judul', 'posting.status', 'kategori.nama');//field yang ada di table user
    var $column_search = array('posting.id', 'posting.judul', 'posting.status', 'kategori.nama');//field yang diizin untuk pencarian
    var $order         = array('posting.id' => 'DESC'); // default order 
    
	public function __construct() {
		$this->load->database();
	}

	//kebutuhabn server side
	private function _get_datatables_query(){
        $this->db->select('posting.*, kategori.nama as nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori_posting', 'posting.id = kategori_posting.posting_id', 'left');
        $this->db->join('kategori', 'kategori.id = kategori_posting.kategori_id', 'left');
        // $this->db->where('kategori.tipe','informasi');
        $this->db->where('posting.dihapus_pada is NULL'); 
        
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->join('kategori_posting', 'posting.id = kategori_posting.posting_id');
        $this->db->join('kategori', 'kategori.id = kategori_posting.kategori_id');
        $this->db->where('posting.dihapus_pada is NULL');
        $this->db->where('kategori.tipe','informasi');
        return $this->db->count_all_results();
    }
    // Batas kebutuhan datatable sever side
    public function softDelete($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function temukan($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        // $this->db->where('aktif','1'); 
        $this->db->where('posting.dihapus_pada is NULL'); 
        return $this->db->get()->row();
    }

	public function tampilkan($where = '')
    {
		$this->db->select('posting.*');
        $this->db->from($this->table);
		$this->db->join('kategori_posting', 'posting.id = kategori_posting.posting_id');
        $this->db->join('kategori', 'kategori.id = kategori_posting.kategori_id');
        $this->db->where('posting.dihapus_pada is NULL'); 
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->get()->result();
    }

    public function kategori($id)
    {
        $this->db->select('kategori.id');
        $this->db->from('kategori_posting');
        $this->db->join('posting', 'posting.id = kategori_posting.posting_id', 'RIGHT');
        $this->db->join('kategori', 'kategori.id = kategori_posting.kategori_id', 'RIGHT');
        $this->db->where('posting.id', $id);
        $this->db->where('posting.dihapus_pada is NULL'); 
        $this->db->where('kategori.dihapus_pada is NULL'); 
        return $this->db->get()->row();
    }

    public function tag($id)
    {
        $this->db->select('tag.id');
        $this->db->from('tag');
        $this->db->join('tag_posting', 'tag.id = tag_posting.tag_id', 'RIGHT');
        $this->db->join('posting', 'posting.id = tag_posting.posting_id', 'RIGHT');
        $this->db->where('posting.id', $id);
        $this->db->where('posting.dihapus_pada is NULL'); 
        $this->db->where('tag.dihapus_pada is NULL'); 
        return $this->db->get()->result();
    }

    public function ubah($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    //upload file 
    public function mdir($folder = "") {
        $structure = $this->lokasi.$folder;
        if (!file_exists($structure)) {
            @mkdir($structure, 0777, true);
            @fwrite(fopen($structure . "/index.html", "w"), "Directory access is forbidden.");
        }
        return $structure;
    }
    public function remdir($folder = '') {
        $path  = $this->lokasi.$folder;
        $files = @glob($path . '/*');
        foreach ($files as $file) {
            @is_dir($file) ? remove_dir($file) : @unlink($file);
        }
        @rmdir($path);
        return $path;
    }
}
