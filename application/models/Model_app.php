<?php
class Model_app extends CI_model{

    public $id    = 'id_berita';
    public $id2    = 'id_identitas';
    public $id_kat    = 'id_kategori';
    public $table_kategori = 'kategori';
    public $table_vendor = 'vendor_tbl';
    public $table_open = 'open_tbl';
    public $table_promo = 'promo_tbl';
    public $table_identitas = 'identitas';
    public $table_undangan = 'undangan_tbl';
    public $table_blogs = 'blogs_tbl';
    public $table_galeri = 'galeri_tbl';


    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    public function view_ordering_limits($table,$order,$ordering,$baris,$dari){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->order_by($order,$ordering);
         $this->db->limit($dari, $baris);
         return $this->db->get()->result();
     }

      public function view_where_orderings($table,$data,$order,$ordering,$baris,$dari){
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($data);
         $this->db->order_by($order,$ordering);
         $this->db->limit($dari, $baris);
         return $this->db->get()->result();
     }


      public function view_join_where2($table1,$table2,$field,$where){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }


    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }


    public function view_join_row($table1,$table2,$field,$order,$ordering){
       $this->db->select('*');
       $this->db->from($table1);
       $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
       $this->db->order_by($order,$ordering);
       return $this->db->get()->num_rows();
   }
   public function view_row($table1,$order,$ordering){
       $this->db->select('*');
       $this->db->from($table1);
       $this->db->order_by($order,$ordering);
       return $this->db->get()->num_rows();
   }


    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 10");
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->or_where('judul_seo', $id);
        return $this->db->get($this->table_vendor)->row();
    }

 function get_by_id_kategori($id_kat)
      {
        $this->db->where($this->id_kat, $id_kat);
        $this->db->or_where('kategori_seo', $id_kat);
        return $this->db->get($this->table_kategori)->row();
      }


    function get_by_id_vendor($id)
      {
        $this->db->where($this->id, $id);
        $this->db->or_where('judul_seo', $id);
        return $this->db->get($this->table_vendor)->row();
      }
      function get_by_id_blogs($id)
        {
          $this->db->where($this->id, $id);
          $this->db->or_where('judul_seo', $id);
          return $this->db->get($this->table_blogs)->row();
        }
        function get_by_id_galeri($id)
          {
            $this->db->where($this->id, $id);
            $this->db->or_where('judul_seo', $id);
            return $this->db->get($this->table_galeri)->row();
          }
      function get_by_id_open($id)
        {
          $this->db->where($this->id, $id);
          $this->db->or_where('judul_seo', $id);
          return $this->db->get($this->table_open)->row();
        }
        function get_by_id_promo($id)
          {
            $this->db->where($this->id, $id);
            $this->db->or_where('judul_seo', $id);
            return $this->db->get($this->table_promo)->row();
          }
          function get_by_id_investasi($id)
            {
              $this->db->where($this->id, $id);
              $this->db->or_where('judul_seo', $id);
              return $this->db->get($this->table_investasi)->row();
            }

              function get_by_id_identitas($id)
                {
                  $this->db->where($this->id2, $id);
                  return $this->db->get($this->table_identitas)->row();
                }

}
