
<nav  id="menus" class="navbar navbar-default navbar-static-top" role="navigation">

  <!-- Top line -->
  <div class="top-line">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <ul class="top-line-list">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Redaksi</a></li>
            <li><a href="#">Pedoman Media Siber</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Top line -->

  <!-- Logo & advertisement -->
  <div  class="logo-advertisement">
    <div class="container">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url()?>asset/frontend/ambon.png" alt="" height="50px"></a>
      </div>

      <div class="advertisement">
        <div class="desktop-advert">
          <img src="<?php echo base_url()?>asset/frontend/tech/upload/addsense/ht_728x90.jpg" alt="" height="80px">
        </div>
        <div class="tablet-advert">
          <img src="<?php echo base_url()?>asset/frontend/tech/upload/addsense/ht_728x90.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- End Logo & advertisement -->

  <!-- navbar list container -->
  <div class="nav-list-container">
    <div class="container">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="<?php echo base_url("") ?>">Home</a></li>
          <li class="drop drop-arrow"><a href="<?php echo base_url("berita/kategori/ambon") ?>">Ambon</a>
            <ul class="dropdown">
              <li><a href="<?php echo base_url("berita/kategori/kec-leitimur-selatan") ?>">Kec. Leitimur Selatan</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url("berita/kategori/nasional") ?>">Nasional</a></li>
          <li><a href="<?php echo base_url("berita/kategori/olahraga") ?>">Olahraga</a></li>
          <li><a href="<?php echo base_url("berita/kategori/politik") ?>">Politik</a></li>
          <li><a href="<?php echo base_url("berita/kategori/wisata") ?>">Wisata</a></li>
          

        </ul>
        <form class="navbar-form navbar-right" role="search">
          <input type="text" id="search" name="search" placeholder="Search here">
          <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <!-- /.navbar-collapse -->
    </div>
  </div>
  <!-- End navbar list container -->

</nav>
<!-- End Bootstrap navbar -->
</section>
