<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('image')) {
    function image($post_id = null, $image_type = '')
    {
        $image = glob("assets/uploads/images/posting/{$post_id}/*-{$image_type}.*");
        if($image_type == ''){
            $image = glob("assets/uploads/images/posting/{$post_id}/{$post_id}.*");
        }
        if (!$image) {
            $image = glob("assets/uploads/images/posting/*-thumb.*");
        }
        return base_url($image[0]);
    }
}

if (!function_exists('image_thumb')) {
    function image_thumb($post_id = null, $image_type = '')
    {
        $image = glob("assets/uploads/images/posting/{$post_id}/crop/*.*");
        if($image_type == ''){
            $image = glob("assets/uploads/images/posting/{$post_id}/*.*");
        }
        if (!$image) {
            $image = glob("assets/uploads/images/posting/*.*");
        }
		return base_url($image[0]);
    }
}

if (!function_exists('image_slider')) {
    function image_slider($post_id = null, $image_type = '')
    {
        $image = glob("assets/uploads/images/slider/{$post_id}/crop/*.*");
        if($image_type == ''){
            $image = glob("assets/uploads/images/slider/{$post_id}/*.*");
        }
        if (!$image) {
            $image = glob("assets/uploads/images/slider/*.*");
        }
		return base_url($image[0]);
    }
}

if (!function_exists('image_galeri')) {
    function image_galeri($post_id = null, $image_type = '')
    {
        $image = glob("assets/uploads/images/galeri/{$post_id}/crop/*.*");
        if($image_type == ''){
            $image = glob("assets/uploads/images/galeri/{$post_id}/*.*");
        }
        if (!$image) {
            $image = glob("assets/uploads/images/galeri/*.*");
        }
		return base_url($image[0]);
    }
}

if (!function_exists('image_album')) {
    function image_album($album_id = null, $image_type = '')
    {
		$CI = &get_instance();
        $get_data = @$CI->db->get_where('galeri', ['album_id' => $album_id])->row();
		if(isset($get_data->id)){
			$image = glob("assets/uploads/images/galeri/{$get_data->id}/crop/*.*");
			if($image_type == ''){
				$image = glob("assets/uploads/images/galeri/{$get_data->id}/*.*");
			}
			if (!$image) {
				$image = glob("assets/uploads/images/galeri/*.*");
			}
			
			return base_url($image[0]);
		}else{
			$image = glob("assets/uploads/images/galeri/*.*");
			
			return base_url($image[0]);
		}
        
    }
}

if (!function_exists('image_portofolio')) {
    function image_portofolio($post_id = null, $image_type = '')
    {
        $image = glob("assets/uploads/images/portofolio/{$post_id}/*-{$image_type}.*");
        if($image_type == ''){
            $image = glob("assets/uploads/images/portofolio/{$post_id}/{$post_id}.*");
        }
        if (!$image) {
            $image = glob("assets/uploads/images/portofolio/*-thumb.*");
        }
        return base_url($image[0]);
    }
}

if (!function_exists('date_formatr')) {
    function date_formatr($tanggal)
    {
        $tanggal = date('Y-m-d', strtotime($tanggal));
        

		// $myDateTime = DateTime::createFromFormat('Y-m-d', $tanggal);
		// $formattedweddingdate = $myDateTime->format('Y-m-d');
		return $tanggal;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal)
    {
        $tanggal = date('d-m-Y', strtotime($tanggal));
        $bulan = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[2];
    }
}

if (!function_exists('ambil_hari')) {
    function ambil_hari($tanggal)
    {
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        );
        return $dayList[$day];
    }
}
if (!function_exists('getmail')) {
    function getmail($mail)
    {

        return $dayList[$day];
    }
}

if (!function_exists('penyebut')) {
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
}

if (!function_exists('terbilang')) {
    function terbilang($niali)
    {
        if ($niali < 0) {
            $hasil = "minus " . trim(penyebut($niali));
        } else {
            $hasil = trim(penyebut($niali));
        }
        return $hasil;
    }
}

if (!function_exists('rupiah')) {
    function rupiah($niali)
    {
        $hasil_rupiah = "Rp " . number_format($niali, 2, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('jm_tanggal')) {
    function jm_tanggal($tanggal, $tambah)
    {
        $nilai = date('d-m-Y', strtotime('+' . $tambah . 'days', strtotime($tanggal))); //operasi penjumlahan tanggal
        return $nilai;
    }
}

if (!function_exists('get_metsos')) {
    function get_metsos($key)
    {
        $CI = &get_instance();
        $t = $CI->db->get_where('settings', array('key' => $key))->row();
        return $t->value;
    }
}
function konfirm($key){
    $CI = &get_instance();
    $t = $CI->db->query("SELECT *FROM setting WHERE tittle = '" . $key . "' ")->row();
    $tampil = $t->content;
    $tampil = explode('/', $tampil);
    $ukuran = array($tampil[0], $tampil[1], $tampil[2], $tampil[3]);
    return $ukuran;
}
if (!function_exists('truncate')) {
    function truncate($html, $length = 100, $ending = '...')
    {
        if (!is_string($html)) {
            trigger_error('Function \'truncate_html\' expects argument 1 to be an string', E_USER_ERROR);
            return false;
        }

        if (mb_strlen(strip_tags($html)) <= $length) {
            return $html;
        }
        $total = mb_strlen($ending);
        $open_tags = array();
        $return = '';
        $finished = false;
        $final_segment = '';
        $self_closing_elements = array(
            'area', 'base', 'br', 'col', 'frame', 'hr', 'img', 'input', 'link', 'meta', 'param',
        );
        $inline_containers = array(
            'a', 'b', 'abbr', 'cite', 'em', 'i', 'kbd', 'span', 'strong', 'sub', 'sup',
        );
        while (!$finished) {
            if (preg_match('/^<(\w+)[^>]*>/', $html, $matches)) {
                if (!in_array($matches[1], $self_closing_elements)) {
                    $open_tags[] = $matches[1];
                }
                $html = substr_replace($html, '', 0, strlen($matches[0]));
                $return .= $matches[0];
            } elseif (preg_match('/^<\/(\w+)>/', $html, $matches)) {
                $key = array_search($matches[1], $open_tags);
                if ($key !== false) {
                    unset($open_tags[$key]);
                }
                $html = substr_replace($html, '', 0, strlen($matches[0]));
                $return .= $matches[0];
            } else {
                if (preg_match('/^([^<]+)(<\/?(\w+)[^>]*>)?/', $html, $matches)) {
                    $segment = $matches[1];
                    $segment_length = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $segment));
                    if ($segment_length + $total > $length) {
                        $remainder = $length - $total;
                        $entities_length = 0;
                        if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $segment, $entities, PREG_OFFSET_CAPTURE)) {
                            foreach ($entities[0] as $entity) {
                                if ($entity[1] + 1 - $entities_length <= $remainder) {
                                    $remainder--;
                                    $entities_length += mb_strlen($entity[0]);
                                } else {
                                    break;
                                }
                            }
                        }
                        $finished = true;
                        $final_segment = mb_substr($segment, 0, $remainder + $entities_length);
                    } else {
                        $return .= $segment;
                        $total += $segment_length;
                        $html = substr_replace($html, '', 0, strlen($segment));
                    }
                } else {
                    $finshed = true;
                }
            }
        }
        if (strpos($final_segment, ' ') === false && preg_match('/<(\w+)[^>]*>$/', $return)) {
            $return = preg_replace('/<(\w+)[^>]*>$/', '', $return);
            $key = array_search($matches[3], $open_tags);
            if ($key !== false) {
                unset($open_tags[$key]);
            }
        } else {
            $return .= mb_substr($final_segment, 0, mb_strrpos($final_segment, ' '));
        }
        $return = trim($return);
        $len = strlen($return);
        $last_char = substr($return, $len - 1, 1);
        if (!preg_match('/[a-zA-Z0-9]/', $last_char)) {
            $return = substr_replace($return, '', $len - 1, 1);
        }
        $closing_tags = array_reverse($open_tags);
        $ending_added = false;
        foreach ($closing_tags as $tag) {
            if (!in_array($tag, $inline_containers) && !$ending_added) {
                $return .= $ending;
                $ending_added = true;
            }
            $return .= '</' . $tag . '>';
        }
        return $return;
    }
}
function hitung_umur($birthday){
    // Convert Ke Date Time
    $biday = new DateTime($birthday);
    $today = new DateTime();
    
    $diff = $today->diff($biday);
    return $diff->y;
}

if ( ! function_exists('redirect_back')){
    function redirect_back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }else{
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}

if ( ! function_exists('add_date')){
    function add_date($date,$add){
        $uploadDate = $date;
        $date = strtotime($uploadDate);
        $date = strtotime("+".$add." day", $date);
        $date = date('Y-m-d', $date);
        return $date;
    }
}

if ( ! function_exists('get_random_password'))
{
    function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }
                                
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
      return $password;
    }

}

if ( ! function_exists('slugify'))
{
    function slugify($string)
    {
        // Get an instance of $this
        $CI =& get_instance(); 

        $CI->load->helper('text');
        $CI->load->helper('url');

        // Replace unsupported characters (add your owns if necessary)
        $string = str_replace("'", '-', $string);
        $string = str_replace(".", '-', $string);
        $string = str_replace("²", '2', $string);

        // Slugify and return the string
        return url_title(convert_accented_characters($string), 'dash', true);
    }

}

if ( ! function_exists('website'))
{
    function website($kunci)
    {
        $CI = &get_instance();
        $t = $CI->db->get_where('pengaturan', ['kata_kunci' => $kunci])->row();
        $tampil = $t->konten;
        return $tampil;
    }
    

}

if ( ! function_exists('tahun_ajaran'))
{
    function tahun_ajaran($kunci)
    {
        $CI = &get_instance();
        $t = $CI->db->get_where('pengaturan', ['kata_kunci' => 'tahun_ajaran'])->row();
        $tahun_ajaran_id = $t->konten;

        $get_tahun_ajaran  = $CI->db->get_where('ref_tahun_ajaran', ['id' => $tahun_ajaran_id])->row();
        return $get_tahun_ajaran->$kunci;
    }
    

}

if ( ! function_exists('status_kelengkapan'))
{
    function status_kelengkapan($siswa_id, $persyaratan_id)
    {
        $CI = &get_instance();
        $get_data = $CI->db->get_where('kelengkapan_persyaratan', ['calon_siswa_id' => $siswa_id, 'ref_kelengkapan_persyaratan_id' => $persyaratan_id])->row();
        if($get_data){
            return true;
        }
    }
    

}

if ( ! function_exists('menu'))
{
    function menu($jenis = 'menu-utama')
    {
        $CI = &get_instance();

		$menu = $CI->db->query("SELECT a.*
								FROM menu a
								INNER JOIN kategori b ON b.id = a.kategori_id 
								WHERE a.level=0 AND a.dihapus_pada is null AND a.aktif='1' AND b.slug = '$jenis'
								GROUP BY a.id 
								ORDER BY urutan
							")->result();
		
        return $menu;
    }
}

if ( ! function_exists('child_menu'))
{
    function child_menu($child_id)
    {
        $CI = &get_instance();
		$menu = $CI->db->query("SELECT a.*, b.url as parent_url
									FROM menu a
									LEFT JOIN menu b ON a.id_parent=b.id
									WHERE a.id_parent=$child_id AND a.dihapus_pada is null AND a.aktif='1' 
									ORDER BY urutan
								")->result();
        return $menu;
    }

}

if ( ! function_exists('url'))
{
    function url($string, $page = null)
    {
        $has_link = stristr($string, 'http://') ?: stristr($string, 'https://');
		if($has_link == true){
			return $string;
		}else{
			if($page == null){
				return base_url($string);
			}else{
				return base_url('informasi/detail/'.$string);
			}
		}
    }

}

if ( ! function_exists('jenis_kelamin'))
{
    function jenis_kelamin($id)
    {
        $CI = &get_instance();
		$jenis_kelamin = $CI->db->query("SELECT a.*
									FROM ref_jenis_kelamin a
									WHERE a.id='$id'
								")->row();
		if($jenis_kelamin){
			return $jenis_kelamin->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('agama'))
{
    function agama($id)
    {
        $CI = &get_instance();
		$agama = $CI->db->query("SELECT a.*
									FROM ref_agama a
									WHERE a.id='$id'
								")->row();
		if($agama){
			return $agama->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('berkebutuhan_khusus'))
{
    function berkebutuhan_khusus($id)
    {
        $CI = &get_instance();
		$berkebutuhan_khusus = $CI->db->query("SELECT a.*
									FROM ref_berkebutuhan_khusus a
									WHERE a.id='$id'
								")->row();
		if($berkebutuhan_khusus){
			return $berkebutuhan_khusus->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('tempat_tinggal'))
{
    function tempat_tinggal($id)
    {
        $CI = &get_instance();
		$tempat_tinggal = $CI->db->query("SELECT a.*
									FROM ref_tempat_tinggal a
									WHERE a.id='$id'
								")->row();
		if($tempat_tinggal){
			return $tempat_tinggal->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('mode_transportasi'))
{
    function mode_transportasi($id)
    {
        $CI = &get_instance();
		$mode_transportasi = $CI->db->query("SELECT a.*
									FROM ref_mode_transportasi a
									WHERE a.id='$id'
								")->row();
		if($mode_transportasi){
			return $mode_transportasi->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('penghasilan'))
{
    function penghasilan($id)
    {
        $CI = &get_instance();
		$penghasilan = $CI->db->query("SELECT a.*
									FROM ref_penghasilan a
									WHERE a.id='$id'
								")->row();
		if($penghasilan){
			return $penghasilan->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('pendidikan'))
{
    function pendidikan($id)
    {
        $CI = &get_instance();
		$pendidikan = $CI->db->query("SELECT a.*
									FROM ref_pendidikan a
									WHERE a.id='$id'
								")->row();
		if($pendidikan){
			return $pendidikan->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('pekerjaan'))
{
    function pekerjaan($id)
    {
        $CI = &get_instance();
		$pekerjaan = $CI->db->query("SELECT a.*
									FROM ref_pekerjaan a
									WHERE a.id='$id'
								")->row();
		if($pekerjaan){
			return $pekerjaan->nama;
		}else{
			return ' ';
		}
    }
}

if ( ! function_exists('dDebug'))
{
    function dd()
    {
        list($callee) = debug_backtrace();

        $args = func_get_args();

        $total_args = func_num_args();

        echo '<div><fieldset style="background: #fefefe !important; border:1px red solid; padding:15px">';
        echo '<legend style="background:blue; color:white; padding:5px;">'.$callee['file'].' @line: '.$callee['line'].'</legend><pre><code>';

        $i = 0;

        foreach ($args as $arg)
        {
            echo '<strong>Debug #' . ++$i . ' of ' . $total_args . '</strong>: ' . '<br>';

            var_dump($arg);
        }

        echo "</code></pre></fieldset><div><br>";
    }
} 

function getLastestNews() 
{
    $CI = &get_instance();
    $news = $CI->db->select('judul')->from('posting')->order_by('diterbitkan', 'desc')->limit(5)->get()->result();
    $arr = [];
    foreach ($news as $row) {
        $arr[] = $row;
    }
    return $arr;
}



/* End of file my_helper.php */
/* Location: ./application/helpers/my_helper.php */
