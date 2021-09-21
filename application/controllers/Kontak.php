<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontak extends CI_Controller {
  public function v()
  {
    $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
    $this->data['selectcontact'] = 'active';
    $this->data['post_1']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->data['post_menu']= $this->model_app->view_ordering_limits('kategori','id_kategori','DESC',$dari,$config['per_page']);
    $this->load->view('fronts/kontak/v',$this->data);
  }
}
