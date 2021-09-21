<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

	public function all()
		{
			/* memanggil model untuk ditampilkan pada masing2 modul*/
		$this->load->model('Berita_model');
		$jumlah= $this->model_app->view_join_row('blogs_tbl','kategori_blogs','id_kategori','id_berita','DESC');

			$config['base_url'] = base_url().'artikel/all/page/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 3;

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

				$this->$data['header']   = 'Daftar artikel yang dapat menjadi referensi wedding planner di mantenbaru yang menyediakan jasa wedding organizer untuk mempermudah calon pasangan pengantin dalam menentukan tema pernikahan yang tepat';

				$this->data['post_news']= $this->model_app->view_join_one_limit('blogs_tbl','kategori_blogs','id_kategori','id_berita','DESC',$dari,$config['per_page']);

			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/artikel/v', $this->data);
		}
		public function kategori()
		{
			$query = $this->model_utama->view_where('kategori_blogs',array('kategori_seo' => $this->uri->segment(3)));
			if ($query->num_rows()<=0){
				redirect('main');
			}else{
				$row = $query->row_array();
				$jumlah= $this->model_utama->view_where('blogs_tbl',array('id_kategori' => $row['id_kategori']),'id_berita','DESC')->num_rows();
				$config['base_url'] = base_url().'artikel/kategori/'.$this->uri->segment(3);
				$config['total_rows'] = $jumlah;
				$config['per_page'] = 3;
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
				$data['title'] = "Berita Kategori $row[id_kategori]";
				$data['description'] = description();
				$data['keywords'] = keywords();
				$data['rows'] = $row;

				if (is_numeric($dari)) {
					$data['post_news'] = $this->model_utama->view_join_one('blogs_tbl','kategori_blogs','id_kategori',array('kategori_seo' => $this->uri->segment(3),'blogs_tbl.id_kategori' => $row['id_kategori']),'id_berita','DESC',$dari,$config['per_page']);
					$data['header']   = 'Daftar artikel yang dapat menjadi referensi wedding planner di mantenbaru yang menyediakan jasa wedding organizer untuk mempermudah calon pasangan pengantin dalam menentukan tema pernikahan yang tepat';

				}else{
					redirect('main');
				}
				$this->pagination->initialize($config);
				$this->load->view('fronts/artikel/kategori', $data);
			}
		}

		public function read($id)
    	{
    		$this->data['title'] = "Portal Berita CI";

        $cap = $this->buat_captcha();
        $this->data['cap_img'] = $cap['image'];
        $this->session->set_userdata('kode_captcha', $cap['word']);
    		$row = $this->model_app->get_by_id_blogs($id);
    		if ($row)
        {
        $this->data['post_news']            = $this->model_app->get_by_id_blogs($id);
				$this->data['post_newz']= $this->model_app->view_join_one_limit('investasi_tbl','kategori_investasi','id_kategori','id_berita','DESC',$dari,$config['per_page']);

    			$this->add_count($id);
    			$this->load->view('fronts/artikel/single', $this->data);
    		}
    		else
            {
        			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
              redirect(base_url());
            }
    	}



		public function buat_captcha()
	  {
	    /* memanggil helper captcha dan string */
	    $this->load->helper('captcha');

	    /* menyiapkan data variabel vals melalui array untuk proses pembuatan captcha */
	    $vals = array(
	      /* lokasi gambar captcha, ex: captcha */
	      'img_path'      => './captcha/',
	      /* alamat gambar captcha, ex: www.abcd.com/captcha */
	      'img_url'       => base_url().'captcha/',
	      /* tinggi gambar */
	      'img_height'    => 30,
	      /* waktu berlaku captcha disimpan pada folder aplikasi (100 = dalam detik) */
	      'expiration'    => 100,
	      /* jumlah huruf/ karakter yang ditampilkan */
	      'word_length'   => 5,
	      // pengaturan warna dan background captcha
	      'colors'        => array(
	                          'background' => array(255, 255, 255),
	                          'border' => array(0, 0, 0),
	                          'text' => array(0, 0, 0),
	                          'grid' => array(255, 240, 0)
	                        )
	    );

	    $cap = create_captcha($vals);
	    return $cap;
	  }

		function add_count($id)
 {
		 // load cookie helper
		 $this->load->helper('cookie');
		 // this line will return the cookie which has slug name
		 $check_visitor = $this->input->cookie(urldecode($id), FALSE);
		 // this line will return the visitor ip address
		 $ip = $this->input->ip_address();
		 // if the visitor visit this article for first time then //
		 // //set new cookie and update article_views column ..
		 // //you might be notice we used slug for cookie name and ip
		 // //address for value to distinguish between articles views
		 if ($check_visitor == false) {
				 $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
				 $this->input->set_cookie($cookie);
				 $this->Berita_model->update_counter(urldecode($id));
		 }
 }



}
