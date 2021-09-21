<div class="col-sm-8 col-p  main-content">
    <div class="theiaStickySidebar">
        <div class="post-inner">
            <!--post header-->
            <div class="post-head">
                <h2 class="title"><strong>Kategori</strong> <?php echo "$rows[nama_kategori]"; ?></h2>
            </div>
            <!-- post body -->
            <div class="post-body">
              <?php
                        foreach ($beritakategori->result_array() as $r) {
                          $baca = $r['dibaca']+1;
                          $isi_berita =(strip_tags($r['isi_berita']));
                          $isi = substr($isi_berita,0,220);
                          $isi = substr($isi_berita,0,strrpos($isi," "));
                          $judul = substr($r['judul'],0,45);
                          $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows();

                          echo "<div class='hentry post clearfix'>
                              <div style='entry-thumbnail'>
                                <a href='".base_url()."$r[judul_seo]' class='hover-effect'>";
                                  if ($r['gambar'] == ''){
                                    echo "<img style='width:210px;' src='".base_url()."asset/foto_berita/no-image.jpg' alt='no-image.jpg' /></a>";
                                  }else{
                                    echo "<img  style='width:100%;' src='".base_url()."asset/foto_berita/$r[gambar]' alt='$r[gambar]'  /></a>";
                                  }
                                echo "</a>
                              </div>
                              <div class='article-content'>
                                <h2 class='entry-title'><a title='$r[judul]' href='".base_url()."$r[judul_seo]'>$judul...</a><a href='".base_url()."$r[judul_seo]' </a></h2>
                                <span class='entry-meta'>
                                  <a ><span class='icon-text'>&#128100;</span>$r[username]</a>
                                </span>
                                <span class='entry-meta'>
                                  <a ><span class='icon-text'>&#128340;</span>$r[hari], ".tgl_indo($r['tanggal']).",$r[jam]</a>
                                </span>
                                <div class='entry-summary'>
                                <p>$isi . . .</p>

                              </div>
                              </div>
                            </div>";
                        }
                    ?>

            </div> <!-- /. post body -->
            <!-- Post footer -->
            <div class="post-footer">
                <div class="row thm-margin">
                    <div class="col-xs-12 col-sm-12 col-md-12 thm-padding">
                        <!-- pagination -->
                        <ul class="pagination">
                          <li ><?php
  echo $this->pagination->create_links();
  ?></li>
                        </ul> <!-- /.pagination -->
                    </div>
                </div>
            </div> <!-- /.Post footer-->
        </div>
    </div>
</div>
