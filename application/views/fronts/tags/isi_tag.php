<div class="article-box">
  <div class="title-section">
    <h1><span>Kategori</strong> <?php echo "$rows[nama_kategori]"; ?></span></h1>
  </div>
  <?php
            foreach ($beritatag->result_array() as $r) {
              $baca = $r['dibaca']+1;
              $isi_berita =(strip_tags($r['isi_berita']));
              $isi = substr($isi_berita,0,220);
              $isi = substr($isi_berita,0,strrpos($isi," "));
              $judul = substr($r['judul'],0,200);
              $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows();

              echo "

  <div class='news-post standard-post2'>
    <div class='post-gallery'>
    ";
      if ($r['gambar'] == ''){
        echo "<img style='width:210px;' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
      }else{
        echo "<img  style='width:100%;' src='".base_url()."asset/foto_berita/$r[gambar]' alt='$r[gambar]'  /></a>";
      }
    echo "
    </div>
    <div class='post-title'>
      <h2><a title='$r[judul]' href='".base_url()."$r[judul_seo]'>$judul.</a><a href='".base_url()."$r[judul_seo]' </a></h2>
      <ul class='post-tags'>
        <li><i class='fa fa-clock-o'></i>$r[hari], ".tgl_indo($r['tanggal']). " </li>
        <li><i class='fa fa-user'></i><a href='#'>$r[username]</a></li>

        <li><i class='fa fa-eye'></i>$r[views]</li>
      </ul>
    </div>
    <div class='post-content'>
      $isi</p>
      <a href='".base_url()."$r[judul_seo]' class='read-more-button'><i class='fa fa-angle-right'></i><span>Read More</span></a>
    </div>
  </div>
  ";
  }
  ?>


</div>
