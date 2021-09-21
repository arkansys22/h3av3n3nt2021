<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

  public function v()
	{
      $config['per_page2'] = 6;
      if ($this->uri->segment('4')==''){
        $dari = 0;
      }else{
        $dari = $this->uri->segment('4');
      }
      if (is_numeric($dari)) {
  	  $this->data['headers']   = '';
  	  $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
      $this->data['artis']= $this->model_app->view_ordering_limits('vendor_tbl','id_berita','DESC',$dari,$config['per_page2']);
      $this->data['selecthome'] = 'active';
      $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
      $this->data['post_testimoni']= $this->model_app->view_ordering_limits('partners_tbl','id_berita','DESC',$dari,$config['per_page']);
      $this->data['post_news']= $this->model_app->view_ordering_limits('blogs_tbl','id_berita','DESC',$dari,$config['per_page']);
      $this->data['post_promo']= $this->model_app->view_ordering_limits('promo_tbl','id_berita','DESC',$dari,$config['per_page']);
      $this->data['post_galeri']= $this->model_app->view_where_orderings('galeri_tbl',array('id_kategori' => 1),'id_berita','DESC',$dari,$config['per_page']);
      $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
      }else{
          redirect('main');
      }
      $this->pagination->initialize($config);
  		$this->load->view('fronts/home/v', $this->data);

	}

  public function utama()
		{

		  $jumlah= $this->model_app->view_row('open_tbl','id_berita','DESC');

			$config['base_url'] = base_url().'private/all/page/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 130;

			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}

			if (is_numeric($dari)) {
			  $this->data['foto']   = 'frontend/anttour/logo.png';
				$this->data['menuop']   = 'active';
				$this->data['url']   = 'opentrip';
				$this->data['headers']   = 'Open Trip Termurah ANT Tour Indonesia 0812 9188 8852 | Paket Wisata Liburan Keluarga Suku Baduy, Sedayu, Dieng Pahawang, Dan Masih Banyak Lagi. ';
				$this->data['tag2']   = 'Open Trip Termurah, Open Trip Baduy, Open Trip Sedayu & Dieng, Open Trip Pahawang, Paket Wisata Liburan';
				$this->data['post_news']= $this->model_app->view_ordering_limits('open_tbl','id_berita','ASC',$dari,$config['per_page']);
				$this->data['post_promo']= $this->model_app->view_ordering_limits('promo_tbl','id_berita','ASC',$dari,$config['per_page']);

			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/opentrip/v', $this->data);
		}


    	public function paket($id)
    	{
    	$config['per_page'] = 7;
    	$config['per_page2'] = 5;
    	$this->data['url']   = 'open-paket';
        $this->data['foto']   = 'foto_open/';
        $cap = $this->buat_captcha();
        $this->data['cap_img'] = $cap['image'];
        $this->session->set_userdata('kode_captcha', $cap['word']);
    	$row = $this->model_app->get_by_id_open($id);
    	if ($row)
        {
            $this->data['menuop']   = 'active';
            $this->data['post_news']            = $this->model_app->get_by_id_open($id);
    		$this->add_count($id);
    		$this->data['post_privatetrip']= $this->model_app->view_ordering_limits('vendor_tbl','id_berita','random',$dari,$config['per_page2']);
    		$this->data['post_trip']= $this->model_app->view_ordering_limits('open_tbl','id_berita','random',$dari,$config['per_page']);
            $this->load->view('fronts/opentrip_s/v', $this->data);
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
