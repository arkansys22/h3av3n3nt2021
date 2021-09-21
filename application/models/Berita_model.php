<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_model extends CI_Model
{
  public $table = 'vendor_tbl';
  public $id    = 'id_berita';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_berita()
  {
    $this->db->order_by('judul', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['id_berita']] = $row['judul'];
      }
      return $data;
    }
  }

  function get_all_random($politik)
  {
    $this->db->limit(3);
    $this->db->where('id_kategori',$politik);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();

  }

   function get_all_rand2()
  {
    $this->db->limit(3);

    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();

  }
  function get_all_pilihan()
  {
    $this->db->limit(3);
     $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 7 DAY)');
    $this->db->order_by($this->views, $this->order);
    return $this->db->get($this->table)->result();
  }


  function get_all_new_home()
  {
    $this->db->limit(10);
    $this->db->order_by('tanggal', $this->order);
    $this->db->order_by('jam', $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home2()
  {
    $this->db->limit(10);
    $this->db->order_by('tanggal', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_new_content()
  {
    $this->db->limit(6);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_latest($order,$ordering,$baris,$dari)
  {
    $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
    return $this->db->get($this->table)->result();
  }
  function get_all_utama()
  {
    $this->db->limit(5);
    $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 1 DAY)');
    $this->db->order_by('views', $this->order);
    return $this->db->get($this->table)->result();

  }
  function get_all_utama1()
  {
    $this->db->limit(5);
    $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 1 DAY)');
    $this->db->order_by('views', $this->order);
    return $this->db->get($this->table)->result();

  }



   function get_all_ambon($ambon)
  {
    $this->db->limit(4);
    $this->db->where('nama_kategori',$ambon);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_nasional($nasional)
  {
    $this->db->limit(4);
    $this->db->where('id_kategori',$nasional);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
    function get_all_wisata($wisata)
  {
    $this->db->limit(4);
    $this->db->where('id_kategori',$wisata);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_nasional_2($nasional,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$nasional);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_nasional_3($nasional,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$nasional);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_daerah($ambon)
  {
    $this->db->limit(4);
    $this->db->where('id_kategori',$ambon);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_daerah_2($daerah,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$daerah);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_daerah_3($daerah,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$daerah);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_olahraga($olahraga)
  {
    $this->db->limit(1);
    $this->db->where('id_kategori',$olahraga);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_olahraga_2($olahraga,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$olahraga);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }

  function get_all_wisata_2($wisata,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$wisata);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_politik($politik)
  {
    $this->db->limit(1);
    $this->db->where('nama_kategori',$politik);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_politik_2($politik,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('nama_kategori',$politik);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_terbaru()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_video()
  {
    $this->db->limit(7);
    $this->db->order_by($this->id, 'DESC');
    return $this->db->get('video',$number,$offset)->result();
  }
  function get_count_new_video()
{
return $this->db->get('Video')->num_rows();

}
  function get_all_popular()
  {
    $this->db->limit(5);
    $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 3 DAY)');
    $this->db->order_by('views', $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_new_terbaru_kiri()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_berita_sidebar()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_komentar_sidebar()
  {
    $this->db->from($this->table);
    $this->db->where('status', 'ya');
    $this->db->limit(5);
    $this->db->order_by('time_verif', $this->order);
    $this->db->join('komentar', 'berita.id_berita = komentar.id_berita');
    return $this->db->get()->result();
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('judul_seo', $id);
    return $this->db->get($this->table)->row();
  }

  function get_komentar($id)
  {
    $this->db->from($this->table);
    $this->db->where('judul_seo', $id);
    $this->db->where('status', 'ya');
    $this->db->join('komentar', 'berita.id_berita = komentar.id_berita');
    return $this->db->get()->result();
  }

  function get_all_arsip($per_page,$dari)
  {
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
  function get_all_news($per_page,$dari)
  {
    $this->db->order_by($this->id, 'DESC');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
  // get total rows
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // insert data
  function insert_komentar($data)
  {
    $this->db->insert('komentar', $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  // get all
  function get_cari_berita()
  {
    $cari_berita = $this->input->post('cari_berita');
    $this->db->limit(4);
    $this->db->like('judul', $cari_berita);
    return $this->db->get($this->table)->result();
  }
  function get_one($slug)
    {
        $this->db->get_where('berita', array('judul_seo' => $slug));
        $query = $this->db->get('berita');
        return $query->row();
    }

    function update_counter($id)
    {
        //return current article views
        $this->db->where('judul_seo', urldecode($id));
        $this->db->select('views'); $count = $this->db->get('vendor_tbl')->row();
        // then increase by one
        $this->db->where('judul_seo', urldecode($id));
        $this->db->set('views', ($count->views + 1));
        $this->db->update('vendor_tbl');
    }
    function update_counter_blogs($id)
    {
        //return current article views
        $this->db->where('judul_seo', urldecode($id));
        $this->db->select('views'); $count = $this->db->get('blogs_tbl')->row();
        // then increase by one
        $this->db->where('judul_seo', urldecode($id));
        $this->db->set('views', ($count->views + 1));
        $this->db->update('blogs_tbl');
    }
    function del($id){
            $row = $this->db->where('id_berita',$id)->get('berita')->row();
            unlink('assets/images/berita/'.$row->userfile.$row->userfile_type);
            $this->db->where('id_berita', $id);
            $this->db->delete($this->table);
            return true;
          }
          public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }
    function generate()
    {
        $this->db->select('judul_seo,hari,tanggal,jam');
        $this->db->from('berita');
        $this->db->order_by('id_berita',"DESC");
        $query = $this->db->get();

        return $query->result();
    }

}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
