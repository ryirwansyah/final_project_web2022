<?php

class CategoryModel extends CI_Model {
    var $table = 'kategori'; //nama tabel dari database
    var $column_order = array(null, null, null, null, null); //field yang ada di table user
    var $column_search = array('id'); //field yang diizin untuk pencarian
    var $order = array('id' => 'DESC'); // default order

    public function __construct() {
        parent::__construct();
    }

    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('dihapus_pada', null);
        $i = 0;

        foreach ($this->column_search as $item) { // looping awal
            if($_POST['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST

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

    function get_datatables() {
        $this->_get_datatables_query();
        //$this->db->select('mst_menu.*, mst_menu.nama as nama_menu, ref_role.*, menu_role.id as id_menu_role')->from('menu_role')->join('mst_menu','mst_menu.id = menu_role.id_menu')->join('ref_role','ref_role.id = menu_role.id_ref_role')->where('menu_role.id_ref_role', $this->session->userdata('role'))->group_by('mst_menu.id')->order_by('mst_menu.id','DESC');
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

	public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        // $this->db->where('aktif','1'); 
        $this->db->where('dihapus_pada is NULL'); 
        return $this->db->get()->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function tampilkan($where = '')
    {
        $this->db->from($this->table);
        $this->db->where('dihapus_pada is NULL'); 
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->order_by('nama');
        return $this->db->get()->result();
    }
}