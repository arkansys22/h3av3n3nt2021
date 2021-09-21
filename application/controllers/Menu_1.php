<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_1 extends CI_Controller {

  public function v()
  {

    $jumlah= $this->model_app->view_row('kategori','id_kategori','DESC');

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
        $this->data['selectservices'] = 'active';
        $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
        $this->data['url']   = 'services';
        $this->data['headers']   = 'Layanan - Layanan';
        $this->data['tag2']   = 'Layanan';
        $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);

      }else{
        redirect('main');
      }
    $this->pagination->initialize($config);
    $this->load->view('fronts/menu_1/v_kategori', $this->data);
  }
  public function v_sub($id_kat)
  {
    $cap = $this->buat_captcha();
    $this->data['cap_img'] = $cap['image'];
    $this->session->set_userdata('kode_captcha', $cap['word']);
    $row = $this->model_app->get_by_id_kategori($id_kat);
    if ($row)
    {
    $this->data['foto']   = 'foto_private/';
    $this->data['url']   = 'jenis_paket/';
    $this->data['headers']   = 'Pilihan Paket';
    $this->data['tag2']   = 'pilihan paket';
    $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->data['post_news']            = $this->model_app->get_by_id_kategori($id_kat);
    $this->data['post_child']           = $this->model_app->view_join_where2('kategori','vendor_tbl','id_kategori',array ('kategori.kategori_seo' => $id_kat));
    $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->data['selectservices'] = 'active';
    $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
    $this->load->view('fronts/menu_1/v_layanan', $this->data);
  }
  else
      {
    $this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
        redirect(base_url());
      }
}
  public function v_paket($id)
  {
    $this->data['url']   = 'paket/';
      $this->data['foto']   = 'foto_private/';
      $cap = $this->buat_captcha();
      $this->data['cap_img'] = $cap['image'];
      $this->session->set_userdata('kode_captcha', $cap['word']);
    $row = $this->model_app->get_by_id_vendor($id);
    $config['per_page2'] = 3;
    $config['per_page3'] = 3;

    if ($row)
      {
    $this->data['post']            = $this->model_app->get_by_id_vendor($id);
    $this->add_count($id);
    $this->data['selectservices'] = 'active';
    $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
    $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->data['post_latest']= $this->model_app->view_ordering_limits('vendor_tbl','id_berita','DESC',$dari,$config['per_page3']);
    $this->data['post_popular']= $this->model_app->view_ordering_limits('vendor_tbl','views','DESC',$dari,$config['per_page2']);
    $this->load->view('fronts/menu_1/v', $this->data);
  }
  else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
        redirect(base_url());
      }
}

    	public function alls()
		{
			/* memanggil model untuk ditampilkan pada masing2 modul*/

		$jumlah= $this->model_app->view_row('kategori','id_kategori','DESC');

			$config['base_url'] = base_url().'private/all/page/';
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

				$this->data['menupt']   = 'active';
				$this->data['url']   = 'privatetrip';
				$this->data['headers']   = 'Private Trip Termurah ANT Tour Indonesia 0812 9188 8852 | Paket Wisata Liburan Keluarga Suku Baduy, Sedayu, Dieng Pahawang, Dan Masih Banyak Lagi. ';
				$this->data['tag2']   = 'Private Trip Termurah, Private Trip Baduy, Private Trip Sedayu & Dieng, Private Trip Pahawang, Paket Wisata Liburan';
				$this->data['post_news']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);

			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/privatetrip/v', $this->data);
		}

	    public function kategori($id_kat)
    	{
        $cap = $this->buat_captcha();
        $this->data['cap_img'] = $cap['image'];
        $this->session->set_userdata('kode_captcha', $cap['word']);
    	  $row = $this->model_app->get_by_id_kategori($id_kat);

    	if ($row)
        {
            $this->data['foto']   = 'foto_private/';
        $this->data['url']   = 'privatetrip';
		$this->data['headers']   = 'Private Trip Termurah ANT Tour Indonesia 0812 9188 8852 | Paket Wisata Liburan Keluarga Suku Baduy, Sedayu, Dieng Pahawang, Dan Masih Banyak Lagi. ';
		$this->data['tag2']   = 'Private Trip Termurah, Private Trip Baduy, Private Trip Sedayu & Dieng, Private Trip Pahawang, Paket Wisata Liburan';
       	$this->data['menupt']   = 'active';
        $this->data['post_child']           = $this->model_app->view_join_where2('kategori','vendor_tbl','id_kategori',array ('vendor_tbl.id_kategori' => $id_kat));
        $this->data['post_news']            = $this->model_app->get_by_id_kategori($id_kat);
		$this->load->view('fronts/menu_1/v_kategori', $this->data);
    		}
    		else
            {
        	$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
              redirect(base_url());
            }
    	}

    	public function paket($id)
    	{
    	$this->data['url']   = 'paket';
        $this->data['foto']   = 'foto_private/';
        $cap = $this->buat_captcha();
        $this->data['cap_img'] = $cap['image'];
        $this->session->set_userdata('kode_captcha', $cap['word']);
    	$row = $this->model_app->get_by_id_vendor($id);

    	if ($row)
        {
            $this->data['menupt']   = 'active';
            $this->data['post_news']            = $this->model_app->get_by_id_vendor($id);
    		$this->add_count($id);

    		$this->data['post_trip']= $this->model_app->view_ordering_limits('vendor_tbl','id_berita','random',$dari,$config['per_page']);
            $this->load->view('fronts/privatetrip_s/v', $this->data);
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
