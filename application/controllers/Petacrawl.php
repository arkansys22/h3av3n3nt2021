<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Petacrawl extends CI_Controller {

 public function index(){
     $this->load->helper('url');
     $this->load->model('Sitemap_model');
     $data['datavendor'] = $this->Sitemap_model->generate('vendor_tbl');
     $data['datakategori'] = $this->Sitemap_model->generate_kategori('kategori');
     $data['galeri'] = $this->Sitemap_model->generate('galeri_tbl');
     $data['dataartikel'] = $this->Sitemap_model->generate('blogs_tbl');
     $data['katvendor']= $this->Sitemap_model->view_join_one_limit('vendor_tbl','kategori','id_kategori','id_berita','DESC',$dari,$config['per_page']);
     $this->load->view('v_sitemap',$data);
 }

}
