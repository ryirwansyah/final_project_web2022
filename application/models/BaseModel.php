<?php
class BaseModel extends CI_Model {
    
	public function __construct() {
		$this->load->database();
	}

    public function tambah($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function ubah($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function tampilkan($table, $where = '')
    {
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->get($table)->result();
    }

    public function temukan($table, $where = '')
    {
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->get($table)->row();
    }

    public function joinDuaData($select, $table1, $table2, $prifk, $where)
    {
        $this->db->select($select);
        $this->db->join($table2, $prifk);
        $this->db->from($table1);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
