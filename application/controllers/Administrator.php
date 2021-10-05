<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {
	function index(){
		if (isset($_POST['submit'])){
			$username = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->model_app->cek_login($username,$password,'users');
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username'=>$row['username'],
								   'level'=>$row['level'],
                                   'id_session'=>$row['id_session']));

				redirect('administrator/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

	function home(){
        if ($this->session->level=='admin'){
		  $this->template->load('administrator/template','administrator/view_home_admin');
        }else{
          $data['users'] = $this->model_app->view_where('users',array('username'=>$this->session->username))->row_array();
          $data['modul'] = $this->model_app->view_join_one('users','users_modul','id_session','id_umod','DESC');
          $this->template->load('administrator/template','administrator/view_home_users',$data);
        }
	}

	function identitaswebsite(){
		cek_session_akses('identitaswebsite',$this->session->id_session);
		if (isset($_POST['submit'])){
						$config['upload_path'] = 'asset/images/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('j');
            $hasil=$this->upload->data();

						$config['upload_path'] = 'asset/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('logo');
            $logo=$this->upload->data();

						$config['upload_path'] = 'asset/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('minilogo');
            $minilogo=$this->upload->data();

            if ($hasil['file_name']=='' && $logo['file_name']=='' && $minilogo['file_name']==''){
            	$data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                'email'=>$this->db->escape_str($this->input->post('b')),
                                'url'=>$this->db->escape_str($this->input->post('c')),
                                'facebook'=>$this->input->post('d'),
																'instagram'=>$this->input->post('ig'),
																'whatsapp'=>$this->input->post('wa'),
																'youtube'=>$this->input->post('yt'),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('address'),
                                'deskripsi'=>$this->input->post('e'),
                                'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                'meta_deskripsi'=>$this->input->post('g'),
                                'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                'maps'=>$this->input->post('i'));
            }else{
            	$data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                'email'=>$this->db->escape_str($this->input->post('b')),
                                'url'=>$this->db->escape_str($this->input->post('c')),
                                'facebook'=>$this->input->post('d'),
																'instagram'=>$this->input->post('ig'),
																'whatsapp'=>$this->input->post('wa'),
																'youtube'=>$this->input->post('yt'),
																'slogan'=>$this->input->post('slogan'),
                                'deskripsi'=>$this->input->post('e'),
                                'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                'meta_deskripsi'=>$this->input->post('g'),
                                'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                'favicon'=>$hasil['file_name'],
																'logo'=>$logo['file_name'],
																'minilogo'=>$minilogo['file_name'],
                                'maps'=>$this->input->post('i'));
            }
	    	$where = array('id_identitas' => $this->input->post('id'));
			$this->model_app->update('identitas', $data, $where);

			redirect('administrator/identitaswebsite');
		}else{
			$proses = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
			$data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_identitas/view_identitas',$data);
		}
	}

// Menu 1
	function list_menu1(){
		cek_session_akses('list_menu1',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('open_tbl','id_berita','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('open_tbl',array('username'=>$this->session->username),'id_berita','DESC');
        }

	    $data['judul']   = 'Partner';
		$this->template->load('administrator/template','administrator/mod_menu1/view_berita',$data);
	}
	function tambah_list_menu1(){
		cek_session_akses('list_menu1',$this->session->id_session);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'asset/foto_open/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_open/'.$hasil['file_name'];

			$config['upload_path'] = 'asset/foto_open/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img2');
	        $img2=$this->upload->data();
          $config['source_image'] = 'asset/foto_open/'.$img2['file_name'];

            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($hasil['file_name']=='' && $img2['file_name']==''){
                    $data = array(  'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else if ($hasil['file_name']==''){
                    $data = array(
                                    'gambar2'=>$img2['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else if ($img2['file_name']==''){
                    $data = array(
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
            else{
                    $data = array(
                                    'gambar'=>$hasil['file_name'],
                                    'gambar2'=>$img2['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
            $this->model_app->insert('open_tbl',$data);
			redirect('administrator/list_menu1');
		}else{

            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
            $data['record'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_menu1/view_berita_tambah',$data);
		}
	}
	function edit_list_menu1(){
		cek_session_akses('list_menu1',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'asset/foto_open/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_open/'.$hasil['file_name'];

			$config['upload_path'] = 'asset/foto_open/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img2');
	        $img2=$this->upload->data();
          $config['source_image'] = 'asset/foto_open/'.$img2['file_name'];

            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

            if ($hasil['file_name']=='' && $img2['file_name']==''){
                    $data = array(  'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else if ($hasil['file_name']==''){
                    $data = array(
                                    'gambar2'=>$img2['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else if ($img2['file_name']==''){
                    $data = array(
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
            else{
                    $data = array(
                                    'gambar'=>$hasil['file_name'],
                                    'gambar2'=>$img2['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
									'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
									'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
                                    'konten'=>$this->input->post('h'),
                                    'syarat'=>$this->input->post('syarat'),
                                    'info'=>$this->input->post('info'),
                                    'fasilitas'=>$this->input->post('fasilitas'),
                                    'itinerary'=>$this->input->post('itinerary'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'equip'=>$this->input->post('equip'),
									'meta_desc'=>$this->input->post('meta'),
									'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
									'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
									'kapasitas_min'=>$this->db->escape_str($this->input->post('kapasitas_min')),
									'kapasitas_max'=>$this->db->escape_str($this->input->post('kapasitas_max')),
									'partisipan'=>$this->input->post('partisipan'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
            $where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('open_tbl', $data, $where);
			redirect('administrator/list_menu1');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
            $record = $this->model_app->view_ordering('kategori','id_kategori','DESC');
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('open_tbl', array('id_berita' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('open_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_menu1/view_berita_edit',$data);
		}
	}
	function delete_list_menu1(){
        cek_session_akses('list_menu1',$this->session->id_session);
        if ($this->session->level=='admin'){
    		$id = array('id_berita' => $this->uri->segment(3));
        }else{
            $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
		$this->model_app->delete('open_tbl',$id);
		redirect('administrator/list_menu1');
	}

// Menu 2
	function list_pt(){
		cek_session_akses('list_pt',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_one('vendor_tbl','kategori','id_kategori','id_berita','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('vendor_tbl',array('username'=>$this->session->username),'id_berita','DESC');
        }

	    $data['judul']   = 'List Layanan';
		$this->template->load('administrator/template','administrator/mod_vendor/view_berita',$data);
	}
	function tambah_list_pt(){
		cek_session_akses('list_pt',$this->session->id_session);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'asset/foto_private/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_private/'.$hasil['file_name'];

			$config['upload_path'] = 'asset/foto_private/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img2');
	        $img2=$this->upload->data();
          $config['source_image'] = 'asset/foto_private/'.$img2['file_name'];

            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($hasil['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama_2'=>$this->db->escape_str($this->input->post('e')),
                                    'konten'=>$this->input->post('h'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama_2'=>$this->db->escape_str($this->input->post('e')),
                                    'konten'=>$this->input->post('h'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
                                    'tag'=>$tag,
                                    'status'=>$status);
            }
            $this->model_app->insert('vendor_tbl',$data);
			redirect('administrator/list_pt');
		}else{
			$data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
            $data['record'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_vendor/view_berita_tambah',$data);
		}
	}
	function edit_list_pt(){
		cek_session_akses('list_pt',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_private/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_private/'.$hasil['file_name'];


            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

            if ($hasil['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'nama_2'=>$this->input->post('e'),
                                    'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
                                    'tag'=>$tag,
                                    'status'=>$status);
																		$where = array('id_berita' => $this->input->post('id'));
														 				$this->db->update('vendor_tbl', $data, $where);
            }
            else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'gambar'=>$hasil['file_name'],
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama_2'=>$this->input->post('e'),
                                    'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
                                    'tag'=>$tag,
                                    'status'=>$status);
																		$where = array('id_berita' => $this->input->post('id'));
																		$_image = $this->db->get_where('vendor_tbl',$where)->row();
																		$query = $this->db->update('vendor_tbl',$data,$where);
																		if($query){
																			unlink("asset/foto_private/".$_image->gambar);
																		}
            }

			redirect('administrator/list_pt');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
            $record = $this->model_app->view_ordering('kategori','id_kategori','DESC');
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('vendor_tbl', array('id_berita' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('vendor_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_vendor/view_berita_edit',$data);
		}
	}
	function publish_list_pt(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('vendor_tbl', $data, $where);
		redirect('administrator/list_pt');
	}
	function delete_list_pt(){
				cek_session_akses('list_pt',$this->session->id_session);
				$id = $this->uri->segment(3);
				$_id = $this->db->get_where('vendor_tbl',['id_berita' => $id])->row();
				 $query = $this->db->delete('vendor_tbl',['id_berita'=>$id]);
				if($query){
								 unlink("./asset/foto_private/".$_id->foto_produk);
			 }
		redirect('administrator/list_pt');
	}

// Menu 2.1
	function kategori_pt(){
		cek_session_akses('kategori_pt',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('kategori',array('username'=>$this->session->username),'id_kategori','DESC');
        }
        $data['judul']   = 'Kategori Layanan';

		$this->template->load('administrator/template','administrator/mod_kategori/view_kategori',$data);
	}
	function tambah_kategori_pt(){
		cek_session_akses('kategori_pt',$this->session->id_session);

		if (isset($_POST['submit'])){

		    $config['upload_path'] = 'asset/foto_privatetrip/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_privatetrip/'.$hasil['file_name'];

          $config['upload_path'] = 'asset/foto_privatetrip/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img2');
	        $img2=$this->upload->data();
          $config['source_image'] = 'asset/foto_privatetrip/'.$img2['file_name'];

		    if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
		  if ($hasil['file_name']==''){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),

						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );
		  }else{
		      $data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),
                        'gambar'=>$hasil['file_name'],
						'gambar2'=>$img2['file_name'],
						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );
		  }
			$this->model_app->insert('kategori',$data);
			redirect('administrator/kategori_pt');
		}else{

			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_tambah');
		}
	}
	function edit_kategori_pt(){
		cek_session_akses('kategori_pt',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
		    $config['upload_path'] = 'asset/foto_privatetrip/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_privatetrip/'.$hasil['file_name'];

          $config['upload_path'] = 'asset/foto_privatetrip/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img2');
	        $img2=$this->upload->data();
          $config['source_image'] = 'asset/foto_privatetrip/'.$img2['file_name'];

		    if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
			if ($hasil['file_name']=='' && $img2['file_name']==''){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),
						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );
		  }else if($img2['file_name']==''){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),
                        'gambar'=>$hasil['file_name'],
						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );

		  }else if($hasil['file_name']==''){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),
                        'gambar2'=>$img2['file_name'],
						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );

		  }else{
		      $data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'nama'=>$this->db->escape_str($this->input->post('nama')),
                        'desc_kat'=>$this->input->post('desc_kat'),
                        'gambar'=>$hasil['file_name'],
						'gambar2'=>$img2['file_name'],
						 'tag'=>$tag,
                        'meta_desc'=>$this->db->escape_str($this->input->post('meta_desc'))
                        );
		  }
			$where = array('id_kategori' => $this->input->post('id'));
			$this->model_app->update('kategori', $data, $where);
			redirect('administrator/kategori_pt');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('kategori', array('id_kategori' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('kategori', array('id_kategori' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_edit',$data);
		}
	}
	function delete_kategori_pt(){
		cek_session_akses('kategori_pt',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_kategori' => $this->uri->segment(3));
        }else{
            $id = array('id_kategori' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
		$this->model_app->delete('kategori',$id);
		redirect('administrator/kategori_pt');
	}

// Menu Galeri Foto
	function listgaleri(){
				if ($this->session->level=='admin'){
						$data['record'] = $this->model_app->view_where_ordering('galeri_tbl',array('id_kategori' => 1),'id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('galeri_tbl',array('id_kategori' => 1),'id_berita','DESC');
				}
		cek_session_akses OR cek_session_akses_2('listgallery',$this->session->id_session);
		$this->template->load('administrator/template','administrator/mod_galeri/views',$data);
	}
	function tambah_listgaleri(){
		cek_session_akses OR cek_session_akses_2('listgaleri',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_galeri/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img1');
	        $img1=$this->upload->data();
          $config['source_image'] = 'asset/foto_galeri/'.$img1['file_name'];



            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($img1['file_name']=='' ){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
																		'tag'=>$tag,
                                    'status'=>$status);
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'nama'=>$this->db->escape_str($this->input->post('e')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
																		'gambar'=>$img1['file_name'],
                                    'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
																		'tag'=>$tag,
                                    'status'=>$status);
            }

            $this->model_app->insert('galeri_tbl',$data);
			redirect('administrator/listgaleri');
		}else{

            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
            $data['galeri'] = $this->model_app->view_ordering('kategori_galeri','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_galeri/view_tambah',$data);
		}
	}
	function edit_listgaleri(){
		cek_session_akses OR cek_session_akses_2('listgaleri',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_galeri/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['source_image'] = 'asset/foto_galeri/'.$hasil22['file_name'];


						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

						if ($hasil22['file_name']==''){
						$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
													'username'=>$this->session->username,
													'judul'=>$this->db->escape_str($this->input->post('b')),
													'judul_seo'=>seo_title($this->input->post('b')),
													'meta_desc'=>$this->input->post('meta'),
													'tag'=>$tag);

						}else{
										$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'meta_desc'=>$this->input->post('meta'),
																		'tag'=>$tag,
																		'gambar'=>$hasil22['file_name']);
																		$where = array('id_berita' => $this->input->post('id'));
																		$_image = $this->db->get_where('galeri_tbl',$where)->row();
																		$query = $this->db->update('galeri_tbl',$data,$where);
																		if($query){
																			unlink("asset/foto_galeri/".$_image->gambar);
																		}
						}
			redirect('administrator/listgaleri');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_galeri','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('galeri_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('galeri_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_galeri/view_edit',$data);
		}
	}
	function delete_listgaleri(){
        cek_session_akses OR cek_session_akses_2('listgaleri',$this->session->id_session);
				$id = $this->uri->segment(3);
				$_id = $this->db->get_where('galeri_tbl',['id_berita' => $id])->row();
				$query = $this->db->delete('galeri_tbl',['id_berita'=>$id]);
			 	if($query){
								 unlink("./asset/foto_galeri/".$_id->gambar);
			 }
			redirect('administrator/listgaleri');

	}

	function listgaleri_detail()
	{
		$ids = $this->uri->segment(3);
				if ($this->session->level=='1'){
					$data['galeri']           = $this->model_app->get_by_id_post($ids,'id_berita','galeri_tbl','judul_seo');
					$data['galeri_detail']    = $this->model_app->get_by_id_post_galeri_detail($ids);
				}else{
						$row = $this->model_app->get_by_id_post_2($ids);
						if ($row){
						/* memanggil function dari masing2 model yang akan digunakan */
						$data['galeri']           = $this->model_app->get_by_id_post($ids,'id_berita','galeri_tbl','judul_seo');
						$data['galeri_detail']    = $this->model_app->get_by_id_post_galeri_detail($ids);
						}
				}
				cek_session_akses('listgaleri',$this->session->id_session);
				$this->template->load('administrator/template','administrator/mod_galeri/view_detail',$data);

	}
	public function listgaleri_detail_tambahkan()
	{
		cek_session_akses('listgaleri_detail',$this->session->id_session);
		$ids = $this->uri->segment(3);
		if (isset($_POST['submit'])){



					$config['upload_path'] = 'asset/foto_galeri/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('gambar');
	        $hasil22=$this->upload->data();
          $config['source_image'] = 'asset/foto_galeri/'.$hasil22['file_name'];


					if ($hasil22['file_name']=='' ){
									$data = array(
													'galeri_detail_tbl_judul'=>$this->db->escape_str($this->input->post('galeri_detail_tbl_judul')),
													'galeri_detail_tbl_judul_seo'=>seo_title($this->input->post('galeri_detail_tbl_judul')),
													'galeri_tbl_id_berita'=>$this->input->post('galeri_tbl_id_berita'));
												}else {
												$data = array(
													'galeri_detail_tbl_judul'=>$this->db->escape_str($this->input->post('galeri_detail_tbl_judul')),
													'galeri_detail_tbl_judul_seo'=>seo_title($this->input->post('galeri_detail_tbl_judul')),
													'galeri_tbl_id_berita'=> $this->input->post('galeri_tbl_id_berita'),
													'galeri_detail_tbl_gambar'=>$hasil22['file_name']);
												}
								$this->model_app->insert('galeri_detail_tbl',$data);
								redirect('administrator/listgaleri/');
				}else{
					$data['galeri'] = $this->model_app->get_by_ids($ids,'id_berita','galeri_tbl');
					$this->template->load('administrator/template','administrator/mod_galeri/view_tambah_detail',$data);
				}
	}


// Menu Galeri Video
	function listvideo(){
		cek_session_akses OR cek_session_akses_2('listvideo',$this->session->id_session);
				if ($this->session->level=='admin'){
						$data['record'] = $this->model_app->view_where_ordering('galeri_tbl',array('id_kategori' => 2),'id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('galeri_tbl',array('id_kategori' => 2),'id_berita','DESC');
				}
		$this->template->load('administrator/template','administrator/mod_galeri_v/views',$data);
	}
	function tambah_listvideo(){
		cek_session_akses OR cek_session_akses_2('listvideo',$this->session->id_session);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'asset/foto_galeri/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('img1');
	        $img1=$this->upload->data();
            $config['source_image'] = 'asset/foto_galeri/'.$img1['file_name'];


            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($img1['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'youtube'=>$this->input->post('urlyoutube'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
                                    'status'=>$status);
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'youtube'=>$this->input->post('urlyoutube'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
																		'gambar'=>$img1['file_name'],
                                    'views'=>'0',
                                    'status'=>$status);
            }
            $this->model_app->insert('galeri_tbl',$data);
			redirect('administrator/listvideo');
		}else{
			 $data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
            $data['record'] = $this->model_app->view_ordering('kategori_galeri','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_galeri_v/view_tambah',$data);
		}
	}
	function edit_listvideo(){
		cek_session_akses OR cek_session_akses_2('listvideo',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_galeri/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('img1');
			$img1=$this->upload->data();
			$config['source_image'] = 'asset/foto_galeri/'.$img1['file_name'];
			$tags = implode(",", $tags2);
			if ($img1['file_name']==''){

										$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'youtube'=>$this->input->post('urlyoutube'));
																		  }else{
																				$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
																												'username'=>$this->session->username,
																												'judul'=>$this->db->escape_str($this->input->post('b')),
																												'judul_seo'=>seo_title($this->input->post('b')),
																												'gambar'=>$img1['file_name'],
																												'youtube'=>$this->input->post('urlyoutube'));
}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('galeri_tbl', $data, $where);
			redirect('administrator/listvideo');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_galeri','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('galeri_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('galeri_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_galeri_v/view_edit',$data);
		}
	}
	function delete_listvideo(){
        cek_session_akses OR cek_session_akses_2('listgaleri',$this->session->id_session);
        if ($this->session->level=='admin'){
    		$id = array('id_berita' => $this->uri->segment(3));
        }else{
            $id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
		$this->model_app->delete('galeri_tbl',$id);
		redirect('administrator/listvideo');
	}

// Menu Blog
	function listblog(){
		cek_session_akses OR cek_session_akses_2('listblog',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
						$data['record'] = $this->model_app->view_ordering('blogs_tbl','id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('blogs_tbl',array('username'=>$this->session->username),'id_berita','DESC');
				}

		$this->template->load('administrator/template','administrator/mod_blog/views',$data);
	}
	function tambah_listblog(){
		cek_session_akses OR cek_session_akses_2 ('listblog',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_blogs/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_blogs/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'konten'=>$this->input->post('h'),
																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'views'=>'0',
									'meta_desc'=>$this->input->post('meta'),
									'tag'=>$tag,
																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'konten'=>$this->input->post('h'),
																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'gambar'=>$hasil['file_name'],
																		'views'=>'0',
									'meta_desc'=>$this->input->post('meta'),
									'tag'=>$tag,
																		'status'=>$status);
						}
						$this->model_app->insert('blogs_tbl',$data);
			redirect('administrator/listblog');
		}else{
							$data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
						$data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
						$data['record'] = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_blog/view_tambah',$data);
		}
	}
	function edit_listblog(){
		cek_session_akses OR cek_session_akses_2 ('listblog',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
					$config['upload_path'] = 'asset/foto_blogs/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_blogs/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																		'youtube'=>$this->input->post('urlyoutube'),
																		'tag'=>$tag,
																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																		'youtube'=>$this->input->post('urlyoutube'),
																		'gambar'=>$hasil['file_name'],
																		'tag'=>$tag,
																		'status'=>$status);
						}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('blogs_tbl', $data, $where);
			redirect('administrator/listblog');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('blogs_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('blogs_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_blog/view_edit',$data);
		}
	}
	function publish_listblog(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('blogs_tbl', $data, $where);
		redirect('administrator/listblog');
	}
	function delete_listblog(){
				cek_session_akses OR cek_session_akses_2('listblog',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
				$id = array('id_berita' => $this->uri->segment(3));
				}else{
						$id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
				}
		$this->model_app->delete('blogs_tbl',$id);
		redirect('administrator/listblog');
	}

	function testimoni(){
		cek_session_akses OR cek_session_akses_2('testimoni',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
						$data['record'] = $this->model_app->view_ordering('partners_tbl','id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('partners_tbl',array('username'=>$this->session->username),'id_berita','DESC');
				}

		$this->template->load('administrator/template','administrator/mod_partners/views',$data);
	}
	function tambah_testimoni(){
		cek_session_akses OR cek_session_akses_2 ('testimoni',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_partners/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_partners/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'konten'=>$this->input->post('h'),
																		'youtube'=>$this->input->post('youtube'),
																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
																		'tag'=>$tag,
																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'youtube'=>$this->input->post('youtube'),
																		'konten'=>$this->input->post('h'),
																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'gambar'=>$hasil['file_name'],
																		'views'=>'0',
																		'meta_desc'=>$this->input->post('meta'),
																		'tag'=>$tag,
																		'status'=>$status);
						}
						$this->model_app->insert('partners_tbl',$data);
			redirect('administrator/testimoni');
		}else{
							$data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
						$data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
						$data['record'] = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_partners/view_tambah',$data);
		}
	}
	function edit_testimoni(){
		cek_session_akses OR cek_session_akses_2 ('testimoni',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
					$config['upload_path'] = 'asset/foto_partners/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_partners/'.$hasil['file_name'];
						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'youtube'=>$this->input->post('youtube'),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),

																		'tag'=>$tag,
																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'youtube'=>$this->input->post('youtube'),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),

																		'gambar'=>$hasil['file_name'],
																		'tag'=>$tag,
																		'status'=>$status);
						}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('partners_tbl', $data, $where);
			redirect('administrator/testimoni');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('partners_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('partners_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_partners/view_edit',$data);
		}
	}
	function publish_lispartners(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('blogs_tbl', $data, $where);
		redirect('administrator/listblog');
	}
	function delete_testimoni(){
				cek_session_akses OR cek_session_akses_2('testimoni',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
				$id = array('id_berita' => $this->uri->segment(3));
				}else{
						$id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
				}
		$this->model_app->delete('partners_tbl',$id);
		redirect('administrator/testimoni');
	}

// Menu partner
	function list_partner(){
		cek_session_akses OR cek_session_akses_2('list_partner',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
						$data['record'] = $this->model_app->view_ordering('partner_tbl','id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('partner_tbl',array('username'=>$this->session->username),'id_berita','DESC');
				}

		$this->template->load('administrator/template','administrator/mod_partner/views',$data);
	}
	function tambah_list_partner(){
		cek_session_akses OR cek_session_akses_2 ('list_partner',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_blogs/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_blogs/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),

																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'views'=>'0',

																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),

																		'hari'=>hari_ini(date('w')),
																		'tanggal'=>date('Y-m-d'),
																		'jam'=>date('H:i:s'),
																		'gambar'=>$hasil['file_name'],
																		'views'=>'0',

																		'status'=>$status);
						}
						$this->model_app->insert('partner_tbl',$data);
			redirect('administrator/list_partner');
		}else{
							$data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
						$data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
						$data['record'] = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_partner/view_tambah',$data);
		}
	}
	function edit_list_partner(){
		cek_session_akses OR cek_session_akses_2 ('list_partner',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
					$config['upload_path'] = 'asset/foto_blogs/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_blogs/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),

																		'status'=>$status);
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'status'=>$status);
						}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('partner_tbl', $data, $where);
			redirect('administrator/list_partner');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_blogs','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('partner_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('partner_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_partner/view_edit',$data);
		}
	}
	function publish_list_partner(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('partner_tbl', $data, $where);
		redirect('administrator/list_partner');
	}
	function delete_list_partner(){
				cek_session_akses OR cek_session_akses_2('list_partner',$this->session->id_session);
				if ($this->session->level=='admin' OR level=='kontributor'){
				$id = array('id_berita' => $this->uri->segment(3));
				}else{
						$id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
				}
		$this->model_app->delete('partner_tbl',$id);
		redirect('administrator/list_partner');
	}

// Menu Promo
	function listpromo(){
		cek_session_akses OR cek_session_akses_2('listpromo',$this->session->id_session);
				if ($this->session->level=='admin'){
						$data['record'] = $this->model_app->view_ordering('promo_tbl','id_berita','DESC');
				}else{
						$data['record'] = $this->model_app->view_where_ordering('promo_tbl',array('username'=>$this->session->username),'id_berita','DESC');
				}

		$this->template->load('administrator/template','administrator/mod_promo/views',$data);
	}
	function tambah_listpromo(){
		cek_session_akses OR cek_session_akses_2('listpromo',$this->session->id_session);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'asset/foto_promo/';
	        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	        $config['max_size'] = '1000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();
          $config['source_image'] = 'asset/foto_promo/'.$hasil['file_name'];

            if ($hasil['file_name']==''){
                    $data = array(
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
																		'konten'=>$this->input->post('h'),
									'keterangan_gambar'=>$this->input->post('ketgambar'));

            }else{
                    $data = array(
                                    'username'=>$this->session->username,
                                    'judul'=>$this->db->escape_str($this->input->post('b')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'views'=>'0',
																		'konten'=>$this->input->post('h'),
									'keterangan_gambar'=>$this->input->post('ketgambar'),
									'gambar'=>$hasil['file_name']);


            }
            $this->model_app->insert('promo_tbl',$data);
			redirect('administrator/listpromo');
		}else{

            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');

			$this->template->load('administrator/template','administrator/mod_promo/view_tambah',$data);
		}
	}
	function edit_listpromo(){
		cek_session_akses OR cek_session_akses_2('listpromo',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'asset/foto_promo/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_promo/'.$hasil['file_name'];

						if ($hasil['file_name']==''){
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')));
						}else{
										$data = array(
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																		'gambar'=>$hasil['file_name']);
						}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('promo_tbl', $data, $where);
			redirect('administrator/listpromo');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_galeri','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('promo_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('promo_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_promo/view_edit',$data);
		}
	}
	function publish_listpromo(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('promo_tbl', $data, $where);
		redirect('administrator/listpromo');
	}
	function delete_listpromo(){
				cek_session_akses OR cek_session_akses_2('listpromo',$this->session->id_session);
				if ($this->session->level=='admin'){
				$id = array('id_berita' => $this->uri->segment(3));
				}else{
						$id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
				}
		$this->model_app->delete('promo_tbl',$id);
		redirect('administrator/listpromo');
	}

// Menu 3
	function listinvestasi(){
			cek_session_akses('listinvestasi',$this->session->id_session);
					if ($this->session->level=='admin'){
							$data['record'] = $this->model_app->view_ordering('investasi_tbl','id_berita','DESC');
					}else{
							$data['record'] = $this->model_app->view_where_ordering('investasi_tbl',array('username'=>$this->session->username),'id_berita','DESC');
					}
					$data['rss'] = $this->model_utama->view_joinn('investasi_tbl','users','kategori_investasi','username','id_kategori','id_berita','DESC',0,10);
					$data['iden'] = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
					$this->load->view('administrator/rss',$data);
			$this->template->load('administrator/template','administrator/mod_investasi/views',$data);
		}
	function tambah_listinvestasi(){
			cek_session_akses('listinvestasi',$this->session->id_session);
			if (isset($_POST['submit'])){

						$config['upload_path'] = 'asset/foto_investasi/';
		        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
		        $config['max_size'] = '1000'; // kb
		        $this->load->library('upload', $config);
		        $this->upload->do_upload('k');
		        $hasil=$this->upload->data();
	          $config['source_image'] = 'asset/foto_investasi/'.$hasil['file_name'];


	            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
	            if ($this->input->post('j')!=''){
	                $tag_seo = $this->input->post('j');
	                $tag=implode(',',$tag_seo);
	            }else{
	                $tag = '';
	            }
				$tag = $this->input->post('j');
				$tags = explode(",", $tag);
				$tags2 = array();
				foreach($tags as $t)
				{
					$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
					$a = $this->db->query($sql)->result_array();
					if(count($a) == 0){
						$data = array('nama_tag'=>$this->db->escape_str($t),
								'username'=>$this->session->username,
								'tag_seo'=>seo_title($t),
								'count'=>'0');
						$this->model_app->insert('tag',$data);
					}
					$tags2[] = seo_title($t);
				}
				$tags = implode(",", $tags2);
	            if ($hasil['file_name']==''){
	                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
	                                    'username'=>$this->session->username,
	                                    'judul'=>$this->db->escape_str($this->input->post('b')),
	                                    'judul_seo'=>seo_title($this->input->post('b')),
	                                    'nama'=>$this->db->escape_str($this->input->post('e')),
	                                    'konten'=>$this->input->post('h'),
																			'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
	                                    'hari'=>hari_ini(date('w')),
	                                    'tanggal'=>date('Y-m-d'),
	                                    'jam'=>date('H:i:s'),
	                                    'views'=>'0',
																			'meta_desc'=>$this->input->post('meta'),
																			'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																			'youtube'=>$this->input->post('urlyoutube'),
																			'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
																			'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
																			'tag'=>$tag,
	                                    'status'=>$status);
	            }else{
	                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
	                                    'username'=>$this->session->username,
	                                    'judul'=>$this->db->escape_str($this->input->post('b')),
	                                    'judul_seo'=>seo_title($this->input->post('b')),
	                                    'nama'=>$this->db->escape_str($this->input->post('e')),
	                                    'konten'=>$this->input->post('h'),
																			'lokasi'=>$this->db->escape_str($this->input->post('lokasi')),
	                                    'hari'=>hari_ini(date('w')),
	                                    'tanggal'=>date('Y-m-d'),
	                                    'jam'=>date('H:i:s'),
	                                    'gambar'=>$hasil['file_name'],
	                                    'views'=>'0',
																			'meta_desc'=>$this->input->post('meta'),
																			'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																			'youtube'=>$this->input->post('urlyoutube'),
																			'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
																			'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
																			'tag'=>$tag,
	                                    'status'=>$status);
	            }
	            $this->model_app->insert('investasi_tbl',$data);
				redirect('administrator/listinvestasi');
			}else{
							  $data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
	            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
	            $data['record'] = $this->model_app->view_ordering('kategori_investasi','id_kategori','DESC');
				$this->template->load('administrator/template','administrator/mod_investasi/view_tambah',$data);
			}
		}
	function edit_listinvestasi(){
		cek_session_akses('listinvestasi',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
					$config['upload_path'] = 'asset/foto_investasi/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$config['max_size'] = '1000'; // kb
					$this->load->library('upload', $config);
					$this->upload->do_upload('k');
					$hasil=$this->upload->data();
					$config['source_image'] = 'asset/foto_investasi/'.$hasil['file_name'];

						if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
						if ($this->input->post('j')!=''){
								$tag_seo = $this->input->post('j');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'username'=>$this->session->username,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);

						if ($hasil['file_name']==''){
										$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'youtube'=>$this->db->escape_str($this->input->post('d')),
																		'nama'=>$this->db->escape_str($this->input->post('e')),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																		'youtube'=>$this->input->post('urlyoutube'),
																		'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
																		'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
																		'tag'=>$tag,
																		'status'=>$status);
						}else{
										$data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
																		'username'=>$this->session->username,
																		'judul'=>$this->db->escape_str($this->input->post('b')),
																		'youtube'=>$this->db->escape_str($this->input->post('d')),
																		'judul_seo'=>seo_title($this->input->post('b')),
																		'nama'=>$this->db->escape_str($this->input->post('e')),
																		'konten'=>$this->input->post('h'),
																		'meta_desc'=>$this->input->post('meta'),
																		'keterangan_gambar'=>$this->db->escape_str($this->input->post('ketgambar')),
																		'youtube'=>$this->input->post('urlyoutube'),
																		'harga_min'=>$this->db->escape_str($this->input->post('hargamin')),
																		'harga_max'=>$this->db->escape_str($this->input->post('hargamax')),
																		'gambar'=>$hasil['file_name'],
																		'tag'=>$tag,
																		'status'=>$status);
						}
						$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('investasi_tbl', $data, $where);
			redirect('administrator/listinvestasi');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
						$record = $this->model_app->view_ordering('kategori_investasi','id_kategori','DESC');
						if ($this->session->level=='admin'){
								 $proses = $this->model_app->edit('investasi_tbl', array('id_berita' => $id))->row_array();
						}else{
								$proses = $this->model_app->edit('investasi_tbl', array('id_berita' => $id, 'username' => $this->session->username))->row_array();
						}
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_investasi/view_edit',$data);
		}
	}
	function publish_listinvestasi(){
				cek_session_admin();
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
				$where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('investasi_tbl', $data, $where);
		redirect('administrator/listinvestasi');
	}
	function delete_listinvestasi(){
				cek_session_akses('listpromo',$this->session->id_session);
				if ($this->session->level=='admin'){
				$id = array('id_berita' => $this->uri->segment(3));
				}else{
						$id = array('id_berita' => $this->uri->segment(3), 'username'=>$this->session->username);
				}
		$this->model_app->delete('investasi_tbl',$id);
		redirect('administrator/listinvestasi');
	}

// Menu Tag
	function tagvendor(){
		cek_session_akses('tagvendor',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('tag','id_tag','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('tag',array('username'=>$this->session->username),'id_tag','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_tag/view_tag',$data);
	}
	function tambah_tagvendor(){
		cek_session_akses('tagvendor',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
			$this->model_app->insert('tag',$data);
			redirect('administrator/tagvendor');
		}else{
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_tambah');
		}
	}
	function edit_tagvendor(){
		cek_session_akses('tagvendor',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'tag_seo'=>seo_title($this->input->post('a')));
			$where = array('id_tag' => $this->input->post('id'));
			$this->model_app->update('tag', $data, $where);
			redirect('administrator/tagvendor');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('tag', array('id_tag' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('tag', array('id_tag' => $id, 'username' => $this->session->username))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_edit',$data);
		}
	}
	function delete_tagvendor(){
        cek_session_akses('tagvendor',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        }else{
            $id = array('id_tag' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
		$this->model_app->delete('tag',$id);
		redirect('administrator/tagvendor');
	}

// Menu Komentar
	function komentarberita(){
		cek_session_akses('komentarberita',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('komentar','id_komentar','DESC');
		$this->template->load('administrator/template','administrator/mod_komentar/view_komentar',$data);
	}
	function edit_komentarberita(){
		cek_session_akses('komentarberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_komentar'=>$this->input->post('a'),
                        'url'=>$this->input->post('b'),
                        'isi_komentar'=>$this->input->post('c'),
                        'aktif'=>$this->input->post('d'),
                        'email'=>$this->input->post('e'));
			$where = array('id_komentar' => $this->input->post('id'));
			$this->model_app->update('komentar', $data, $where);
			redirect('administrator/komentarberita');
		}else{
			$proses = $this->model_app->edit('komentar', array('id_komentar' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_komentar/view_komentar_edit',$data);
		}
	}
	function delete_komentarberita(){
        cek_session_akses('komentarberita',$this->session->id_session);
		$id = array('id_komentar' => $this->uri->segment(3));
		$this->model_app->delete('komentar',$id);
		redirect('administrator/komentarberita');
	}

// Menu Pesan Masuk
	function pesanmasuk(){
		cek_session_akses('pesanmasuk',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('hubungi','id_hubungi','DESC');
		$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk',$data);
	}
	function detail_pesanmasuk(){
		cek_session_akses('pesanmasuk',$this->session->id_session);
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])){
			$nama           = $this->input->post('a');
            $email           = $this->input->post('b');
            $subject         = $this->input->post('c');
            $message         = $this->input->post('isi')." <br><hr><br> ".$this->input->post('d');

            $this->email->from('robby.prihandaya@gmail.com', 'PHPMU.COM');
            $this->email->to($email);
            $this->email->cc('');
            $this->email->bcc('');

            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->set_mailtype("html");
            $this->email->send();

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}else{
			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}
	}
	function delete_pesanmasuk(){
        cek_session_akses('pesanmasuk',$this->session->id_session);
		$id = array('id_hubungi' => $this->uri->segment(3));
        $this->model_app->delete('hubungi',$id);
		redirect('administrator/pesanmasuk');
	}

	// Controller Modul User
	function manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('users','username','DESC');
		$this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}
	function tambah_manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$id = $this->session->username;
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }else{
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }
            $this->model_app->insert('users',$data);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              $sess = md5($this->input->post('a')).'-'.date('YmdHis');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$sess,
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('a'));
		}else{
            $proses = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
            $data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		}
	}
	function edit_manajemenuser(){
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array('username'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            $where = array('username' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('id'));
		}else{
            if ($this->session->username==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('username' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
    			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{
                redirect('administrator/edit_manajemenuser/'.$this->session->username);
            }
		}
	}
	function delete_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
		$id = array('username' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
		redirect('administrator/manajemenuser');
	}
  function delete_akses(){
        cek_session_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->model_app->delete('users_modul',$id);
        redirect('administrator/edit_manajemenuser/'.$this->uri->segment(4));
    }
	function manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('modul','id_modul','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('modul',array('username'=>$this->session->username),'id_modul','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_modul/view_modul',$data);
	}
	function tambah_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $this->model_app->insert('modul',$data);
			redirect('administrator/manajemenmodul');
		}else{
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
		}
	}
	function edit_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'username'=>$this->session->username,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $where = array('id_modul' => $this->input->post('id'));
            $this->model_app->update('modul', $data, $where);
			redirect('administrator/manajemenmodul');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('modul', array('id_modul' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('modul', array('id_modul' => $id, 'username' => $this->session->username))->row_array();
            }
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
		}
	}
	function delete_manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_modul' => $this->uri->segment(3));
        }else{
            $id = array('id_modul' => $this->uri->segment(3), 'username'=>$this->session->username);
        }
        $this->model_app->delete('modul',$id);
		redirect('administrator/manajemenmodul');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('administrator');
	}
	function reset_password(){
	        if (isset($_POST['submit'])){
	            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
	            if ($usr->num_rows()>=1){
	                if ($this->input->post('a')==$this->input->post('b')){
	                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
	                    $where = array('id_session' => $this->input->post('id_session'));
	                    $this->model_app->update('users', $data, $where);

	                    $row = $usr->row_array();
	                    $this->session->set_userdata('upload_image_file_manager',true);
	                    $this->session->set_userdata(array('username'=>$row['username'],
	                                       'level'=>$row['level'],
	                                       'id_session'=>$row['id_session']));
	                    redirect('administrator/home');
	                }else{
	                    $data['title'] = 'Password Tidak sama!';
	                    $this->load->view('administrator/view_reset',$data);
	                }
	            }else{
	                $data['title'] = 'Terjadi Kesalahan!';
	                $this->load->view('administrator/view_reset',$data);
	            }
	        }else{
	            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
	            $data['title'] = 'Reset Password';
	            $this->load->view('administrator/view_reset',$data);
	        }
	    }
	function lupapassword(){
	        if (isset($_POST['lupa'])){
	            $email = strip_tags($this->input->post('email'));
	            $cekemail = $this->model_app->edit('users', array('email' => $email))->num_rows();
	            if ($cekemail <= 0){
	                $data['title'] = 'Alamat email tidak ditemukan';
	                $this->load->view('administrator/view_login',$data);
	            }else{
	                $iden = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
	                $usr = $this->model_app->edit('users', array('email' => $email))->row_array();
	                $this->load->library('email');

	                $tgl = date("d-m-Y H:i:s");
	                $subject      = 'Lupa Password ...';
	                $message      = "<html><body>
	                                    <table style='margin-left:25px'>
	                                        <tr><td>Halo $usr[nama_lengkap],<br>
	                                        Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
	                                        Klik di sini untuk mengganti kata sandi Anda.<br>
	                                        Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
	                                        <a href='".base_url()."administrator/reset_password/$usr[id_session]'>".base_url()."administrator/reset_password/$usr[id_session]</a><br><br>

	                                        Tidak meminta penggantian ini?<br>
	                                        Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
	                                        Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
	                                    </table>
	                                </body></html> \n";

	                $this->email->from($iden['email'], $iden['nama_website']);
	                $this->email->to($usr['email']);
	                $this->email->cc('');
	                $this->email->bcc('');

	                $this->email->subject($subject);
	                $this->email->message($message);
	                $this->email->set_mailtype("html");
	                $this->email->send();

	                $config['protocol'] = 'sendmail';
	                $config['mailpath'] = '/usr/sbin/sendmail';
	                $config['charset'] = 'utf-8';
	                $config['wordwrap'] = TRUE;
	                $config['mailtype'] = 'html';
	                $this->email->initialize($config);

	                $data['title'] = 'Password terkirim ke '.$usr['email'];
	                $this->load->view('administrator/view_login',$data);
	            }
	        }else{
	            redirect('administrator');
	        }
	    }

}
