<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Price extends CI_Controller {
  public function v()
  {
    $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');
    $this->data['selectprice'] = 'active';
    $this->load->view('fronts/price/v',$this->data);
  }
}
