<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notfound extends CI_Controller {


		public function index()
		{
		    $this->data['identitas']= $this->model_app->get_by_id_identitas($id='1');

			$this->load->view('fronts/404/v404', $this->data);
		}

	}
