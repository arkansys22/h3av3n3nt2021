<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/utama/loading')?>
    <?php $this->load->view('fronts/utama/header')?>
    <div class="inner-banner">
      <img class="center-image" src="<?php echo base_url()?>asset/frontend/aspanel/img/bghead.jpg" alt="">
    </div>

    <div class="list-wrapper bg-grey-2">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="sidebar bg-white clearfix">
            <div class="sidebar-block">
              <h4 class="sidebar-title color-dark-2">categories</h4>
              <ul class="sidebar-category color-1">
                <li class="active"><?php $jmlaa = $this->model_app->view('blogs_tbl')->num_rows(); ?>
                <a class="cat-drop" href="#">Artikel<span class="fr">(<?php echo $jmlaa; ?>)</span></a>
                  <ul>
                    <li><a href="<?php echo base_url()?>artikel/kategori/tips-hubungan">Tips Hubungan</a></li>
                    <li><a href="<?php echo base_url()?>artikel/kategori/inspirasi-pernikahan">Inspirasi Pernikahan</a></li>
                  </ul>
                </li>
                <li class="">
                  <?php $jmlav = $this->model_app->view('vendor_tbl')->num_rows(); ?>
                  <a class="cat-drop" href="#">Vendor<span class="fr">(<?php echo $jmlav; ?>)</span></a>
                  <ul>
                    <li><a href="<?php echo base_url()?>vendor/kategori/photografer">Photography</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/gedung">Gedung Pernikahan</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/rias-pengantin">Rias Pengantin</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/dekorasi">Dekorasi</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/catering">Catering</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/sewa-mobil">Sewa Mobil</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/souvenir">Souvenir</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/mc">MC</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/musik">Musik/Artis</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/gaun-pengantin">Gaun Pengantin</a></li>
                    <li><a href="<?php echo base_url()?>vendor/kategori/travel">Travel</a></li>
                  </ul>
                </li>
                <li class="">
                  <?php $jmlau = $this->model_app->view('undangan_tbl')->num_rows(); ?>
                  <a class="cat-drop" href="#">Undangan<span class="fr">(<?php echo $jmlau; ?>)</span></a>
                  <ul>
                    <li><a href="<?php echo base_url()?>undangan/kategori/online-website">Online Website</a></li>
                    <li><a href="<?php echo base_url()?>undangan/kategori/cetak">Cetak</a></li>
                    <li><a href="<?php echo base_url()?>undangan/kategori/digital">Digital</a></li>
                  </ul>
                </li>
                <li class="">
                  <?php $jmlai = $this->model_app->view('investasi_tbl')->num_rows(); ?>
                  <a class="cat-drop" href="#">Investasi<span class="fr">(<?php echo $jmlai; ?>)</span></a>
                  <ul>
                    <li><a href="<?php echo base_url()?>investasi/kategori/properti">Properti</a></li>
                    <li><a href="<?php echo base_url()?>investasi/kategori/saham">Saham</a></li>
                    <li><a href="<?php echo base_url()?>investasi/kategori/logam-mulia">Logam Mulia</a></li>
                  </ul>
                </li>


              </ul>
            </div>


            </div>
          </div>
          <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="grid-content clearfix">
              <?php
                    foreach ($post_news as $post_new) {
                              $isi = character_limiter($post_new->isi_berita,200);
                              $jdl = character_limiter($post_new->judul,240);
              ?>
              <div class="list-item-entry">
                  <div class="hotel-item style-3 bg-white">
                    <div class="table-view">
                        <div class="radius-top cell-view">
                          <img <?php if(empty($post_new->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                  else { echo " <img src='".base_url()."asset/foto_blogs/".$post_new->gambar."'> ";}
                                                  ?>
                        </div>
                        <div class="title hotel-middle clearfix cell-view">
                          <div class="date list-hidden"><strong><?php echo $post_new->nama_kategori?></strong></div>
                            <h5><b><?php echo $post_new->judul?></b></h5>
                                 <div class="rate-wrap">
                                    <i><?php echo $post_new->lokasi?></i>
                                  </div>
                        </div>
                        <div class="title hotel-right clearfix cell-view">
                            <a href="<?php echo base_url("artikel/$post_new->judul_seo ") ?>" class="c-button bg-dr-blue hv-dr-blue-o b-50 fl">Lihat Lengkapnya</a>
                        </div>
                      </div>
                  </div>
              </div>
              <?php } ?>

            </div>

            <div class="row" >
								 <div class="c_pagination clearfix padd-120">
                        <?php  echo $this->pagination->create_links();  ?>
                 </div>
						</div>
          </div>
        </div>
      </div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
