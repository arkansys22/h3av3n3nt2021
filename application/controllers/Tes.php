<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {
	public function index()
	{
		$this->data['header']   = 'Mantenbaru Wedding Organizer - Mempermudah Calon Pasangan Pengantin Dalam Memilih Vendor Pernikahan Yang Tepat Demi Terwujudnya Pernikahan Yang Sangat Istimewa Sehingga Menciptakan Keluarga Yang Bahagia Selamanya';
		$this->data['post_news']= $this->model_app->view_join_one_limit('undangan_tbl','kategori_undangan','id_kategori','id_berita','DESC',$dari,$config['per_page']);
		$this->data['post_artikel']= $this->model_app->view_join_one_limit('blogs_tbl','kategori_blogs','id_kategori','id_berita','DESC',$dari,$config['per_page']);

		$this->load->view('fronts/beranda/v', $this->data);
	}
	public function about()
	{
		$this->load->view('fronts/aboutz/v');
	}

	public function gallery()
	{
		$jumlah= $this->model_app->view_row('blogs_tbl','id_berita','DESC');

			$config['base_url'] = base_url().'blog/alls/p/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 50;

			$config['full_tag_open']    = "<ul class='cp_content color-1'>";
			$config['full_tag_close']   = "</ul>";
			$config['num_tag_open']     = "<li>";
			$config['num_tag_close']    = "</li>";
			$config['cur_tag_open']     = "<li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_link']        = "<i class='fa fa-angle-right'></i>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_link']        = "<i class='fa fa-angle-left'></i>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_link']       = "<i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_link']        = "<i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";


			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}

			if (is_numeric($dari)) {

				$this->data['menug']   = 'active';
				$this->data['url']   = 'opentrip';
				$this->data['headers']   = 'Open Trip Termurah ANT Tour Indonesia 0812 9188 8852 | Paket Wisata Liburan Keluarga Suku Baduy, Sedayu, Dieng Pahawang, Dan Masih Banyak Lagi. ';
				$this->data['tag2']   = 'Open Trip Termurah, Open Trip Baduy, Open Trip Sedayu & Dieng, Open Trip Pahawang, Paket Wisata Liburan';
				$this->data['post_galeri']= $this->model_app->view_where_orderings('galeri_tbl',array('id_kategori' => 1),'id_berita','DESC',$dari,$config['per_page']);
		    $this->data['post_video']= $this->model_app->view_where_orderings('galeri_tbl',array('id_kategori' => 2),'id_berita','DESC',$dari,$config['per_page']);

			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/gallery/v', $this->data);
	}
	public function anttour()
	{
		$data['menuat']   = 'active';
		$this->load->view('fronts/anttour/v',$data);
	}


}
