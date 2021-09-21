<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blogs extends CI_Controller {
  public function v()
  {
      $jumlah= $this->model_app->view_row('blogs_tbl','id_berita','DESC');
			$config['base_url'] = base_url().'blogs/v/p/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 2;
            $config['per_page2'] = 5;
            $config['per_page3'] = 2;
            $config['per_page4'] = 10;
            $config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   = "</ul>";
			$config['num_tag_open']     = "<li>";
			$config['num_tag_close']    = "</li>";
			$config['cur_tag_open']     = "<li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_link']        = "Next";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_link']        = "Prev";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";

      if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}

		if (is_numeric($dari)) {
        $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
        $this->data['selectblogs'] = 'active';
		$this->data['url']   = 'blogs/';
		$this->data['headers']   = '';
		$this->data['tag2']   = 'meta tag';
		$this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page4']);
        $this->data['post_random']= $this->model_app->view_ordering_limits('blogs_tbl','id_berita','random',$dari,$config['per_page3']);
		$this->data['post_news']= $this->model_app->view_ordering_limits('blogs_tbl','id_berita','DESC',$dari,$config['per_page']);
        $this->data['post_katservice']= $this->model_app->view_ordering_limits('vendor_tbl','views','DESC',$dari,$config['per_page2']);
        $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
			}else{
				redirect('main');
			}

    $this->pagination->initialize($config);
    $this->load->view('fronts/blog/v',$this->data);
  }
    	public function info($id)
    	{
        $config['per_page2'] = 5;
        $config['per_page3'] = 3;
    	
        $this->data['foto']   = 'foto_blogs/';
        $cap = $this->buat_captcha();
        $this->data['cap_img'] = $cap['image'];
        $this->session->set_userdata('kode_captcha', $cap['word']);
    	   $row = $this->model_app->get_by_id_blogs($id);
    	if ($row)
        {
        $this->data['post_latest']= $this->model_app->view_ordering_limits('blogs_tbl','id_berita','DESC',$dari,$config['per_page3']);
        $this->data['post_news']  = $this->model_app->get_by_id_blogs($id);
        $this->add_count($id);
        $this->data['url']   = 'blogs/';
        $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
        $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page4']);
        $this->data['post_popular']= $this->model_app->view_ordering_limits('blogs_tbl','views','DESC',$dari,$config['per_page2']);
        $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
        $this->data['selectblogs'] = 'active';
 	      $this->load->view('fronts/blog/v_detail', $this->data);
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
      				 $this->Berita_model->update_counter_blogs(urldecode($id));
      		 }
       }



      }
