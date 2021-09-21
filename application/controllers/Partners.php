<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partners extends CI_Controller {
  public function v()
  {
    $jumlah= $this->model_app->view_row('partners_tbl','id_berita','DESC');
    $config['base_url'] = base_url().'blogs/v/p/';
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 20;
    $config['full_tag_open']    = "<ul class='cp_content color-1'>";
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
    $this->data['selectpartners'] = 'active';
    $this->data['url']   = 'head text';
    $this->data['headers']   = '';
    $this->data['tag2']   = 'meta tag';
    $this->data['post_partners']= $this->model_app->view_ordering_limits('partners_tbl','id_berita','DESC',$dari,$config['per_page']);
    $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
  }else{
    redirect('main');
  }
    $this->pagination->initialize($config);
    $this->load->view('fronts/partners/v',$this->data);
  }
}
