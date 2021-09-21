<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
  public $table = 'kategori';
  public $table_galeri = 'kategori_galeri';
  public $id    = 'id_kategori';
  public $order = 'DESC';

  // get all
  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  function get_combo_kategori()
  {
    $this->db->order_by('nama_kategori', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_kategori']] = $row['nama_kategori'];
      }
      return $data;
    }
  }
  function get_combo_kategori_galeri()
  {
    $this->db->order_by('nama_kategori', 'ASC');
    $query = $this->db->get($this->table_galeri);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_kategori']] = $row['nama_kategori'];
      }
      return $data;
    }
  }

  function get_all_new_home()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_kategori_sidebar()
  {
    $this->db->order_by('judul_kategori', 'decs');
    return $this->db->get($this->table)->result();
  }

  function get_total_row_kategori()
  {
    return $this->db->get($this->table)->count_all_results();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_id_front($id)
  {

    $this->db->limit(4);
    $this->db->from('berita');
    $this->db->where('kategori_seo', $id);
    $this->db->order_by('id_berita', $this->order);
    $this->db->join('kategori', 'berita.nama_kategori = kategori.nama_kategori');
    return $this->db->get();
  }
  function get_count_all_kategori($id)
  {
	$this->db->where('kategori_seo', $id);
	 $this->db->join('kategori', 'berita.nama_kategori = kategori.nama_kategori');
	return $this->db->get('berita')->num_rows();

  }


  function get_by_id_front_paging($id, $number, $offset)
  {
   $this->db->where('kategori_seo', $id);
   $this->db->order_by('id_berita', $this->order);
    $this->db->join('kategori', 'berita.nama_kategori = kategori.nama_kategori');
    return $query = $this->db->get('berita',$number,$offset)->result();
  }

  // get total rows
  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
