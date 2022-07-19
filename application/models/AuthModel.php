<?php 
class AuthModel extends CI_Model{
   private $table = 'users';
   var $CI = NULL;
   
	function find($where){		
		return $this->db->get_where($this->table,$where);
   }
   
	function is_logged_in(){
	  // get CI's object
      $this->CI =& get_instance();
      if($this->CI->session->userdata('status') == '' && $this->CI->session->userdata('username')=='')
      {
      	//posisi dimana user sedang login
         return true;
      }
   }

   // untuk validasi di setiap halaman yang mengharuskan authentikasi
   function restrict(){
      if($this->is_logged_in() == false)
      {
         redirect('member/');
      }
   }
}
